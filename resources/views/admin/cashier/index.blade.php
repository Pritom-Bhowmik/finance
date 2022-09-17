@extends('layouts.admin')
@section('title', 'All Cashier')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Cashier</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="{{ url('admin/cashier/create') }}" class="btn btn-primary float-right">Create</a>
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
                        <th>Institution</th>
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
                        <th>Institution</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($cashiers as $key => $cashier)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $cashier->first_name }}</td>
                        @php $inst = App\Models\User::where('id', $cashier->inst_id)->first(); @endphp
                        <td>{{ $inst->first_name }}</td>
                        <td>{{ $cashier->phone }}</td>
                        <td>{{ $cashier->email }}</td>
                        <td>{{ $cashier->address }}</td>
                        <td width="150">
                            <a href="{{ url('admin/cashier/edit') }}/{{ $cashier->id }}" class="btn btn-outline-primary">Edit</a>
                            <a href="{{ url('admin/cashier/delete') }}/{{ $cashier->id }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-danger">Trash</a>
                        </td>
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection