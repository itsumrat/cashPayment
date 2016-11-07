@extends('layouts.app')

@section('title','Show Reseller')
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{route('home')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Reseller</span>
            </li>
        </ul>
        <div class="page-toolbar">
        </div>
    </div>

    <h3 class="page-title"> Reseller
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
                <i class="fa fa-gift"></i>Reseller</div>
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
                            <td>{{ $reseller->id }}</td> <td> {{ $reseller->name }} </td><td> {{ $reseller->mobile }} </td><td> {{ $reseller->email }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
