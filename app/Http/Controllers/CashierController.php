<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Loan;
use App\Models\Notification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Auth;
class CashierController extends Controller
{
    public function index(){
        return view('cashier.dashboard');
    }

    public function customers(){
        $customers = User::where('type', 0)->where('cashier_id', Auth::user()->id)->get();
        return view('cashier.customer.index', compact('customers'));
    }

    public function create_customer(){ 
        $cashiers = User::where('type', 3)->where('inst_id', Auth::user()->id)->get();
        return view('cashier.customer.create', compact('cashiers'));
    }

    public function customer_store(Request $request){
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('photos/customer'), $imageName);
        User::create([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'photo'      => $imageName,
            'inst_id'    => Auth::user()->inst_id,
            'cashier_id' => Auth::user()->id,
            'type'       => 0,
            'password'   => Hash::make($request->password), 
        ]);
        return redirect('cashier/customers')->with('msg', 'Customer account created successfully');
    }

    public function edit_customer($id){
        $customer = User::where('id', $id)->first(); 
        return view('cashier.customer.edit', compact('customer'));
    }
    
    public function customer_update(Request $request){
        User::where('id', $request->id)->update([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
        ]);
        return redirect('cashier/customers')->with('msg', 'Customer account updated successfully');
    }
    public function delete_customer($id){

    }

    public function loans(){
        $loans = Loan::join('users', 'loans.client_id', '=', 'users.id')->where('loans.created_by', Auth::user()->id)->orWhere('loans.inst_id', Auth::user()->inst_id)->select('loans.*', 'users.first_name', 'users.phone', 'users.email')->get();
        return view('cashier.customer.loan.index', compact('loans')); 
    }

    public function create_loan(){
        $users = User::where('type', 0)->where('cashier_id', Auth::user()->id)->get();
        return view('cashier.customer.loan.create', compact('users'));
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
            'inst_id'                   => Auth::user()->inst_id,
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
            'inst_id'   => Auth::user()->inst_id,
            'loan_id'   => $loan->id
        ]);
        return redirect('cashier/loans')->with('msg', 'Loan Successfully Created');
    }

    public function edit_loan($id){
        $loan = Loan::where('id', $id)->where('status', 0)->first();
        if($loan){
            return view('cashier.customer.loan.edit', compact('loan'));
        }else{
            return redirect('cashier/loans')->with('err', 'Unable to edit when the loan activated or rejected or complted');
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
        return redirect('cashier/loans')->with('msg', 'Loan Successfully Updated');
    }

}
