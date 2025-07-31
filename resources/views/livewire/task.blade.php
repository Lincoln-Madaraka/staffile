<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Tasks</h1>
        <div class="w-full mt-1 ">
            <form method="POST" wire:submit.prevent="store">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                            title</label>
                        <input type="text" id="title" value="{{ old('title') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="ex: Write Article" required name="title" wire:model="title">
                        @error('title')
                            <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due
                            Date</label>
                        <input type="date" id="due_date" value="{{ old('due_date') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required name="due_date" wire:model="due_date">
                        @error('due_date')
                            <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="chooseCategory"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose Category</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="chooseCategory" name="category_id" wire:model="category_id" required>
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="assignedUser"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assigne to user</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="assignedUser" name="assigned_to_user_id" wire:model="assigned_to_user_id" required>
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('assigned_to_user_id')
                            <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    {{--  --}}
                </div>
                <div class="mb-2">
                    <label class="block text-sm text-gray-600" for="description">Description</label>
                    <textarea
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="message" name="description" wire:model="description" required>{{ old('description') }}</textarea>
                </div>
                <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded">Add
                    Task</button>
            </form>
        </div>
        <x-session-message />

        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Tasks Records
        </p>
        {{-- <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2" onclick="location.href='{{ route('admin.categories.create') }}';">Add Category</button> --}}
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
                            Added by</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Assigned to</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            DueDate</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Completed at</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $task->id }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $task->title }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $task->user->name }}</td>
                            <td
                                class="py-4 px-6 border-b border-grey-light {{ $task->assignedUser->name ?? 'text-red-700' }}">
                                {{ $task->assignedUser->name ?? 'Not Assigned' }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $task->due_date }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $task->completed_at ?? "Not Completed" }}</td>

                            <td class="py-4 px-6 border-b border-grey-light">
                                <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                    type="button"
                                    onclick="location.href='{{ route('admin.tasks.edit', $task->id) }}';">Edit</button>

                                {{-- <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded" type="button"  onclick="location.href='{{ route('admin.categories.edit', $category->id) }}';">Edit</button> --}}
                                <form type="submit" method="POST" style="display: inline"
                                    action="{{ route('admin.tasks.destroy', $task->id) }}"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded"
                                        type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </main>
</div>
