@extends('layouts.cashier')
@section('title', 'Create Loan')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create Loan</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="{{ url('cashier/customers') }}" class="btn btn-primary float-right">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-sm-6">
                <form action="{{ route('cashier.loan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Client: </label>
                        <select name="client_id" id="client" class="form-control" required>
                            <option value="" selected hidden>Select One</option>
                            @foreach ($users as $user)
                            <option value="{{  $user->id }}">{{ $user->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="clientDetails">

                    </div>
                    
                    <div class="form-group">
                        <label for="">Amount: </label>
                        <input type="text" class="form-control" name="amount" placeholder="Enter loan amount" required>
                    </div>
                    <div class="form-group">
                        <label for="">Interest Rate: </label>
                        <input type="text" class="form-control" name="interest_rate" placeholder="Enter loan interest rate" required>
                    </div>
                    <div class="form-group">
                        <label for="">Repayment Date: </label>
                        <input type="date" class="form-control" name="repayment_date" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="btn" value="Submit to process" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#client').change(function() {
        if ($(this).val() != '') {
            var value = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('client.fetch') }}",
                method: "POST",
                data: {
                    value: value,
                    _token: _token
                },
                success: function(result) {
                    $('#clientDetails').html(result);
                    $("#btn").removeAttr('disabled');
                }

            })
        }
    });
</script>
@endsection