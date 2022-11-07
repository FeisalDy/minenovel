<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
 
class RegistrationController extends Controller
{
    public function create()
    {
        return view('register', ['title' => 'Register']);
    }
 
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        
        $user = User::create(request(['name', 'email', 'password', 'role']));
        
        auth()->login($user);
        
        return redirect()->to('/home');
    }
}