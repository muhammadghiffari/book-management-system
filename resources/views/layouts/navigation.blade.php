<nav x-data="{ open: false, userMenuOpen: false }"
    class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl border-b border-white/20 dark:border-gray-700/50 shadow-lg sticky top-0 z-50">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('books.index') }}" class="flex items-center space-x-4 group">
                        <div class="relative">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-all duration-300 shadow-xl">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6C22.4 5.55 21.75 5.25 21 5z"/>
                                </svg>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                            </div>
                        </div>
                        <div class="hidden lg:block">
                            <h1 class="font-bold text-2xl bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 dark:from-blue-400 dark:via-blue-500 dark:to-indigo-500 bg-clip-text text-transparent">
                                BookVault
                            </h1>
                            <p class="text-xs text-gray-500 dark:text-gray-400 -mt-1 font-medium">Library Management</p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ml-10 lg:ml-16 sm:flex items-center">
                    <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')"
                        class="flex items-center space-x-2 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('books.*') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/25' : 'text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 dark:hover:text-blue-400' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span>Library</span>
                        <div class="ml-2 px-2 py-1 bg-white/20 rounded-full text-xs">
                            {{ \App\Models\Book::count() }}
                        </div>
                    </x-nav-link>

                    {{-- @can('create', App\Models\Book::class)
                        <x-nav-link :href="route('books.create')" :active="request()->routeIs('books.create')"
                            class="flex items-center space-x-2 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('books.create') ? 'bg-gradient-to-r from-emerald-500 to-green-600 text-white shadow-lg shadow-emerald-500/25' : 'text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 hover:text-emerald-600 dark:hover:text-emerald-400' }}">
                            <svg class="w-5 he-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span>Add Book</span>
                        </x-nav-link>
                    @endcan --}}

                    @if(Auth::user()->isAdmin())
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                            class="flex items-center space-x-2 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-purple-500 to-purple-600 text-white shadow-lg shadow-purple-500/25' : 'text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:text-purple-600 dark:hover:text-purple-400' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span>Dashboard</span>
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right Side - Theme Toggle & User Menu -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <!-- Search Bar (Optional) -->
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" placeholder="Quick search..."
                            class="w-64 pl-10 pr-4 py-2.5 bg-white/50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent backdrop-blur-sm transition-all duration-200">
                    </div>
                </div>

                {{-- <!-- Theme Toggle -->
                <div x-data="{ darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }">
                    <button @click="
                        darkMode = !darkMode;
                        if (darkMode) {
                            localStorage.theme = 'dark';
                            document.documentElement.classList.add('dark');
                        } else {
                            localStorage.theme = 'light';
                            document.documentElement.classList.remove('dark');
                        }
                    "
                        class="p-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 rounded-xl transition-all duration-200 backdrop-blur-sm">
                        <!-- Sun Icon (Light Mode) -->
                        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                        <!-- Moon Icon (Dark Mode) -->
                        <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </button>
                </div> --}}

                <!-- Notifications (Optional) -->
                <div class="relative">
                    <button class="p-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 rounded-xl transition-all duration-200 backdrop-blur-sm relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM10.97 4.97l-.02.03L9.97 6.04A3 3 0 009 8v6l-2 2v1h10v-1l-2-2V8a3 3 0 00-.97-2.96z"></path>
                        </svg>
                        <!-- Notification Badge -->
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></div>
                    </button>
                </div>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = ! open"
                        class="flex items-center space-x-3 p-2 rounded-2xl hover:bg-white/50 dark:hover:bg-gray-700/50 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 backdrop-blur-sm">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-sm font-bold text-white">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 {{ Auth::user()->isAdmin() ? 'bg-red-500' : 'bg-green-500' }} rounded-full flex items-center justify-center border-2 border-white dark:border-gray-800">
                                    @if(Auth::user()->isAdmin())
                                        <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9.504 1.132a1 1 0 01.992 0l1.75 1a1 1 0 11-.992 1.736L10 3.152l-1.254.716a1 1 0 11-.992-1.736l1.75-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="hidden xl:block text-left">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 flex items-center">
                                    {{ Auth::user()->isAdmin() ? 'Administrator' : 'Standard User' }}
                                </p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 hidden xl:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95" @click.away="open = false"
                        class="origin-top-right absolute right-0 mt-3 w-72 rounded-2xl shadow-2xl bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl ring-1 ring-black/5 dark:ring-white/10 border border-white/20 dark:border-gray-700/50"
                        style="display: none;">
                        <div class="py-2">
                            <!-- User Info Header -->
                            <div class="px-6 py-4 border-b border-gray-200/50 dark:border-gray-600/50">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                                        <span class="text-lg font-bold text-white">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ Auth::user()->name }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ Auth::user()->email }}
                                        </p>
                                        <div class="mt-1 flex items-center">
                                            <div class="w-2 h-2 {{ Auth::user()->isAdmin() ? 'bg-red-500' : 'bg-green-500' }} rounded-full mr-2"></div>
                                            <span class="text-xs font-medium {{ Auth::user()->isAdmin() ? 'text-red-600 dark:text-red-400' : 'text-green-600 dark:text-green-400' }}">
                                                {{ Auth::user()->isAdmin() ? 'Administrator' : 'Standard User' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center px-6 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-blue-50/50 dark:hover:bg-blue-900/20 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200">
                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Profile Settings</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Manage your account</p>
                                    </div>
                                </a>

                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('dashboard') }}"
                                        class="flex items-center px-6 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-purple-50/50 dark:hover:bg-purple-900/20 hover:text-purple-600 dark:hover:text-purple-400 transition-all duration-200">
                                        <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium">Admin Dashboard</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">System overview</p>
                                        </div>
                                    </a>
                                @endif

                                <div class="border-t border-gray-200/50 dark:border-gray-600/50 my-2"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center px-6 py-3 text-sm text-red-700 dark:text-red-400 hover:bg-red-50/50 dark:hover:bg-red-900/20 transition-all duration-200">
                                        <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-medium">Sign Out</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">End your session</p>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-3 rounded-xl text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden bg-white/95 dark:bg-gray-800/95 backdrop-blur-xl border-t border-white/20 dark:border-gray-600/50">

        <!-- Mobile Search -->
        <div class="px-4 py-4 border-b border-gray-200/50 dark:border-gray-600/50">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" placeholder="Search books..."
                    class="w-full pl-10 pr-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <!-- Mobile Navigation Links -->
        <div class="px-4 py-3 space-y-2">
            <x-responsive-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('books.*') ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white' : 'text-gray-700 dark:text-gray-300' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="font-medium">Library</span>
            </x-responsive-nav-link>

            @can('create', App\Models\Book::class)
                <x-responsive-nav-link :href="route('books.create')" :active="request()->routeIs('books.create')"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('books.create') ? 'bg-gradient-to-r from-emerald-500 to-green-600 text-white' : 'text-gray-700 dark:text-gray-300' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="font-medium">Add Book</span>
                </x-responsive-nav-link>
            @endcan

            @if(Auth::user()->isAdmin())
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-purple-500 to-purple-600 text-white' : 'text-gray-700 dark:text-gray-300' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Mobile User Section -->
        <div class="px-4 py-4 border-t border-gray-200/50 dark:border-gray-600/50">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <span class="text-lg font-bold text-white">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                    <p class="text-xs font-medium {{ Auth::user()->isAdmin() ? 'text-red-600 dark:text-red-400' : 'text-green-600 dark:text-green-400' }}">
                        {{ Auth::user()->isAdmin() ? 'Administrator' : 'Standard User' }}
                    </p>
                </div>
            </div>

            <div class="space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-medium">Profile Settings</span>
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-red-700 dark:text-red-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="font-medium">Sign Out</span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
