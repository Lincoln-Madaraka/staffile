<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Show Task</h1>

            <div class="w-full mt-4">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Task Details
                </p>

                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task
                            title</label>
                        {{ $task->title }}
                    </div>
                    <div class="mb-1">
                        <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due
                            Date</label>
                        {{ $task->due_date }}
                    </div>
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Completed</label>
                        {{ $task->completed ? "Yes" : "No" }}
                    </div>
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Completed Date</label>
                        {{ $task->completed_at ?? "None" }}
                    </div>
                    <div class="mb-1">
                        <label for="Category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        {{ $task->category->name }}
                    </div>
                    <div class="mb-1">
                        <label for="assignedUser"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assigne to</label>
                        {{ $task->user->name }}
                    </div>
                    <div class="mb-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Created By</label>
                        {{ $task->user->name }}
                    </div>
                    {{--  --}}
                </div>
                <div class="mb-2">
                    <label class="block text-sm text-gray-600" for="description">Description</label>
                    {{ $task->description }}
                </div>

                @if (!$task->completed)
                    <form type="submit" method="POST" style="display: inline"
                        action="{{ route('admin.complete_task.store', $task->id) }}"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                            type="submit">Mark Completed</button>
                    </form>
                @endif

            </div>
        </main>
    </div>
</x-admin-layout>
