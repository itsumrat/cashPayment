@extends('layouts.app')

@section('title','Reseller')

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
                <i class="fa fa-gift"></i>Resellers </div>
            <div class="actions">
                <a href="#" class="btn btn-default btn-sm">
                    <i class="fa fa-plus"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-6">
                    <div class="btn-group">
                        <a href="{{ url('resellers/create') }}" class="btn green">
                            Add New Reseller <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>

            <div class="table">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th><th>Name</th><th>Mobile</th><th>Email</th><th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{-- */$x=0;/* --}}
                    @foreach($resellers as $item)
                        {{-- */$x++;/* --}}
                        <tr>
                            <td>{{ $x }}</td>
                            <td><a href="{{ url('resellers', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->mobile }}</td><td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ url('resellers/' . $item->id . '/edit') }}">
                                    <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                </a> /
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['resellers', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination"> {!! $resellers->render() !!} </div>
            </div>
        </div>
    </div>

@endsection
