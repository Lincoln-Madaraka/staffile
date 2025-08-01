@extends('admin.layouts.admin')

@section('content')
<h2 class="text-xl font-bold mb-4">Payslip: {{ $salary->user->name }}</h2>

<div class="bg-white p-4 shadow rounded">
    <ul>
        <li><strong>Gross:</strong> KES {{ number_format($salary->gross_salary) }}</li>
        <li><strong>SHIF:</strong> KES {{ number_format($salary->shif) }}</li>
        <li><strong>Housing Levy:</strong> KES {{ number_format($salary->housing_levy) }}</li>
        <li><strong>PAYE:</strong> KES {{ number_format($salary->paye) }}</li>
        <li><strong>Net Salary:</strong> KES {{ number_format($salary->net_salary) }}</li>
    </ul>

    <a href="{{ route('admin.payslips.download', $salary->id) }}" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Download PDF
    </a>
</div>
@endsection
