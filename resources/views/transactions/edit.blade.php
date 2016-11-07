@extends('layouts.app')

@section('title','Edit Transaction')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{route('home')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Transaction</span>
            </li>
        </ul>
        <div class="page-toolbar">
        </div>
    </div>

    <h3 class="page-title"> Transaction
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
                <i class="fa fa-gift"></i>Edit Transaction </div>
            <div class="actions">
                <a href="{{route('home')}}" class="btn btn-default btn-sm">
                    <i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">
            {!! Form::model($transaction, [
                'method' => 'PATCH',
                'url' => ['transactions', $transaction->id],
                'class' => 'form-horizontal'
            ]) !!}

            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('status', ['accepted'	=>'Accepted','denied'	=>'Denied'], old('status'), ['class' => 'form-control','required'=>'true'] )!!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                {!! Form::label('remarks', 'Remarks: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('remarks', null, ['class' => 'form-control','required'=>'true']) !!}
                    {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

@endsection
