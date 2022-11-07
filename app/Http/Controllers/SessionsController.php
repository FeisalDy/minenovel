<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login', ['title' => 'Login']);
    }
    
    public function store()
    {
        if (auth()->attempt(request(['name', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The username or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/home');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/login');
    }

}