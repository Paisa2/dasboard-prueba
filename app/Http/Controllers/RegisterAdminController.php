<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    public function create(){
        return view('admin.registerAdmin');
    }

    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'cargo' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required',

        ]);

        $user = User::create(request(['name','cargo','email','password', 'role']));

        auth()->login($user);
        return redirect()->to('/admin');
    }
}
