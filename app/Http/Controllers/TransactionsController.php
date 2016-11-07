<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reseller;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Yajra\Datatables\Facades\Datatables;
use App\DataTables\TransactionsDataTable;

class TransactionsController extends Controller
{

    /**
     *  Display a listing of the resource.
     * @param \App\DataTables\TransactionsDataTable $dataTable
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(TransactionsDataTable $dataTable)
    {

        return $dataTable->render('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('Administrator')){
            $agents = Reseller::lists('name','id');
        }
        elseif (Auth::user()->hasRole('Reseller')){
            $agents = Agent::where('parent_id', '=', Auth::user()->id)->lists('name','id');
        }
        return view('transactions.create',compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount'            => 'required',
        ]);

        $inputs = $request->all();

        $user = Auth::user();
        if(Auth::user()->hasRole('Administrator')){
            $status = true;
        }else{
            if($inputs['amount'] <= $user->balance){
                $status = true;
            }else{
                $status = false;
                Flash::error('You have not enough money to send! ask admin.');
                return Redirect::back();
            }
        }

        if($status){
            if(isset($inputs['to_id'])){
                $to_id = $inputs['to_id'];
            }else{
            // here need to define correct agent id;
                $to_id = 4;
            }
            $agent = User::find($to_id);

            if(!empty($agent)){

                $inputs = array_merge($inputs,array(
                    'from' => Auth::user()->id,
                    'status'  => 'pending',
                    'to_id'   => $agent->id
                ));


                if (!$user->hasRole('Administrator')){
                    $user = User::find($user->id);
                    $user->balance =  $user->balance - $inputs['amount'];
                    $user->save();
                }else{
                    $inputs = array_merge($inputs,array(
                        'mobile' => $agent->mobile,
                        'status'  => 'success',
                    ));
                }

                $agent->balance =  ($agent->balance+$inputs['amount']);
                $agent->save();

                $data = Transaction::create($inputs);

                $data = $data->toArray();

                $data = array_merge($data, array('email'=>$agent->email,'agent_name'=>$agent->name, 'sender_name'=>Auth::user()->name,'sender_email'=>Auth::user()->email));

                Mail::send('emails.invoice', ($data), function ($message) use ($data) {
                    $message->subject('Money Send Request Form: '.$data['sender_name'])
                        ->to($data['email'])
                        ->cc($data['sender_email']);
                });

                Flash::message('Transaction added!');
                return redirect('transactions');
            }

        }
        
     

         Flash::error('Something Wrong! Check Again');
         return Redirect::back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('transactions.edit', compact('transaction'));
    }


    public function update($id, Request $request)
    {

        $reseller = Transaction::findOrFail($id);

        $reseller->update($request->all());

        Flash::message('Transaction status changed to denied!');

        return redirect('transactions');
    }



    public function accepted($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'accepted';
        $transaction->save();
        Flash::message('Transaction status changed to accepted!');
        return redirect('transactions');
    }



    public function denied($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'denied';
        $transaction->save();
        Flash::message('Transaction status changed to denied!');
        return redirect('transactions');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Transaction::destroy($id);

         Flash::message('Transaction deleted!');

        return redirect('transactions');
    }

    public function getBasic()
    {
        return view('datatables.eloquent.basic');
    }

    public function getBasicData()
    {

        $transactions = Transaction::select(['id','mobile','amount','created_at','updated_at']);
        return Datatables::of($transactions)->make();
    }

}
