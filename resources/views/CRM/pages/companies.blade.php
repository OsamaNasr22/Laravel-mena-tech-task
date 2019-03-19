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
                @if($companies->count())

                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>
                                    <img src="{{asset('storage/company/'.$company->logo)}}" class="img-responsive" width="60" height="60">
                                </td>
                                <td>{{$company->website}}</td>
                                <td id="manage">
                                    <form method="post" action="{{route('companies.destroy',$company->id)}}" style="display: inline">
                                        {{method_field('delete')}}
                                        @csrf
                                        <a class='delete btn btn-danger' href="" ><i class="fa fa-remove "></i> Delete</a>
                                    </form>
                                    <a href="{{route('companies.edit',$company->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                @endforeach

                            </tr>

                        </tbody>
                    </table>
                    {{ $companies->links() }}
                    @else

                    <div class="alert alert-warning">No companies added yet, <a href="{{route('companies.create')}}">Add Now</a> </div>
                @endif
            </div>
        </div>
    </div>
@endsection
