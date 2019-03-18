@extends('CRM.layouts.master')
@section('title') Add Company @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Company</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <form  action="#" method="post" enctype="multipart/form-data">
                {{--@csrf--}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <label class="label label-primary" for="company_name">Company Name</label>
                <div class="form-group">
                    <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Enter Company Name">
                </div>

                <label class="label label-primary" for="company_email">Company Email</label>
                <div class="form-group">
                    <input type="email" id="company_email" name="company_email" class="form-control" placeholder="Enter Company Email">
                </div>
                <label class="label label-primary" for="company_logo">Company Logo</label>
                <div class="form-group">
                    <input type="file" id="company_logo" name="company_logo" class="form-control">
                </div>
                <label class="label label-primary" for="company_website">Company Website</label>
                <div class="form-group">
                    <input type="text" id="company_website" name="company_website" class="form-control" placeholder="Enter Company Website">
                </div>
                <a href="#" class="btn btn-primary btn-block" style="display: inline-block;" id="submit">Add</a>

            </form>
        </div>

    </div>
@endsection

