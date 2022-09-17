@extends('layouts.cashier')
@section('title', 'All Customers')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Customers</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="{{ url('cashier/customers/create') }}" class="btn btn-primary float-right">Create</a>
            </div>
        </div> 
    </div>
    <div class="card-body">
        @if(session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($customers as $key => $customer)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td><a href="{{ asset('photos/customer') }}/{{ $customer->photo }}" target="_blank"><img src="{{ asset('photos/customer') }}/{{ $customer->photo }}" alt="" height="50" width="50"></a></td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td width="150">
                            <a href="{{ url('cashier/customers/edit') }}/{{ $customer->id }}" class="btn btn-outline-primary">Edit</a>
                            <a href="{{ url('cashier/customers/delete') }}/{{ $customer->id }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-danger">Trash</a>
                        </td>
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection