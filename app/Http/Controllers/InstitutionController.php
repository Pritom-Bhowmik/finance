<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Loan;
use App\Models\Notification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;
class InstitutionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $investment = Investment::get();
        $loan = Loan::where('status', '1')->get();
        return view('institution.dashboard',compact('investment','loan'));
    }

    public function customers(){
        $customers = User::where('type', 0)->where('inst_id', Auth::user()->id)->get();
        return view('institution.customer.index', compact('customers'));
    }

    public function create_customer(){ 
        $cashiers = User::where('type', 3)->where('inst_id', Auth::user()->id)->get();
        return view('institution.customer.create', compact('cashiers'));
    }

    public function customer_store(Request $request){
        User::create([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'inst_id'    => Auth::user()->id,
            'cashier_id'    => $request->cashier,
            'type'       => 0,
            'password'   => Hash::make($request->password), 
        ]);
        return redirect('institution/customers')->with('msg', 'Customer account created successfully');
    }

    public function edit_customer($id){
        $customer = User::where('id', $id)->first();
        $cashiers = User::where('type', 3)->where('inst_id', Auth::user()->id)->get();
        return view('institution.customer.edit', compact('customer', 'cashiers'));
    }
    
    public function customer_update(Request $request){
        User::where('id', $request->id)->update([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
        ]);
        return redirect('institution/customers')->with('msg', 'Customer account updated successfully');
    }
    public function delete_customer($id){

    }

    public function loans(){
        $loans = Loan::join('users', 'loans.client_id', '=', 'users.id')->where('loans.created_by', Auth::user()->id)->orWhere('loans.inst_id', Auth::user()->id)->select('loans.*', 'users.first_name', 'users.phone', 'users.email')->get();
        return view('institution.customer.loan.index', compact('loans'));
    }

    public function create_loan(){
        $users = User::where('type', 0)->where('inst_id', Auth::user()->id)->get();
        return view('institution.customer.loan.create', compact('users'));
    }

    public function store_loan(Request $request){

        $date1 = Date('Y-n-d');
        $date2 = $request->repayment_date;
        $d1=new DateTime($date2); 
        $d2=new DateTime($date1);                                  
        $Months = $d2->diff($d1); 
        $howeverManyMonths = (($Months->y) * 12) + ($Months->m);
        
        $loan = Loan::create([
            'client_id'                 => $request->client_id,
            'created_by'                => Auth::user()->id,
            'inst_id'                   => Auth::user()->id,
            'amount'                    => $request->amount,
            'interest_rate'             => $request->interest_rate,
            'guarantor_name'            => $request->guarantor_name,
            'guarantor_phone'           => $request->guarantor_phone,
            'repayment_date'            => $request->repayment_date,
            'tenure'                    => $howeverManyMonths 
        ]);

        Notification::create([
            'title'     => 'Created new loan by '.Auth::user()->first_name,
            'client_id' => $request->client_id,
            'inst_id'   => Auth::user()->id,
            'loan_id'   => $loan->id
        ]);
        return redirect('institution/loans')->with('msg', 'Loan Successfully Created');
    }

    public function edit_loan($id){
        $loan = Loan::where('id', $id)->where('status', 0)->first();
        if($loan){
            return view('institution.customer.loan.edit', compact('loan'));
        }else{
            return redirect('institution/loans')->with('err', 'Unable to edit when the loan activated or rejected or complted');
        }
    }

    public function update_loan(Request $request){
        Loan::where('id', $request->id)->update([ 
            'amount'                    => $request->amount,
            'interest_rate'             => $request->interest_rate
        ]);

        Notification::create([
            'title'     => 'Updated loan by '.Auth::user()->first_name, 
            'inst_id'   => Auth::user()->id,
            'loan_id'   => $request->id
        ]);
        return redirect('institution/loans')->with('msg', 'Loan Successfully Updated');
    }
}
