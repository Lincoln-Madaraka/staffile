<x-admin-layout>
<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
<main class="w-full flex-grow p-6">
<h1 class="w-full text-3xl text-black pb-6">My Assigned Salaries</h1>

<x-session-message />

<div class="w-full mt-12">
<p class="text-xl pb-3 flex items-center">
<i class="fas fa-list mr-3"></i> My Assigned Salary Records
</p>

<div class="bg-white overflow-auto">
<table class="text-left w-full border-collapse">
<thead>
<tr>
<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Employee Name</th>
<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Gross Salary</th>
<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">SHIF Deduction</th>
<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Housing Levy Deduction</th>
<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">PAYE (30%) Deduction</th>
<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Net Salary</th>
<th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Manage</th>
</tr>
</thead>
<tbody>
@foreach ($assignedSalaries as $salary)
<tr class="hover:bg-grey-lighter">
<td class="py-4 px-6 border-b border-grey-light">{{ $salary->id }}</td>
<td class="py-4 px-6 border-b border-grey-light">{{ $salary->user->name }}</td>
<td class="py-4 px-6 border-b border-grey-light">{{ number_format($salary->gross_salary, 2) }}</td>
<td class="py-4 px-6 border-b border-grey-light">{{ number_format($salary->shif, 2) }}</td>
<td class="py-4 px-6 border-b border-grey-light">{{ number_format($salary->housing_levy, 2) }}</td>
<td class="py-4 px-6 border-b border-grey-light">{{ number_format($salary->paye, 2) }}</td>
<td class="py-4 px-6 border-b border-grey-light">{{ number_format($salary->net_salary, 2) }}</td>
<td class="py-4 px-6 border-b border-grey-light">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded" 
        onclick="location.href='{{ route('admin.salaries.show', $salary->id) }}'">Show</button>

    <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded" 
        onclick="location.href='{{ route('admin.salaries.edit', $salary->id) }}'">Edit</button>

    <form method="POST" action="{{ route('admin.salaries.destroy', $salary->id) }}" style="display:inline;" 
          onsubmit="return confirm('Are you sure?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded">Delete</button>
    </form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
{!! $assignedSalaries->links() !!}
</main>
</div>
</x-admin-layout>
