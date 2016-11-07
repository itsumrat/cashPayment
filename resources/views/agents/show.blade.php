@extends('layouts.app')

@section('title','Show Agent')
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{route('home')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Agent</span>
            </li>
        </ul>
        <div class="page-toolbar">
        </div>
    </div>

    <h3 class="page-title"> Agent
        <small>Management</small>
    </h3>

    <div class="clearfix">
    </div>
    @include('flash::message')
    <div class="clearfix">
    </div>
    <div class="portlet box yellow">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Agent</div>
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
                            <th>ID.</th> <th>Name</th><th>Mobile</th><th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $agent->id }}</td> <td> {{ $agent->name }} </td><td> {{ $agent->mobile }} </td><td> {{ $agent->email }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
