@extends('CRM.layouts.master')
@section('title') Employees @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Employees</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="table-responsive">
                @if($employees->count())
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->company->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td id="manage">
                                    <form method="post" action="{{route('employees.destroy',$employee->id)}}" style="display: inline">
                                        {{method_field('delete')}}
                                        @csrf
                                        <a class='delete btn btn-danger' href="" ><i class="fa fa-remove "></i> Delete</a>
                                    </form>
                                    <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                @endforeach
                            </tr>

                        </tbody>
                    </table>
                    {{ $employees->links() }}
                    @else
                    <div class="alert alert-warning">No employees added yet, <a href="{{route('employees.create')}}">Add Now</a> </div>
                @endif
            </div>

        </div>

    </div>
@endsection
