<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <p class="pl-10 text-xl flex items-center">
                <i class="fas fa-list mr-3"></i> Statistics
            </p>
            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-6">
                @can('admin-only')
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
                        <div class="px-10 py-6">
                            <div class="font-bold text-xl mb-2 text-center">Users</div>
                            <p class="text-gray-700 text-5xl text-center">
                                {{ $users }}
                            </p>
                        </div>
                    </div>

                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
                        <div class="px-10 py-6">
                            <div class="font-bold text-xl mb-2 text-center">Categories</div>
                            <p class="text-gray-700 text-5xl text-center">
                                {{ $categories }}
                            </p>
                        </div>
                    </div>
                @endcan

                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
                    <div class="px-10 py-6">
                        <div class="font-bold text-xl mb-2 text-center">Tasks</div>
                        <p class="text-gray-700 text-5xl text-center">
                            {{ $tasks }}
                        </p>
                    </div>
                </div>

                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
                    <div class="px-10 py-6">
                        <div class="font-bold text-xl mb-2 text-center">Completed Tasks</div>
                        <p class="text-gray-700 text-5xl text-center">
                            {{ $completedTasks }}
                        </p>
                    </div>
                </div>

            </div>
        </main>
    </div>

</x-admin-layout>
