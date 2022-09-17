@extends('layouts.admin')
@section('title', 'Create Cashier')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create Cashier</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="{{ url('admin/cashiers') }}" class="btn btn-primary float-right">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-sm-6">
                <form action="{{ route('admin.cashier.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Enter cashier name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Select Institution</label>
                        <select name="institution" id="" class="form-control">
                                <option value="">Select One</option>
                            @foreach ($institutions as $inst)
                                <option value="{{ $inst->id }}">{{ $inst->first_name }}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" placeholder="Enter a email address" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" placeholder="Enter phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="" rows="3" class="form-control" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Enter confirm password" name="password_confirmation">
                    </div>
                    <div class="form-group"> 
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection