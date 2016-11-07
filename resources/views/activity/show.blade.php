@extends('layouts.app')

@section('title')
Show Activity ::
@parent
@stop

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{route('home')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Activity</span>
            </li>
        </ul>
        <div class="page-toolbar">
        </div>
    </div>

    <h3 class="page-title"> Activity
        <small>Management</small>
    </h3>

    <div class="clearfix">
    </div>

    <div class="portlet box yellow">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Activity</div>
            <div class="actions">
                <a href="{{route('home')}}" class="btn btn-default btn-sm">
                   php<i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID.</th> <th>Text</th><th>User Id</th><th>Ip Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $activity->id }}</td> <td> {{ $activity->text }} </td><td> {{ $activity->user_id }} </td><td> {{ $activity->ip_address }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
