@extends('layouts.admin')
@section('title', 'All Investments')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Investments</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add Investment</a>
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
                        <th>Amount</th> 
                        <th>Balance</th> 
                        <th>Date</th> 
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Amount</th> 
                        <th>Balance</th> 
                        <th>Date</th> 
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($investments as $key => $investment)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $investment->amount }}</td>  
                        <td>{{ $investment->balance }}</td>
                        <td>{{ $investment->created_at }}</td> 
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Investment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.investment.add') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" placeholder="Enter amount" class="form-control" name="amount">
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div> 
    </div>
  </div>
</div>
@endsection