@extends('layouts.app')

@section('title', 'Edit Log')

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
                <i class="fa fa-gift"></i>Edit Log </div>
            <div class="actions">
                <a href="#" class="btn btn-default btn-sm">
                    <i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">
            {!! Form::model($log, [
                'method' => 'PATCH',
                'url' => ['logs', $log->id],
                'class' => 'form-horizontal'
            ]) !!}

                        <div class="form-group {{ $errors->has('login_time') ? 'has-error' : ''}}">
                {!! Form::label('login_time', 'Login Time: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('login_time', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('login_time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('logout_time') ? 'has-error' : ''}}">
                {!! Form::label('logout_time', 'Logout Time: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('logout_time', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('logout_time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('flight_start') ? 'has-error' : ''}}">
                {!! Form::label('flight_start', 'Flight Start: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('flight_start', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('flight_start', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('flight_end') ? 'has-error' : ''}}">
                {!! Form::label('flight_end', 'Flight End: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('flight_end', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('flight_end', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('total_log_time') ? 'has-error' : ''}}">
                {!! Form::label('total_log_time', 'Total Log Time: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('total_log_time', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('total_log_time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('total_flight_time') ? 'has-error' : ''}}">
                {!! Form::label('total_flight_time', 'Total Flight Time: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('total_flight_time', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('total_flight_time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('total_rest_time') ? 'has-error' : ''}}">
                {!! Form::label('total_rest_time', 'Total Rest Time: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('total_rest_time', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('total_rest_time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Date: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                {!! Form::label('user_id', 'User Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
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
