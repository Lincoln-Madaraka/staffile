<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Salary;
use Livewire\Component;

class UserSalaryTable extends Component
{
    public $salaries;

    public function mount()
    {
        // Load the logged-in user's salaries from DB
        $this->salaries = Salary::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.user-salary-table');
    }
}
