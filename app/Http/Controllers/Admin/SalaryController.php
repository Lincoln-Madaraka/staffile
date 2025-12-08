<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Http\Requests\SalaryRequest;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('user')->paginate(15);
        return view('admin.salary.index');
    }

    public function edit(Salary $salary)
    {

        $users = User::select('id', 'name')->get();

        return view('admin.salary.edit', compact('salary', 'users'));
    }

    public function update(SalaryRequest $request, Salary $salary)
    {
        $data = $request->validated();

        $gross = $data['gross_salary'];

        $shif = 500;
        $housing_levy = 500;
        $paye = $gross * 0.30;
        $net_salary = $gross - ($shif + $housing_levy + $paye);

        $data['shif'] = $shif;
        $data['housing_levy'] = $housing_levy;
        $data['paye'] = $paye;
        $data['net_salary'] = $net_salary;
        $salary->update($data->validated() + ['user_id' => auth()->id()]);

        return to_route('admin.salary.index')->with('message', 'Salary Updated');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();

        return to_route('admin.salary.index')->with('message', 'Salary Deleted !');
    }

    public function showAuthAssignedSalaries()
    {
        $authAssignedSalaries = Salary::with('user')
            ->where('assigned_to_user_id', auth()->id())
            ->paginate(15);

        return view('admin.salary.assigned_salary', compact('authAssignedSalaries'));
    }

   

    public function showSingleAssignedSalary($id)
    {
        $salary = Salary::with('user')
            ->where('assigned_to_user_id', auth()->id())->findOrFail($id);

        return view('admin.salary.show_single_assign_salary', compact('salary'));
    }
}
