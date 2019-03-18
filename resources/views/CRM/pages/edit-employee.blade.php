@extends('CRM.layouts.master')
@section('title') Edit Employee @endsection
@section('content')
    @extends('CRM.layouts.master')
@section('title') Add Employee @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Employee</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <form  action="#" method="post" enctype="multipart/form-data">
                {{--@csrf--}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <label class="label label-success" for="employee_first_name">Employee First Name</label>
                <div class="form-group">
                    <input type="text" id="employee_first_name" name="employee_first_name" class="form-control" placeholder="Enter Employee First Name">
                </div>
                <label class="label label-success" for="employee_last_name">Employee Last Name</label>
                <div class="form-group">
                    <input type="text" id="employee_last_name" name="employee_last_name" class="form-control" placeholder="Enter Employee Last Name">
                </div>

                <label class="label label-success" for="employee_email">Employee Email</label>
                <div class="form-group">
                    <input type="email" id="employee_email" name="employee_email" class="form-control" placeholder="Enter Employee Email">
                </div>
                <label class="label label-success" for="employee_company">Employee Company</label>
                <div class="form-group">
                    <select class="form-control" name="employee_company" id="employee_company">
                        <option value="">company1</option>
                        <option value="">company1</option>
                        <option value="">company1</option>
                    </select>
                </div>
                <label class="label label-success" for="employee_phone">Employee Phone</label>
                <div class="form-group">
                    <input type="text" id="employee_phone" name="employee_phone" class="form-control" placeholder="Enter Employee Phone">
                </div>
                <a href="#" class="btn btn-success btn-block" style="display: inline-block;" id="submit">Save Changes</a>
            </form>
        </div>

    </div>
@endsection

@endsection
