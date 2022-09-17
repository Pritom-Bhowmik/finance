@extends('layouts.admin')
@section('title', 'All Loan Requests')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Loan Requests</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Create Loan</a>
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
                        <th>Client</th> 
                        <th>Instiution/Cashier</th> 
                        <th>Amount</th> 
                        <th>Interest Rate</th>  
                        <th>Date</th>  
                        <th>Status</th>  
                        <th>Action</th> 
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Client</th> 
                        <th>Instiution</th> 
                        <th>Amount</th> 
                        <th>Interest Rate</th>  
                        <th>Date</th>  
                        <th>Status</th>  
                        <th>Action</th> 
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($loans as $key => $loan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $loan->first_name }}</td>
                        @php $inst = App\Models\User::where('id', $loan->inst_id)->first() @endphp  
                        <td>{{ $inst->first_name }}</td>
                        <td>{{ $loan->amount }}</td> 
                        <td>{{ $loan->interest_rate }}%</td> 
                        <td>{{ date('d M, Y', strtotime($loan->created_at)) }}</td> 
                        <td>
                            @if($loan->status == 0)
                                <span class="badge badge-info">In Progress</span>
                            @elseif($loan->status == 1)
                                <span class="badge badge-success">Approved</span>
                            @elseif($loan->status == 2)
                                <span class="badge badge-danger">Rejected</span>
                            @elseif($loan->status == 3)
                                <span class="badge badge-success">Completed</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/loan-requests/status/approve') }}/{{ $loan->id }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to approved this loan?');">Approve</a>
                            <a href="{{ url('admin/loan-requests/status/reject') }}/{{ $loan->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to reject this loan?');">Reject</a>
                        </td> 
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
  
@endsection