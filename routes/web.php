<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\FrontEndController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cashier/login', function () {
    return view('cashier.login');
});

Route::get('/institution/login', function () {
    return view('institution.login');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/customer/login', function () {
    return view('customer.login');
});

Route::post('client/fetch', [FrontEndController::class, 'client_fetch'])->name('client.fetch');

Auth::routes(['verify' => true]);

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

    Route::post('/admin/investment/add', [AdminController::class, 'investment_add'])->name('admin.investment.add');
    Route::get('/admin/investments', [AdminController::class, 'investments']);
   
    Route::get('/admin/customers', [AdminController::class, 'customers']);
    Route::get('/admin/customer/view/{id}', [AdminController::class, 'customers_view']);
    Route::post('/admin/customer/update', [AdminController::class, 'customers_update'])->name('admin.customer.update');
    Route::get('/admin/customer/delete/{id}', [AdminController::class, 'customer_delete']);

    Route::get('/admin/users', [AdminController::class, 'users']);
    // Route::get('/admin/customer/view/{id}', [AdminController::class, 'customers_view']);
    // Route::post('/admin/customer/update', [AdminController::class, 'customers_update'])->name('admin.customer.update');
    // Route::get('/admin/customer/delete/{id}', [AdminController::class, 'customer_delete']);

    Route::get('/admin/institutions', [AdminController::class, 'institutions']);
    Route::get('/admin/institution/create', [AdminController::class, 'create_institution']);
    Route::get('/admin/institution/edit/{id}', [AdminController::class, 'edit_institution']);
    Route::post('/admin/institution/store', [AdminController::class, 'institution_store'])->name('admin.institution.store');
    Route::post('/admin/institution/update', [AdminController::class, 'institution_update'])->name('admin.institution.update');
    Route::get('/admin/institution/delete/{id}', [AdminController::class, 'delete_institution']);

    Route::get('/admin/cashiers', [AdminController::class, 'cashiers']);
    Route::get('/admin/cashier/create', [AdminController::class, 'create_cashier']);
    Route::get('/admin/cashier/edit/{id}', [AdminController::class, 'edit_cashier']);
    Route::post('/admin/cashier/store', [AdminController::class, 'cashier_store'])->name('admin.cashier.store');
    Route::post('/admin/cashier/update', [AdminController::class, 'cashier_update'])->name('admin.cashier.update');
    Route::get('/admin/cashier/delete/{id}', [AdminController::class, 'delete_cashier']);

    // Report Search
    // search_date_of_birth
    Route::post('/admin/cashiers', [AdminController::class, 'search']);

    Route::get('/admin/loan-requests', [AdminController::class, 'loan_requests']);
    Route::get('admin/loan-requests/status/approve/{id}', [AdminController::class, 'loan_request_approve']);
    Route::get('admin/loan-requests/status/reject/{id}', [AdminController::class, 'loan_request_reject']);

    Route::get('admin/loans', [AdminController::class, 'loans']);

    // Route::get('/admin/cashiers', [AdminController::class, 'cashiers']);
});
  
/*------------------------------------------
--------------------------------------------
Institution Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:institution'])->group(function () {
  
    Route::get('institution/home', [InstitutionController::class, 'index'])->name('institution.home');

    Route::get('institution/customers', [InstitutionController::class, 'customers']);
    Route::get('institution/customers/create', [InstitutionController::class, 'create_customer']);
    Route::get('institution/customers/edit/{id}', [InstitutionController::class, 'edit_customer']);
    Route::post('institution/customers/store', [InstitutionController::class, 'customer_store'])->name('institution.customer.store');
    Route::post('institution/customers/update', [InstitutionController::class, 'customer_update'])->name('institution.customer.update');
    Route::get('institution/customers/delete/{id}', [InstitutionController::class, 'delete_customer']);

    Route::get('institution/loans', [InstitutionController::class, 'loans']);
    Route::get('institution/loans/create', [InstitutionController::class, 'create_loan']);
    Route::get('institution/loans/edit/{id}', [InstitutionController::class, 'edit_loan']);
    Route::post('institution/loans/store', [InstitutionController::class, 'store_loan'])->name('institution.loan.store');
    Route::post('institution/loans/update', [InstitutionController::class, 'update_loan'])->name('institution.loan.update');
    Route::get('institution/loans/delete/{id}', [InstitutionController::class, 'delete_loan']);
});
  

/*------------------------------------------
--------------------------------------------
Cashier Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:cashier'])->group(function () {
  
    Route::get('cashier/home', [CashierController::class, 'index'])->name('cashier.home');

    Route::get('cashier/customers', [CashierController::class, 'customers']);
    Route::get('cashier/customers/create', [CashierController::class, 'create_customer']);
    Route::get('cashier/customers/edit/{id}', [CashierController::class, 'edit_customer']);
    Route::post('cashier/customers/store', [CashierController::class, 'customer_store'])->name('cashier.customer.store');
    Route::post('cashier/customers/update', [CashierController::class, 'customer_update'])->name('cashier.customer.update');
    Route::get('cashier/customers/delete/{id}', [CashierController::class, 'delete_customer']);

    Route::get('cashier/loans', [CashierController::class, 'loans']);
    Route::get('cashier/loans/create', [CashierController::class, 'create_loan']);
    Route::get('cashier/loans/edit/{id}', [CashierController::class, 'edit_loan']);
    Route::post('cashier/loans/store', [CashierController::class, 'store_loan'])->name('cashier.loan.store');
    Route::post('cashier/loans/update', [CashierController::class, 'update_loan'])->name('cashier.loan.update');
    Route::get('cashier/loans/delete/{id}', [CashierController::class, 'delete_loan']);
});
  