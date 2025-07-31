<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">My Assigned Tasks</h1>

            <x-session-message />

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> My Assigned Tasks Records
                </p>
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ID</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Title</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Due Date</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Completed At</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Created By</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authAssignedTasks as $task)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $task->id }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $task->title }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $task->due_date }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $task->completed_at ?? 'None' }}
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $task->user->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">

                                        <button
                                            class="px-4 py-1 text-white font-light tracking-wider bg-orange-500 rounded"
                                            type="button"
                                            onclick="location.href='{{ route('admin.single_assign_task.show', $task->id) }}';">Show</button>

                                        @if (!$task->completed)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.complete_task.store', $task->id) }}"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                <button
                                                    class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                    type="submit">Mark Completed</button>
                                            </form>
                                        @endif

                                        <form type="submit" method="POST" style="display: inline"
                                            action="{{ route('admin.users.destroy', $task->id) }}"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded"
                                                type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {!! $authAssignedTasks->links() !!}
        </main>
    </div>
</x-admin-layout>
