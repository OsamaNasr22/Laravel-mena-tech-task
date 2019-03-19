@extends('CRM.layouts.master')
@section('title') Dashboard @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-book fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$companies}}</div>
                                <div>Companies!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('companies.index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>

                </div>
                <p><a href="{{route('companies.create')}}" class="btn btn-primary btn-block btn-lg">Add New Company</a></p>
                <p><a href="{{route('companies.index')}}" class="btn btn-success btn-block btn-lg">All Companies</a></p>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$employees}}</div>
                                <div>Employees</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('employees.index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
                <p><a href="{{route('employees.create')}}" class="btn btn-primary btn-block btn-lg">Add New Employee</a></p>
                <p><a href="{{route('employees.index')}}" class="btn btn-success btn-block btn-lg">All Employees</a></p>
            </div>
        </div>





    </div>
@endsection
