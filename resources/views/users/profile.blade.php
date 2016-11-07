@extends('layouts.app')

    @section('title')
       Profile::
    @parent
    @stop

    @section('page_level_css_plugin')

            <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{$theme_assets}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <link href="{{$theme_assets}}/pages/css/profile.css" rel="stylesheet" type="text/css"/>
    <link href="{{$theme_assets}}/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->

    @endsection

    @section('content')
            <!-- BEGIN PAGE HEADER-->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Pages</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Profile</a>
            </li>
        </ul>

    </div>
       <div class="clearfix">
       </div>
       @include('flash::message')
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row margin-top-20">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet">
                    <!-- SIDEBAR USERPIC -->
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{ $user->name }}
                        </div>
                        <p>Balance: ৳ {{ $user->balance }}</p>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->

                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <!---
                            <li>
                                <a href="extra_profile.html">
                                    <i class="icon-home"></i>
                                    Overview </a>
                            </li>
                               -->
                            <li class="active">
                                <a href="{{ route('user.profile') }}">
                                    <i class="icon-settings"></i>
                                    Profile Settings </a>
                            </li>
                            <!--
                           <li>
                               <a href="page_todo.html" target="_blank">
                                   <i class="icon-check"></i>
                                   Tasks </a>
                           </li>
                           <li>
                               <a href="extra_profile_help.html">
                                   <i class="icon-info"></i>
                                   Help </a>
                           </li>
                           -->
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->

                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        {!! Form::model($user, [
                                            'method' => 'POST',
                                            'url' => ['profile'],
                                            'class' => 'form-horizontal'
                                        ]) !!}

                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                            {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                                            <div class="col-sm-6">
                                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                                            {!! Form::label('mobile', 'Mobile: ', ['class' => 'col-sm-3 control-label']) !!}
                                            <div class="col-sm-6">
                                                {!! Form::text('mobile', old('mobile', $user->mobile), ['class' => 'form-control','required'=>'true']) !!}
                                                {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                            {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                                            <div class="col-sm-6">
                                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                            {!! Form::label('password', 'Password: ', ['class' => 'col-sm-3 control-label']) !!}
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="password" autocomplete="off">
                                                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('pin_number') ? 'has-error' : ''}}">
                                            {!! Form::label('pin_number', 'Pin Number: ', ['class' => 'col-sm-3 control-label']) !!}
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="pin_number" value="{{old('pin_number', $user->pin_number)}}">
                                                {!! $errors->first('pin_number', '<p class="help-block">:message</p>') !!}
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
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">

                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <div class="tab-pane" id="tab_1_4">

                                    </div>
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
    <!-- END PAGE CONTENT-->

@endsection

@section('page_level_js_plugin')
    <script src="{{$theme_assets}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{$theme_assets}}/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

@endsection

@section('page_level_script')
    <script src="{{$theme_assets}}/admin/pages/scripts/profile.js" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            // initiate layout and plugins
            Profile.init(); // init page demo
        });
    </script>
@endsection
