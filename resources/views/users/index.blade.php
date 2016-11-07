@extends('layouts.app')

@section('title')
 User ::
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
                <span>User</span>
            </li>
        </ul>
        <div class="page-toolbar">
        </div>
    </div>

    <h3 class="page-title"> User
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
                <i class="fa fa-gift"></i>Users </div>
            <div class="actions">
                <a href="#" class="btn btn-default btn-sm">
                    <i class="fa fa-plus"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">

            <div class="table">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th><th>Name</th><th>Email</th><th>Mobile</th><th>Current Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{-- */$x=0;/* --}}
                    @foreach($users as $item)

                        @if($item->hasRole('Administrator'))
                            {{-- */$x++;/* --}}
                            <tr>
                                <td>{{ $x }}</td>
                                <td><a href="{{ url('users', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td><td>{{ $item->mobile }}</td><td></td>
                            </tr>
                            @else
                            {{-- */$x++;/* --}}
                            <tr>
                                <td>{{ $x }}</td>
                                <td><a href="{{ url('users', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td><td>{{ $item->mobile }}</td><td>{{ $item->balance }}</td>
                            </tr>
                            @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination"> {!! $users->render() !!} </div>
            </div>
        </div>
    </div>

@endsection
