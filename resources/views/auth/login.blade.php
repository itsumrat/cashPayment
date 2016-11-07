@extends('layouts.auth')

@section('title', 'Login')

@section('content')


        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
             {!! csrf_field() !!}

            <div class="form-title">
                <span class="form-title">Welcome.</span>
                <span class="form-subtitle">Please login.</span>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <strong>Error!</strong>  {!! $error !!}
                    </div>
                @endforeach
            @endif

            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any Email and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn red btn-block uppercase">Login</button>
            </div>
            <div class="form-actions">
                <div class="pull-left">
                    <label class="rememberme check">
                        <input type="checkbox" name="remember" value="1" />Remember me </label>
                </div>
                <div class="pull-right forget-password-block">
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>
            </div>
            <div class="login-options">

            </div>

        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" role="form" method="POST" action="{{ url('/password/email') }}">
                {!! csrf_field() !!}
            <div class="form-title">
                <span class="form-title">Forget Password ?</span>
                <span class="form-subtitle">Enter your e-mail to reset it.</span>
            </div>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default">Back</button>
                <button type="submit" class="btn btn-primary uppercase pull-right">Submit</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->



@endsection
