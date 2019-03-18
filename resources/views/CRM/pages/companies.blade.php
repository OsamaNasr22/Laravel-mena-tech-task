@extends('CRM.layouts.master')
@section('title') Companies @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Companies</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                        </tr>
                        </thead>
                        <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        {{--<div class="alert alert-warning">No companies added yet </div>--}}
                        </tbody>
                    </table>
            </div>

        </div>

    </div>
@endsection
