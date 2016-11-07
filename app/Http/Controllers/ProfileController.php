<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Pilot;
use App\User;
use App\Country;
use Auth;
use Session;
use Laracasts\Flash\Flash;


class ProfileController extends Controller
{

    public function index()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            return view('users.profile', compact('user'));
        }
    }


    public function update(Request $request)
    {

        $rule = [
            'name'          => 'required',
            'mobile'        => 'required ',
            'email'         => 'required',
        ];

        $this->validate($request,$rule );

        $data = $request->all();

        $user = User::find(Auth::user()->id);

        if($data['name']!='') $user->name = $data['name'];
        if(isset($data['password'])) $user->password = bcrypt($data['password']);
        if($data['mobile']!='') $user->mobile = $data['mobile'];
        if($data['pin_number']!='') $user->pin_number = $data['pin_number'];

        $user->save();

        Flash::message('Profile updated!');

        return redirect()->route('user.profile');
    }


}
