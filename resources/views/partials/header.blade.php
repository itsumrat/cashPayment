<!-- BEGIN HEADER INNER -->
<div class="page-header-inner ">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
        <a href="{{ route('home')}}">
            <img src="{{$theme_assets}}/layouts/layout/img/logo.png" alt="logo" class="logo-default"/> </a>
        <div class="menu-toggler sidebar-toggler"></div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
       data-target=".navbar-collapse"> </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN INBOX DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
            <!-- END INBOX DROPDOWN -->
            <!-- BEGIN TODO DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

            <!-- END TODO DROPDOWN -->
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
            @if(Auth::check())
                @if(!Auth::user()->hasRole('Administrator'))
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="fa fa-usd"></i>
                        <span class="badge badge-default"> {{ Auth::user()->balance }} </span>
                    </a>
                </li>
                @endif
            @endif



            <li class="dropdown dropdown-user">

                @if (!Auth::guest())
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <img alt="" class="img-circle" src="{{$theme_assets}}/layouts/layout/img/avatar3_small.jpg"/>
                    <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                @endif
                <ul class="dropdown-menu dropdown-menu-default">

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>

                    @else

                        <li><a href="{{ route('user.profile' ) }}"><i class="icon-user"></i> My Profile</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    @endif
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->




        </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
</div>
<!-- END HEADER INNER -->
