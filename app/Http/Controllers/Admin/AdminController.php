<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->name == "Admin") {

            $users = User::count();
            $categories = Category::count();
            $tasks = Task::count();
            $completedTasks = Task::whereCompleted(true)->count();

            return view('admin.index', compact('users', 'categories', 'tasks', 'completedTasks'));
        } elseif (auth()->user()->role->name == "Employee") {

            $tasks = Task::where('assigned_to_user_id', auth()->id())->count();
            $completedTasks = Task::whereCompleted(true)->where('assigned_to_user_id', auth()->id())->count();

            return view('admin.index', compact('tasks', 'completedTasks'));
        }
    }
}
