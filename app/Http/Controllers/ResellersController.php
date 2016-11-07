<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reseller;
use App\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
class ResellersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $resellers = Reseller::paginate(15);

        return view('resellers.index', compact('resellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('resellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'email'             => 'required|unique:users',
            'name'              => 'required',
            'pin_number'        => 'required',
            'mobile'            => 'required|unique:users',
            'password'          => 'required',
        ]);


        $inputs = $request->except('password');
        $inputs = array_merge($inputs,array(
            'password'  => bcrypt($request->input('password')),
            'role_id'   => 3,
            'parent_id' => Auth::user()->id
        ));
        
        Reseller::create($inputs);

        Flash::message('Reseller added!');

        return redirect('resellers');
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
        $reseller = Reseller::findOrFail($id);

        return view('resellers.show', compact('reseller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reseller = Reseller::findOrFail($id);

        return view('resellers.edit', compact('reseller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $reseller = Reseller::findOrFail($id);

        $inputs = $request->except('password');

        if(!empty($request->input('password'))){
            $inputs = array_merge($inputs,array(
                'password'  => bcrypt($request->input('password')),
            ));
        }

        $reseller->update($inputs);

         Flash::message('Reseller updated!');

        return redirect('resellers');
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
        Reseller::destroy($id);

        Flash::message('Reseller deleted!');

        return redirect('resellers');
    }

}
