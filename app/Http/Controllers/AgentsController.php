<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Agent;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;
use Laracasts\Flash\Flash;

class AgentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $agents = Agent::paginate(15);
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('agents.create');
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
            'mobile'            => 'required|unique:users',
            'password'          => 'required',
        ]);

        $inputs = $request->except('password');
        $inputs = array_merge($inputs,array(
            'password'  => bcrypt($request->input('password')),
            'role_id'   => 4,
            'parent_id' => Auth::user()->id
        ));


        Agent::create($inputs);

         Flash::message('Agent added!');

        return redirect('agents');
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
        $agent = Agent::findOrFail($id);

        return view('agents.show', compact('agent'));
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
        $agent = Agent::findOrFail($id);

        return view('agents.edit', compact('agent'));
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

        $inputs = $request->except('password');

        if(!empty($request->input('password'))){
            $inputs = array_merge($inputs,array(
                'password'  => bcrypt($request->input('password')),
            ));
        }
        
        $agent = Agent::findOrFail($id);
        $agent->update($inputs);

         Flash::message('Agent updated!');

        return redirect('agents');
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
        Agent::destroy($id);

         Flash::message('Agent deleted!');

        return redirect('agents');
    }

}
