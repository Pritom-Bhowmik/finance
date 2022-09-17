<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class FrontEndController extends Controller
{
    public function client_fetch(Request $request){
        $user = User::where('id', $request->value)->first();
        return view('client', compact('user'));
    }
}
