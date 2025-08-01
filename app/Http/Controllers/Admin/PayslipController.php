<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use PDF;

class PayslipController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('user')->paginate(10);
        return view('admin.payslips.index', compact('salaries'));
    }

    public function show(Salary $salary)
    {
        return view('admin.payslips.show', compact('salary'));
    }

    public function download(Salary $salary)
    {
        $pdf = PDF::loadView('admin.payslips.template', compact('salary'));
        return $pdf->download("payslip_{$salary->user->name}.pdf");
    }
}
