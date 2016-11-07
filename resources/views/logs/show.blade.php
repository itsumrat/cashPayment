@extends('layouts.app')

@section('title', 'Show Log')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{route('home')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Log</span>
            </li>
        </ul>
        <div class="page-toolbar">
        </div>
    </div>

    <h3 class="page-title"> Log
        <small>Management</small>
    </h3>

    <div class="clearfix">
    </div>

    <div class="portlet box yellow">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Log</div>
            <div class="actions">
                <a href="#" class="btn btn-default btn-sm">
                    <i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID.</th> <th>Login Time</th><th>Logout Time</th><th>Flight Start</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $log->id }}</td> <td> {{ $log->login_time }} </td><td> {{ $log->logout_time }} </td><td> {{ $log->flight_start }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
