<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Salary;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->name == "Admin") {

            $users = User::count();
            $salaries = Salary::count();

            return view('admin.index', compact('users', 'salaries'));
        } 
    }
}
