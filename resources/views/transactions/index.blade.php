@extends('layouts.app')

@section('title','Transaction')

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
                <i class="fa fa-gift"></i>Transactions </div>
            <div class="actions">
                <a href="#" class="btn btn-default btn-sm">
                    <i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">
            @if(!Auth::user()->hasRole('Agent'))
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-6">
                    <div class="btn-group">
                        <a href="{{ url('transactions/create') }}" class="btn green">
                            Add New Transaction <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            @endif
            <div class="clearfix">
            </div>

                {!! $dataTable->table() !!}
        </div>
    </div>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush

