@extends('CRM.layouts.master')
@section('title') Add Employee @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Employee</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <form  action="{{route('employees.store')}}" method="post" >
                {{--@csrf--}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <label class="label label-primary" for="employee_first_name">Employee First Name</label>
                <div class="form-group">
                    <input type="text" id="employee_first_name" name="employee_first_name" class="form-control" value="{{old('employee_first_name')}}" placeholder="Enter Employee First Name">
                </div>
                <label class="label label-primary" for="employee_last_name">Employee Last Name</label>
                <div class="form-group">
                    <input type="text" id="employee_last_name" name="employee_last_name" class="form-control" value="{{old('employee_last_name')}}" placeholder="Enter Employee Last Name" >
                </div>

                <label class="label label-primary" for="employee_email">Employee Email</label>
                <div class="form-group">
                    <input type="email" id="employee_email" name="employee_email" class="form-control" value="{{old('employee_email')}}" placeholder="Enter Employee Email">
                </div>
                <label class="label label-primary" for="employee_company">Employee Company</label>
                <div class="form-group">
                    <select class="form-control" name="employee_company" id="employee_company">
                        @forelse($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @empty
                            <option value="">No companies added yet</option>
                        @endforelse
                    </select>
                </div>
                <label class="label label-primary" for="employee_phone">Employee Phone</label>
                <div class="form-group">
                    <input type="text" id="employee_phone" name="employee_phone" class="form-control" value="{{old('employee_phone')}}" placeholder="Enter Employee Phone">
                </div>
                <a href="#" class="btn btn-primary btn-block" style="display: inline-block;" id="submit">Add</a>
            </form>
        </div>

    </div>
@endsection
