<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-600 mb-6">Assign Salary</h1>

        <form wire:submit.prevent="store" class="bg-white p-6 rounded shadow-md dark:bg-gray-800">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Employee</label>
                    <select id="user_id" wire:model="user_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="">-- Choose --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="gross_salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gross Salary</label>
                    <input type="number" id="gross_salary" wire:model="gross_salary" min="0" step="any"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="e.g. 10000" required>
                    @error('gross_salary') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            
<button type="submit"
    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    {{ $salaryIdBeingEdited ? 'Update Salary' : 'Assign Salary' }}
</button>

        </form>

        <x-session-message />

        <h2 class="text-2xl font-semibold mt-10 mb-4 text-gray-300 dark:text-white">Payroll Records</h2>

        <div class="overflow-auto bg-white dark:bg-gray-800 rounded shadow-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 dark:bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Employee</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Gross</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">SHIF</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Housing Levy</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">PAYE (30%)</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Net Salary</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-600 g-gray-100 dark:bg-gray-100"">
                    @foreach ($salaries as $salary)
                        <tr>
                            <td class="px-6 py-4">{{ $salary->id }}</td>
                            <td class="px-6 py-4">{{ $salary->user->name }}</td>
                            <td class="px-6 py-4">Ksh {{ number_format($salary->gross_salary, 2) }}</td>
                            <td class="px-6 py-4">Ksh {{ number_format($salary->shif, 2) }}</td>
                            <td class="px-6 py-4">Ksh {{ number_format($salary->housing_levy, 2) }}</td>
                            <td class="px-6 py-4">Ksh {{ number_format($salary->paye, 2) }}</td>
                            <td class="px-6 py-4 font-semibold text-green-700">Ksh {{ number_format($salary->net_salary, 2) }}</td>
                            <td class="px-6 py-4">{{ $salary->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <button wire:click="edit({{ $salary->id }})"
                                    class="bg-blue-900 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Edit
                                </button>

                                <button wire:click="confirmDelete({{ $salary->id }})"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                {{ $salaries->links() }}
            </div>
        </div>
    </main>
</div>

