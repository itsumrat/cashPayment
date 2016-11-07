@extends('layouts.app')

@section('title','Create Transaction')

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
                <i class="fa fa-gift"></i>Create New Transaction </div>
            <div class="actions">
                <a href="{{route('home')}}" class="btn btn-default btn-sm">
                   <i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">

            {!! Form::open(['url' => 'transactions', 'class' => 'form-horizontal']) !!}
                @if (Auth::user()->hasRole('Administrator'))
                    <div class="form-group {{ $errors->has('to_id') ? 'has-error' : ''}}">
                        {!! Form::label('to_id', 'To: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('to_id', $agents, old('to_id'), ['class' => 'form-control'] )!!}
                            {!! $errors->first('to_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                @else
                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                        {!! Form::label('mobile', 'Mobile: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('mobile', null, ['class' => 'form-control','required'=>'true']) !!}
                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                @endif
                @if (!Auth::user()->hasRole('Administrator'))
                    <div class="form-group {{ $errors->has('payment_method') ? 'has-error' : ''}}">
                        {!! Form::label('payment_method', 'Payment Method: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('payment_method', [
                            'BCash'	=>'BCash',
                            'UCash'	=>'UCash',
                            'MCash'	=>'MCash',
                            'M-pay'	=>'M Pay',
                            'EasyCash'	=>'EasyCash',
                            'DBBLmobileBank'	=>'Dutch bangla mobile banking',
                            'Flexiload'	=>'Flexiload',
                            'Telecharge' => 'Telecharge',
                            'I-top' => 'i-top',
                            'E-top' => 'e-top',
                            'AirtelRecharge' => 'Airtel Recharge',
                            'RobiRecharge' => 'Robi Recharge'
                            ], old('payment_method'), ['class' => 'form-control','required'=>'true'] )!!}
                            {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                @endif
                <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                    {!! Form::label('amount', 'Amount: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        <input type="number" name="amount" class="form-control" required @if(Auth::user()->hasRole('Reseller')) max="{{ Auth::user()->balance }} @endif" >
                        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                @if (Auth::user()->hasRole('Reseller'))
                    <div class="form-group {{ $errors->has('no_type') ? 'has-error' : ''}}">
                        {!! Form::label('no_type', 'No Type: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('no_type', [
                                    'Personal'	=>'Personal',
                                    'Agent'	=>'Agent'], old('no_type'), ['class' => 'form-control','required'=>'true'] )!!}
                            {!! $errors->first('no_type', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                @endif


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        {!! Form::submit('Send Money', ['class' => 'btn btn-primary form-control']) !!}
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

@section('page_level_script')
    @include('partials.pin')
@endsection

