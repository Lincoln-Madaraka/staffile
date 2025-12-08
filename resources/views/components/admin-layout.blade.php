@props([
    'title' => null,
    'subtitle' => null,
    'actions' => null,
])

<div class="min-h-screen bg-gm-bg text-gm-text">
    <!-- Top Admin Bar -->
    <div class="border-b border-gm-border bg-gm-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="h-10 w-10 rounded-full bg-gm-surface2 border border-gm-border p-1 flex items-center justify-center">
                    <img
                        src="{{ asset('import/assets/logo.png') }}"
                        alt="{{ config('app.name', 'GiftMed') }} Logo"
                        class="h-8 w-8 rounded-full object-cover"
                    >
                </span>

                <div class="leading-tight">
                    <div class="text-sm text-gm-muted">Admin Panel</div>
                    <div class="text-base font-semibold tracking-wide">
                        {{ config('app.name', 'GiftMed') }}
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <span class="hidden sm:inline-flex text-xs gm-badge">
                    {{ Auth::user()->role?->name ?? 'user' }}
                </span>

                <div class="text-sm text-gm-muted">
                    {{ Auth::user()->name ?? '' }}
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="gm-btn-outline text-xs px-3 py-1.5"
                    >
                        Log out
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Page Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Title -->
        @if($title || $subtitle || $actions)
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                <div>
                    @if($title)
                        <h1 class="text-xl sm:text-2xl font-semibold text-gm-text">
                            {{ $title }}
                        </h1>
                    @endif

                    @if($subtitle)
                        <p class="text-sm text-gm-muted mt-1">
                            {{ $subtitle }}
                        </p>
                    @endif
                </div>

                @if($actions)
                    <div class="flex items-center gap-2">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        @endif

        <!-- Main Content Card Wrapper -->
        <div class="gm-card p-5 sm:p-6">
            {{ $slot }}
        </div>
    </div>
</div>
