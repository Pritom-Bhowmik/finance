@extends('layouts.institution')
@section('title', 'All Loans')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Loans</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="{{ url('institution/loans/create') }}" class="btn btn-primary float-right">Create</a>
            </div>
        </div> 
    </div>
    <div class="card-body">
        @if(session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Client</th>
                        <th>Phone</th>
                        <th>Guar. Name</th>
                        <th>Guar. Phone</th>
                        <th>Amount</th>
                        <th>Interest Rate</th>
                        <th width="10%">Due Date</th>
                        <th>Repayment Date</th>
                        <th>Tenure</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Client</th>
                        <th>Phone</th>
                        <th>Guar. Name</th>
                        <th>Guar. Phone</th>
                        <th>Amount</th>
                        <th>Interest Rate</th>
                        <th width="10%">Due Date</th>
                        <th>Repayment Date</th>
                        <th>Tenure</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($loans as $key => $loan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $loan->first_name }}</td>
                        <td>{{ $loan->phone }}</td>
                        <td>{{ $loan->guarantor_name }}</td>
                        <td>{{ $loan->guarantor_phone }}</td>
                        <td>${{ $loan->amount }}</td>
                        <td>{{ $loan->interest_rate }}%</td>
                        <td>{{ $loan->due_date }}</td>
                        <td>{{ $loan->repayment_date }}</td>
                        <td>
                            @if($loan->tenure > 0)
                            {{ $loan->tenure.' Months' }}
                            @endif
                        </td>
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
                        <td width="150">
                            <a href="{{ url('institution/loans/edit') }}/{{ $loan->id }}" class="btn btn-outline-primary">Edit</a>
                        </td>
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection