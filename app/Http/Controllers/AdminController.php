<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investment;
use App\Models\Loan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Raw;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_amount_loaned = Loan::where('status', 1)->sum('amount');
        $total_investment = Investment::sum('amount');
        $loans = Loan::join('users', 'loans.client_id', '=', 'users.id')
                ->select('loans.*', 'users.first_name', 'users.phone', 'users.email')
                ->get();
        return view('admin.index', compact('total_investment', 'total_amount_loaned','loans'));
    } 

    public function investments(){
        $investments = Investment::latest()->get();
        return view('admin.investments', compact('investments'));
    }

    public function investment_add(Request $request){
        $last_invst = Investment::orderBy('created_at', 'desc')->first();
        if($last_invst){
            Investment::create([
                'amount' => $request->amount,
                'previous_balance' => $last_invst->balance,
                'balance' => $last_invst->balance + $request->amount,
            ]);
        }else{
            Investment::create([
                'amount' => $request->amount,
                'previous_balance' => 0,
                'balance' => $request->amount,
            ]);
        }
        
        return redirect('admin/home')->with('msg','Investment successfully added');
    }

    //Institution CRUD

    public function institutions(){
        $institutions = User::where('type', 2)->get();
        return view('admin.institution.index', compact('institutions'));
    }
    
    public function create_institution(){
        return view('admin.institution.create');
    }

    public function institution_store(Request $request){
        User::create([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'type'       => 2,
            'password'   => Hash::make($request->password), 
        ]);
        return redirect('admin/institutions')->with('msg', 'Institution account created successfully');
    }

    public function edit_institution($id){
        $inst = User::where('id', $id)->first();
        return view('admin.institution.edit', compact('inst'));
    }

    public function institution_update(Request $request){
        User::where('id', $request->id)->update([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
        ]);
        return redirect('admin/institutions')->with('msg', 'Institution account updated successfully');
    }

    public function delete_institution($id){
        User::where('id', $id)->delete();
        return redirect('admin/institutions')->with('msg', 'Institution account deleted successfully');
    }

    //Cashier CRUD

    public function cashiers(){
        $cashiers = User::where('type', 3)->get();
        $institutions = User::where('type', 3)->get();
        return view('admin.cashier.index', compact('cashiers','institutions'));
    }

    // Report Search
    public function search(Request $request){

            

        if($fromdate = $request->from && $todate = $request->from){
            $fromdate = $request->from??date('Y-m-d');
            $todate = $request->to??date('Y-m-d');
            $type = 3;
            $cashiers = DB::table('users')->select()
            ->whereBetween('created_at', [date('Y-m-d', strtotime($fromdate)).' 00:00:00', date('Y-m-d', strtotime($todate)).' 00:00:00'])
            ->where('type', $type)
            ->get();
        }elseif($institution = $request->institution){
            $institution = $request->institution;
            $type = 3;
            $cashiers = DB::table('users')->select()
            ->where('first_name', $institution)
            ->where('type', $type)
            ->get();
        }else{
            return "OK";
        }

       
        $institutions = User::where('type', 2)->get();
        return view('admin.cashier.index', compact('cashiers','institutions'));
    }
    
    public function create_cashier(){
        $institutions = User::where('type', 2)->get();
        return view('admin.cashier.create', compact('institutions'));
    }

    public function cashier_store(Request $request){
        User::create([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'inst_id'    => $request->institution,
            'type'       => 3,
            'password'   => Hash::make($request->password), 
        ]);
        return redirect('admin/cashiers')->with('msg', 'Cashier account created successfully');
    }

    public function edit_cashier($id){
        $cashier           = User::where('id', $id)->first();
        $institutions   = User::where('type', 2)->get();
        return view('admin.cashier.edit', compact('cashier', 'institutions'));
    }

    public function cashier_update(Request $request){
        User::where('id', $request->id)->update([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'inst_id'    => $request->institution,
        ]);
        return redirect('admin/cashiers')->with('msg', 'cashier account updated successfully');
    }

    public function delete_cashier($id){
        
    }

    public function loan_requests(){
        $loans = Loan::join('users', 'loans.client_id', '=', 'users.id')
                ->where('loans.status', 0)
                ->select('loans.*', 'users.first_name', 'users.phone', 'users.email')
                ->get();
        return view('admin.loan.loan_requests', compact('loans'));
    }

    public function loan_request_approve($id){
        
        $date = date('M d, Y');
        $date = strtotime($date);
        $date = strtotime("+30 day", $date);
        $date = date('Y-m-d', $date);

        Loan::where('id', $id)->update([
            'status' => 1,
            'due_date' => $date,
            'updated_at' => date('Y-m-d h:i:sa')
        ]);

        return redirect('admin/loan-requests')->with('msg', 'Loan successfully approved');
    }

    public function loan_request_reject($id){
        Loan::where('id', $id)->update([
            'status' => 2
        ]);
        return redirect('admin/loan-requests')->with('msg', 'Loan successfully rejected');
    }

    public function loans(){
        $loans = Loan::join('users', 'loans.client_id', '=', 'users.id')
                ->where('loans.status', 1)
                ->select('loans.*', 'users.first_name', 'users.phone', 'users.email')
                ->get();
        return view('admin.loan.index', compact('loans'));
    }


    // Customers
    public function customers(){
        $customers = User::where('type', 0)->get();
        return view('admin.customer.index', compact('customers'));
    }
    public function customers_view($id){
        $customers = User::where('id', $id)->first();
        return view('admin.customer.view', compact('customers'));
    }
    public function customers_update(Request $request){
        User::where('id', $request->id)->update([
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address
        ]);
        return redirect('admin/customers')->with('msg', 'customers account updated successfully');
    }

    public function customer_delete($id){
        User::where('id', $id)->delete();
        return redirect('admin/customers')->with('msg', 'customers account deleted successfully');
    }

    // Users
    public function users(){
        $users = User::where('type', 0)->get();
        return view('admin.customer.index', compact('users'));
    }

}
