@extends('layouts.app')

@section('content')


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{route('home')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Dashboard</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp;
                <span class="thin uppercase hidden-xs"><?php echo  date("F j, Y"); ?></span>&nbsp;
                <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>

    <h3 class="page-title"> Dashboard
        <small>dashboard &amp; statistics</small>
    </h3>

<div class="clearfix">
</div>

<!-- BEGIN PAGE CONTENT-->
<div class="row margin-bottom-30">
    @if(Auth::user()->hasRole('Administrator'))
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{$agent}}
                    </div>
                    <div class="desc">
                        Agent
                    </div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple-plum">
                <div class="visual">
                    <i class="icon-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{$reseller}}
                    </div>
                    <div class="desc">
                        Reseller
                    </div>
                </div>
                <a class="more" href="#">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    @else


            <div class="row">
                @if(!Auth::user()->hasRole('Agent'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-usd"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                ৳ {{ Auth::user()->balance }}
                            </div>
                            <div class="desc">
                                My Balance
                            </div>
                        </div>
                        <a class="more" href="#">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                @endif
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            ৳ {{$transection}}
                        </div>
                        <div class="desc">
                            Total Transaction
                        </div>
                    </div>
                    <a class="more" href="#">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

        </div>
    @endif


</div>

@endsection
