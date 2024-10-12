<?php

namespace App\Http\Controllers;

use App\Constants\Role;
use App\Http\Requests\UserRequst;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereRole(Role::USER)->get();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }
    public function store(UserRequst $request)
    {
        User::create($request->validated());
        return redirect()->route('user.index')->with('success', 'User created');
    }
}
