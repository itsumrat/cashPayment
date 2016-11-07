@extends('layouts.app')

@section('title')
 Activity ::
@parent
@stop

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{route('home')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Activity</span>
            </li>
        </ul>
        <div class="page-toolbar">
        </div>
    </div>

    <h3 class="page-title"> Activity
        <small>Management</small>
    </h3>

    <div class="clearfix">
    </div>

    <div class="portlet box yellow">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Activity </div>
            <div class="actions">
                <a href="#" class="btn btn-default btn-sm">
                    <i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-6">
                    <div class="btn-group">
                        <a href="{{ url('activity/create') }}" class="btn green">
                            Add New Activity <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>

            <div class="table">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th><th>Text</th><th>User Id</th><th>Ip Address</th><th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{-- */$x=0;/* --}}
                    @foreach($activity as $item)
                        {{-- */$x++;/* --}}
                        <tr>
                            <td>{{ $x }}</td>
                            <td><a href="{{ url('activity', $item->id) }}">{{ $item->text }}</a></td>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->ip_address }}</td>
                            @if(Auth::user()->hasRole('Administrator'))
                                <td>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['activity', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination"> {!! $activity->render() !!} </div>
            </div>
        </div>
    </div>

@endsection
