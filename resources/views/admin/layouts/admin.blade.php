<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks Management - Admin Panel</title>
    <meta name="author" content="Yasser Elgammal">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #ffa500;
        }

        .cta-btn {
            color: #ffa500;
        }

        .upgrade-btn {
            background: #ff9000;
        }

        .upgrade-btn:hover {
            background: #ff9000;
        }

        .active-nav-link {
            background: #ff9000;
        }

        .nav-item:hover {
            background: #ff9000;
        }

        .account-link:hover {
            background: #ffa500;
        }
    </style>
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);

        .active\:bg-gray-50:active {
            --tw-bg-opacity: 1;
            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
        }
    </style>
    @livewireStyles
</head>

<body class="bg-gray-200 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-4">
            <a href="{{ route('admin.index') }}"
                class="text-white text-3xl font-semibold uppercase hover:text-gray-300">

                @can('admin-only')
                    Admin
                @else
                    Employee
                @endcan

            </a>
            {{-- <button onclick="location.href='{{ route('admin.post.create') }}';"
                class="w-full bg-white cta-btn font-semibold py-2 mt-1 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Post
            </button> --}}
        </div>
        <nav class="text-white text-base font-semibold">
            <a href="{{ route('admin.index') }}"
                class="{{ request()->routeIs('admin.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            @can('admin-only')
                <a href="{{ route('admin.users.index') }}"
                    class="{{ request()->routeIs('admin.users.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    User
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="{{ request()->routeIs('admin.categories.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-code-branch mr-3"></i>
                    Categories
                </a>
                <a href="{{ route('admin.tasks.index') }}"
                    class="{{ request()->routeIs('admin.tasks.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-list mr-3"></i>
                    Tasks
                </a>
            @endcan
            <a href="{{ route('admin.auth_tasks.index') }}"
                class="{{ request()->routeIs('admin.auth_tasks.index') ? 'active-nav-link' : 'opacity-85 hover:opacity-100' }} flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tasks mr-3"></i>
                My Assigned Tasks
            </a>


        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
                <i class="fas fa-arrow-circle-left mr-3"></i>
                Sign Out
            </button>
        </form>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">

        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-full text-lg">Tasks Management</div>
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="{{ asset('import/assets/profile-pic-dummy.png') }}">
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="mailto:yassermelgammal@gmail.com" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block px-4 py-2 account-link hover:text-white w-full text-left">Sign Out</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="flex items-center text-white opacity-85 hover:opacity-100 py-2 pl-4 nav-item w-full text-left">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Sign Out
                    </button>
                </form>

            </nav>

        </header>

        @if ($errors->any())
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 mx-4">
                    Validation Errors
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mx-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        {{-- @yield('content') --}}
        {{ $slot }}

        <footer class="w-full bg-white text-right p-4">
            ControlPanel by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a> |
            Developed by <a target="_blank" href="https://linkedin.com/in/elgammal" class="underline">Yasser
                Elgammal</a>.
        </footer>
    </div>

    </div>

    <!-- AlpineJS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    @livewireScripts
</body>

</html>
