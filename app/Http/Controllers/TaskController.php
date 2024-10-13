<?php

namespace App\Http\Controllers;

use App\Constants\Role;
use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function create()
    {
        $users = User::whereRole(Role::USER)->get();
        return view('task.create', ['users' => $users]);
    }
    public function store(TaskStoreRequest $request)
    {
        Task::create($request->validated());
        return redirect('dashboard');
    }
}
