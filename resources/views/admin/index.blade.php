@extends('layouts.admin')
@section('title', 'Dashbaord')
@section('content')
<style>
    a:hover{
        text-decoration: none;
    }
</style>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Add Investment</a>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create Loan</a>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-dollar-sign fa-sm text-white-50"></i> Receive Payment</a> --}}
</div>
<div class="row">
    @if(session('msg'))
        <div class="alert alert-success ml-3">{{session('msg')}}</div>
    @endif
</div>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ url('admin/investments') }}">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Investment</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{$total_investment}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Amount Loaned</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $total_amount_loaned }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Cash On Hand</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $total_investment - $total_amount_loaned }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Profit</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Load Section --}}
<section id="dashboard-loan" class="mt-4 mb-3">
    <h1 class="text-center">Loan Table</h1>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Client</th> 
                        <th>Instiution</th> 
                        <th>Amount</th> 
                        <th>Interest Rate</th>  
                        <th>Approved At</th>  
                        <th>Total Loan</th>  
                        <th>Status</th>   
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loans as $key => $loan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $loan->first_name }}</td>
                            @php $inst = App\Models\User::where('id', $loan->inst_id)->first() @endphp  
                            <td>{{ $inst->first_name }}</td>
                            <td>${{ $loan->amount }}</td> 
                            <td>{{ $loan->interest_rate }}%</td> 
                            <td>{{ date('d M, Y', strtotime($loan->updated_at)) }}</td> 
                            {{-- <td>{{ date('d M, Y', strtotime($loan->due_date)) }}</td> --}}
                            <td>
                                @php
                                    $totalloan = $loan->amount;
                                    $interest = $loan->interest_rate;
                                    echo '$'.$totalloan + $totalloan/100*$interest;
                                @endphp
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
                        </tr> 
                        @endforeach 
                </tbody>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Client</th> 
                        <th>Instiution</th> 
                        <th>Amount</th> 
                        <th>Interest Rate</th>  
                        <th>Approved At</th>  
                        <th>Total Loan</th>  
                        <th>Status</th>   
                    </tr>
                </tfoot>
            </table>    
        </div>    
    </div>    
</section> 

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