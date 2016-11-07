<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">

<div class="page-header navbar navbar-fixed-top">

    @include('partials.header')

</div>

<div class="clearfix"></div>

<div class="page-container">

    <div class="page-sidebar-wrapper">
        @include('partials.sidebar')
    </div>

    <div class="page-content-wrapper">

        <div class="page-content">
            @yield('content')

        </div>
    </div>
</div>

@include('partials.footer')

@include('partials.footerjs')

</body>

</html>
