@extends('layouts.admin')
@section('title', 'All Institutions')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Institutions</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="{{ url('admin/institution/create') }}" class="btn btn-primary float-right">Create</a>
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
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($institutions as $key => $inst)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $inst->first_name }}</td>
                        <td>{{ $inst->phone }}</td>
                        <td>{{ $inst->email }}</td>
                        <td>{{ $inst->address }}</td>
                        <td width="150">
                            <a href="{{ url('admin/institution/edit') }}/{{ $inst->id }}" class="btn btn-outline-primary">Edit</a>
                            <a href="{{ url('admin/institution/delete') }}/{{ $inst->id }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-danger">Trash</a>
                        </td>
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection