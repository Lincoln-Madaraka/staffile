<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class UserPayslipController extends Controller
{
    public function download(Salary $salary)
    {
    if ($salary->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // ✅ Generate the PDF
        $pdf = Pdf::loadView('pdf.payslip', ['salary' => $salary]);

        return $pdf->download('payslip_' . now()->format('Ymd_His') . '.pdf');
    }
}