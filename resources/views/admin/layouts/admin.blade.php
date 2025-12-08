<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GiftMed - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-gm-bg text-gm-text">
    <div class="min-h-screen flex">

        {{-- Sidebar --}}
        <aside class="w-72 hidden md:flex flex-col border-r border-gm-border bg-gm-surface">
            <div class="p-6 border-b border-gm-border">
                <a href="{{ route('admin.index') }}" class="flex items-center gap-3">
                    <span class="h-10 w-10 rounded-full bg-gm-surface2 border border-gm-border p-1 flex items-center justify-center">
                        <img src="{{ asset('import/assets/logo.png') }}"
                             alt="GiftMed Logo"
                             class="h-8 w-8 rounded-full object-cover">
                    </span>
                    <div>
                        <div class="text-sm text-gm-muted">GiftMed</div>
                        <div class="text-lg font-semibold tracking-wide">Admin Panel</div>
                    </div>
                </a>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                {{-- ONLY links that EXIST right now --}}
                <a href="{{ route('admin.index') }}"
                   class="block px-3 py-2 rounded-lg text-sm font-medium
                          {{ request()->routeIs('admin.index') ? 'bg-gm-surface2 border border-gm-border' : 'hover:bg-gm-surface2' }}">
                    Dashboard
                </a>

                {{-- Future modules placeholders (no route() calls) --}}
                <div class="mt-6">
                    <div class="text-xs uppercase tracking-wider text-gm-muted px-3 mb-2">
                        Coming Next
                    </div>
                    <div class="px-3 py-2 rounded-lg text-sm text-gm-muted border border-gm-border/40 bg-gm-surface2/40">
                        Doctors
                    </div>
                    <div class="px-3 py-2 rounded-lg text-sm text-gm-muted border border-gm-border/40 bg-gm-surface2/40 mt-2">
                        Patients
                    </div>
                    <div class="px-3 py-2 rounded-lg text-sm text-gm-muted border border-gm-border/40 bg-gm-surface2/40 mt-2">
                        Appointments
                    </div>
                </div>
            </nav>

            <div class="p-4 border-t border-gm-border">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="gm-btn w-full">
                        Sign Out
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main --}}
        <div class="flex-1 flex flex-col min-h-screen">

            {{-- Top bar (mobile + desktop) --}}
            <header class="border-b border-gm-border bg-gm-surface">
                <div class="px-4 md:px-8 py-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="md:hidden h-9 w-9 rounded-full bg-gm-surface2 border border-gm-border p-1 flex items-center justify-center">
                            <img src="{{ asset('import/assets/logo.png') }}"
                                 alt="GiftMed Logo"
                                 class="h-7 w-7 rounded-full object-cover">
                        </span>
                        <div>
                            <div class="text-xs text-gm-muted">GiftMed</div>
                            <div class="text-base font-semibold">Admin</div>
                        </div>
                    </div>

                    <div class="text-sm text-gm-muted">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </div>
                </div>
            </header>

            {{-- Content --}}
            <main class="flex-1 px-4 md:px-8 py-6">
                @yield('content')
            </main>

            <footer class="border-t border-gm-border bg-gm-surface px-4 md:px-8 py-4 text-xs text-gm-muted">
                Developed by Lincoln
            </footer>
        </div>
    </div>

    @livewireScripts
</body>
</html>
