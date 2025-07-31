<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Edit Task</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Tasks Details
                </p>
                <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="mb-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                                title</label>
                            <input type="text" id="title" value="{{ $task->title }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="ex: Write Article" required name="title">
                            @error('title')
                                <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due
                                Date</label>
                            <input type="date" id="due_date" value="{{ $task->due_date }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required name="due_date">
                            @error('due_date')
                                <div class="bg-yellow-300 text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="chooseCategory"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose Category</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="chooseCategory" name="category_id" required>
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                id="assignedUser" name="assigned_to_user_id" required>
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
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
                            id="message" name="description" required>{{ $task->description }}</textarea>
                    </div>
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded">Update
                        Category</button>
                </form>
            </div>
        </main>
    </div>
</x-admin-layout>
