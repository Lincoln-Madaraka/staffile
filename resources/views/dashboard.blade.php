<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gm-text">
            {{ __('Employee Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gm-card">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gm-muted">
                            {{ __("You're logged in!") }}
                        </p>
                    </div>

                    <div class="gm-card-muted p-4">
                        <livewire:user-salary-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
