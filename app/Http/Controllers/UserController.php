<?php

namespace App\Http\Controllers;

use App\Constants\Role;
use App\Constants\Status;
use App\Http\Requests\UserRequst;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function taskStatus($id, Request $request)
    {
        if ($request->status == Status::INPROGRESS) {
            Task::find($id)->update([
                'status' => $request->status,
                'accepted_at' => now(),
            ]);
            return back()->with('success', 'Task status updated');
        } elseif ($request->status == Status::COMPLETE) {
            Task::find($id)->update([
                'status' => $request->status,
                'completed_at' => now(),
            ]);
            return back()->with('success', 'Task status updated');
        }
    }
}
