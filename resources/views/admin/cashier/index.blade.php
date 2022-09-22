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
            <div class="col-sm-11">
                <form action="{{ url('admin/cashiers') }}" method="POST" id = "myForm">
                    @csrf
                    <div class="row form-inline">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="mr-1">From</label>
                                <input type="date" class="form-control" name="from">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="mr-1">To</label>
                                <input type="date" class="form-control" name="to">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="mr-1">Institution</label>
                                <select name="institution" id="" class="form-control">
                                    <option value="" disabled selected>Select institution</option>
                                    @foreach ($institutions as $item)
                                        <option value="{{ $item->first_name }}">{{ $item->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="button">
                                <button type="submit" class="btn btn-success">Filter</button>
                                <a href=""  onClick="reset()" class="btn btn-dark">Clear</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-1">
                <a href="{{ url('admin/cashier/create') }}" class="btn btn-primary float-right">Create</a>
            </div>
        </div> 
    </div>
    <div class="card-body">
        @if(session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Institution</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($cashiers) < 1)
                        <tr>
                            <td colspan="8">
                                No Search data found
                            </td>
                        </tr>
                    @else
                        @foreach ($cashiers as $key => $cashier)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $cashier->first_name }}</td>
                            <td>{{ $cashier->phone }}</td>
                            <td>{{ $cashier->email }}</td>
                            <td>{{ $cashier->address }}</td>
                            <td width="150">
                                <a href="{{ url('admin/cashier/edit') }}/{{ $cashier->id }}" class="btn btn-outline-primary">Edit</a>
                                <a href="{{ url('admin/cashier/delete') }}/{{ $cashier->id }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-danger">Trash</a>
                            </td>
                        </tr> 
                        @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>  
    function reset(){  
      document.getElementById("myForm").reset();  
    }   
   </script>  
@endsection