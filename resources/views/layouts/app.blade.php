<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' | ' : '' }}BookVault</title>

   <!-- Favicon -->
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2024%2024'%20fill='%23ffffff'%3E%3Cpath%20d='M21%205c-1.11-.35-2.33-.5-3.5-.5-1.95%200-4.05.4-5.5%201.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45%204.9%201%206v14.65c0%20.25.25.5.5.5.1%200%20.15-.05.25-.05C3.1%2020.45%205.05%2020%206.5%2020c1.95%200%204.05.4%205.5%201.5%201.35-.85%203.8-1.5%205.5-1.5%201.65%200%203.35.3%204.75%201.05.1.05.15.05.25.05.25%200%20.5-.25.5-.5V6C22.4%205.55%2021.75%205.25%2021%205z'/%3E%3C/svg%3E">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 50%, #db2777 100%);
        }

        .glass-effect {
            backdrop-filter: blur(20px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dark .glass-effect {
            background-color: rgba(17, 24, 39, 0.8);
            border: 1px solid rgba(75, 85, 99, 0.3);
        }

        .book-card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .book-card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.4);
        }

        .loading-spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #3b82f6;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .slide-in {
            animation: slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
        }
    </style>
</head>

<body class="font-sans antialiased h-full bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-gray-900 dark:via-slate-900 dark:to-gray-800">
    <div id="app" class="min-h-full">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Header -->
        @isset($header)
            <header
                class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl shadow-lg border-b border-white/20 dark:border-gray-700/50 sticky top-16 z-30">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Flash Messages -->
        <div id="flash-messages" class="fixed top-20 right-4 z-50 space-y-3">
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transform ease-out duration-500 transition"
                    x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95" x-init="setTimeout(() => show = false, 6000)"
                    class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl border-2 border-emerald-200 dark:border-emerald-700/50 rounded-2xl p-6 max-w-sm shadow-2xl">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-green-500 rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4 flex-1">
                            <p class="text-sm font-bold text-gray-900 dark:text-white">Success!</p>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false"
                            class="ml-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transform ease-out duration-500 transition"
                    x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95" x-init="setTimeout(() => show = false, 6000)"
                    class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl border-2 border-red-200 dark:border-red-700/50 rounded-2xl p-6 max-w-sm shadow-2xl">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-red-500 to-rose-500 rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4 flex-1">
                            <p class="text-sm font-bold text-gray-900 dark:text-white">Error!</p>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false"
                            class="ml-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        </div>

        <!-- Background Pattern -->
        <div class="fixed inset-0 opacity-5 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width=" 80" height="80"
                viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg" %3E%3Cg fill="none" fill-rule="evenodd" %3E%3Cg
                fill="%23000000" fill-opacity="0.1" %3E%3Cpath
                d="M50 50c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zM10 10c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm60 60c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z"
                /%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>

        <!-- Main Content -->
        <main class="flex-1 relative z-10">
            {{ $slot }}
        </main>

        <!-- Professional Footer -->
        <footer
            class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border-t border-white/20 dark:border-gray-700/50 mt-16">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Brand Section -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6C22.4 5.55 21.75 5.25 21 5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">BookVault</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Library Management</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Streamlining library operations with modern technology and intuitive design for educational
                            institutions.
                        </p>
                    </div>

                    <!-- Features -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-4 uppercase tracking-wide">
                            Features</h4>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center space-x-2">
                                <div class="w-1.5 h-1.5 bg-blue-500 rounded-full"></div>
                                <span>Advanced Search & Cataloging</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                                <span>Real-time Inventory Management</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <div class="w-1.5 h-1.5 bg-purple-500 rounded-full"></div>
                                <span>Comprehensive Analytics</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <div class="w-1.5 h-1.5 bg-orange-500 rounded-full"></div>
                                <span>Multi-user Access Control</span>
                            </li>
                        </ul>
                    </div>

                    <!-- System Info -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-4 uppercase tracking-wide">
                            System</h4>
                        <div class="space-y-3">
                            <div
                                class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Laravel</span>
                                <span
                                    class="text-xs font-mono bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-2 py-1 rounded">{{ app()->version() }}</span>
                            </div>
                            <div
                                class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Status</span>
                                <span class="flex items-center text-xs font-medium text-green-600 dark:text-green-400">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                    Online
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Section -->
                <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            © {{ date('Y') }} BookVault. | all rights reserved by <a href="https://instagram.com/mghiffaa" target="_blank">Muhammad Ghiffari</a>
                        </p>
                        <div class="mt-4 md:mt-0 flex items-center space-x-6">
                            <a href="https://laravel.com" target="_blank"
                                class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                                Readme
                            </a>
                            <span class="text-gray-300 dark:text-gray-600">•</span>
                            <a href="https://github.com/muhammadghiffari/book-management-system" target="_blank"
                                class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                                GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Loading Overlay -->
    <div id="loading-overlay"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden items-center justify-center">
        <div class="glass-effect rounded-2xl p-8 text-center max-w-sm mx-4">
            <div class="loading-spinner mx-auto mb-6"></div>
            <h3 class="text-lg font-semibold text-white mb-2">Processing...</h3>
            <p class="text-gray-300 text-sm">Please wait a moment</p>
        </div>
    </div>

    <!-- Custom JavaScript -->
    <script>
        // Global loading functions
        window.showLoading = function () {
            document.getElementById('loading-overlay').classList.remove('hidden');
            document.getElementById('loading-overlay').classList.add('flex');
        };

        window.hideLoading = function () {
            document.getElementById('loading-overlay').classList.add('hidden');
            document.getElementById('loading-overlay').classList.remove('flex');
        };

        // Initialize theme
        document.addEventListener('DOMContentLoaded', function () {
            // Set theme based on localStorage or system preference
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            // Form submission with loading
            const forms = document.querySelectorAll('form[data-loading="true"]');
            forms.forEach(form => {
                form.addEventListener('submit', function () {
                    showLoading();
                });
            });

            // Add slide-in animation to main content
            const main = document.querySelector('main');
            if (main) {
                main.classList.add('slide-in');
            }
        });

        // Image preview function
        window.previewImage = function (input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById(previewId);
                    const container = document.getElementById(previewId + '-container');
                    if (preview) preview.src = e.target.result;
                    if (container) container.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        };

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
