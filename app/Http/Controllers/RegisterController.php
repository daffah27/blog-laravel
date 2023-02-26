<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Halaman Register',
            'active' => 'Login'
        ]);
   }

   public function store(Request $request){
    $validated = $request->validate([
        'name' => ['required', 'max:255'],
        'email' => ['required', 'email:dns', 'unique:users'],
        'password' => ['required', 'min:8'],
        'konfirpassword' => ['required','same:password', 'min:8']
    ]);
   
    $validated['is_admin'] = 0;

    $validated['password'] = bcrypt($validated['password']);
    User::create($validated);
    $request->session()->flash('succes', 'daftar berhasil, silahkan login');
    return redirect('/login');
   }
}
