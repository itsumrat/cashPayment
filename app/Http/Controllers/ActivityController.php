<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Laracasts\Flash\Flash;

class ActivityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $activity = Activity::paginate(15);

        return view('activity.index', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Activity::create($request->all());

        Flash::message('Activity added!');

        return redirect('activity');
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
        $activity = Activity::findOrFail($id);

        return view('activity.show', compact('activity'));
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
        $activity = Activity::findOrFail($id);

        return view('activity.edit', compact('activity'));
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
        
        $activity = Activity::findOrFail($id);
        $activity->update($request->all());

        Flash::message('Activity updated!');

        return redirect('activity');
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
        Activity::destroy($id);

        Flash::message('Activity deleted!');

        return redirect('activity');
    }

}
