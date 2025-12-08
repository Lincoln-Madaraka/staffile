@extends('admin.layouts.admin')

@section('content')
<h2 class="text-xl font-bold mb-4">Payslips</h2>

<table class="w-full table-auto bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="px-4 py-2">Employee</th>
            <th class="px-4 py-2">Gross</th>
            <th class="px-4 py-2">Net</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salaries as $salary)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $salary->user->name }}</td>
                <td class="px-4 py-2">KES {{ number_format($salary->gross_salary) }}</td>
                <td class="px-4 py-2">KES {{ number_format($salary->net_salary) }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.payslips.show', $salary->id) }}" class="text-blue-600 hover:underline">View</a> |
                    <a href="{{ route('admin.payslips.download', $salary->id) }}" class="text-green-600 hover:underline">Download</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $salaries->links() }}
</div>
@endsection
