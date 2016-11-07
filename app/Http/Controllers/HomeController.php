<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Pilot;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->hasRole('Administrator')){
            $transection = Transaction::sum('amount');
        }
        elseif(Auth::user()->hasRole('Reseller')){
            $transection = Transaction::where('from','=',Auth::user()->id)->sum('amount');
        }
        elseif(Auth::user()->hasRole('Agent')){
            $transection = Transaction::where('to_id','=',Auth::user()->id)->sum('amount');
        }
        $reseller = User::where('role_id','=','3')->get()->count();
        $agent = User::where('role_id','=','4')->get()->count();


        return view('home', compact('reseller','transection','agent'));
    }
}
