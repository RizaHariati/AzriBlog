<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authentification.Register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:25|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'gender' => 'required',
        ]);
        $validated['password'] = Hash::make($request->password);
        $validated['username'] = Str::slug($request->name);
        User::create($validated);
        return redirect('/login')->with('success', 'Registration was successful!');
    }

    public function edit()
    {
        return view('authentification.edit');
    }
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'gender' => 'required',
        ]);
        $validated['password'] = bcrypt('password');
        $validated['email'] = auth()->user()->email;
      
        $user->update($validated);
        auth()->logout();
    

        return redirect('/')->with('success', 'Data updated, You are logged out');
    }
}
