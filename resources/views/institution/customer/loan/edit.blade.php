@extends('layouts.institution')
@section('title', 'Edit Loan')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Loan</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="{{ url('institution/loans') }}" class="btn btn-primary float-right">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-sm-6">
                <form action="{{ route('institution.loan.update') }}" method="post">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $loan->id }}">
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" name="amount" value="{{ $loan->amount }}" placeholder="Enter loan amount" required>
                    </div>
                    <div class="form-group">
                        <label for="">Interest Rate</label>
                        <input type="text" class="form-control" name="interest_rate" value="{{ $loan->interest_rate }}" placeholder="Enter loan interest rate" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="btn" value="Update to process">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 