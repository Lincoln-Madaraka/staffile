<?php

namespace App\Http\Livewire;

use App\Models\Salary as SalaryModel;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class Salary extends Component
{
    use WithPagination;

    public $salaryIdBeingEdited = null;

    public $user_id;
    public $gross_salary;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'gross_salary' => 'required|numeric|min:0',
    ];


    public function store()
    {
        $this->validate();

        // Calculate deductions
        $shif = 500; // fixed deduction
        $housing_levy = 500; // fixed deduction
        $paye = $this->gross_salary * 0.3; // 30% PAYE

        $net_salary = $this->gross_salary - ($shif + $housing_levy + $paye);

        SalaryModel::create([
            'user_id' => $this->user_id,
            'amount' => $net_salary,
            'gross_salary' => $this->gross_salary,
            'shif' => $shif,
            'housing_levy' => $housing_levy,
            'paye' => $paye,
            'net_salary' => $net_salary,
        ]);
        if ($this->salaryIdBeingEdited) {
            $salary = SalaryModel::findOrFail($this->salaryIdBeingEdited);
            $salary->update([
                'user_id' => $this->user_id,
                'amount' => $net_salary,
                'gross_salary' => $this->gross_salary,
                'shif' => $shif,
                'housing_levy' => $housing_levy,
                'paye' => $paye,
                'net_salary' => $net_salary,
            ]);

            session()->flash('message', 'Salary updated successfully!');
        } else {
            SalaryModel::create([
                'user_id' => $this->user_id,
                'amount' => $net_salary,
                'gross_salary' => $this->gross_salary,
                'shif' => $shif,
                'housing_levy' => $housing_levy,
                'paye' => $paye,
                'net_salary' => $net_salary,
            ]);

            session()->flash('message', 'Salary assigned successfully!');
        }
        $this->reset(['user_id', 'gross_salary']);
          
    }
    public function edit($id)
    {
        $salary = SalaryModel::findOrFail($id);
        $this->salaryIdBeingEdited = $salary->id;
        $this->user_id = $salary->user_id;
        $this->gross_salary = $salary->gross_salary;
    }

    public function delete($id)
    {
        SalaryModel::findOrFail($id)->delete();
        session()->flash('message', 'Salary record deleted.');
    }

    public function cancelEdit()
    {
        $this->reset(['user_id', 'gross_salary', 'salaryIdBeingEdited']);
    }

    public function render()
    {
        return view('livewire.salary', [
            'salaries' => SalaryModel::with('user')->paginate(15),
            'users' => User::select('id', 'name')->get(),
        ]);
    }
}
