<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        </div>

        <!-- Animated Floating Books -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-8 h-8 opacity-20 animate-pulse">📖</div>
            <div class="absolute top-40 right-20 w-6 h-6 opacity-30 animate-bounce" style="animation-delay: 0.5s;">📚</div>
            <div class="absolute bottom-40 left-20 w-7 h-7 opacity-25 animate-pulse" style="animation-delay: 1s;">📘</div>
            <div class="absolute bottom-20 right-10 w-5 h-5 opacity-20 animate-bounce" style="animation-delay: 1.5s;">📙</div>
        </div>

        <div class="flex min-h-screen">
            <!-- Left Side - Branding -->
            <div class="hidden lg:flex lg:w-1/2 xl:w-3/5 relative items-center justify-center p-12">
                <div class="max-w-lg text-center">
                    <!-- Logo -->
                    <div class="mb-8">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-emerald-400 via-emerald-500 to-teal-600 rounded-3xl shadow-2xl mb-6 transform hover:scale-105 transition-transform duration-300">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C13.1 2 14 2.9 14 4V8C14 9.1 13.1 10 12 10C10.9 10 10 9.1 10 8V4C10 2.9 10.9 2 12 2ZM21 9V7L19 8L21 9ZM3 9L5 8L3 7V9ZM12 21C10.9 21 10 20.1 10 19V15C10 13.9 10.9 13 12 13C13.1 13 14 13.9 14 15V19C14 20.1 13.1 21 12 21ZM12 12C8.69 12 6 14.69 6 18S8.69 24 12 24S18 20.31 18 18S15.31 12 12 12ZM12 14C14.21 14 16 15.79 16 18S14.21 22 12 22S8 20.21 8 18S9.79 14 12 14Z"/>
                                <path d="M17.5 3.5C17.5 4.33 16.83 5 16 5S14.5 4.33 14.5 3.5S15.17 2 16 2S17.5 2.67 17.5 3.5M8 5C7.17 5 6.5 4.33 6.5 3.5S7.17 2 8 2S9.5 2.67 9.5 3.5S8.83 5 8 5Z"/>
                            </svg>
                        </div>
                        <h1 class="text-5xl xl:text-6xl font-bold bg-gradient-to-r from-white via-emerald-100 to-emerald-200 bg-clip-text text-transparent mb-4">
                            Join BookVault
                        </h1>
                        <div class="h-1 w-24 bg-gradient-to-r from-emerald-400 to-teal-500 mx-auto rounded-full"></div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-6 text-blue-100">
                        <p class="text-xl leading-relaxed">
                            Start your journey with the most advanced library management platform
                        </p>
                        <div class="grid grid-cols-1 gap-4 mt-8">
                            <div class="flex items-center space-x-3 p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                                <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm">Instant access to thousands of books</span>
                            </div>
                            <div class="flex items-center space-x-3 p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                                <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm">Personal reading dashboard</span>
                            </div>
                            <div class="flex items-center space-x-3 p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm">Smart recommendation system</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Registration Form -->
            <div class="w-full lg:w-1/2 xl:w-2/5 flex items-center justify-center p-8">
                <div class="w-full max-w-md">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-lg mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C13.1 2 14 2.9 14 4V8C14 9.1 13.1 10 12 10C10.9 10 10 9.1 10 8V4C10 2.9 10.9 2 12 2Z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Join BookVault</h2>
                    </div>

                    <!-- Registration Card -->
                    <div class="bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 p-8">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-white mb-2">Create Account</h3>
                            <p class="text-blue-200">Join thousands of readers worldwide</p>
                        </div>

                        <!-- Registration Form -->
                        <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf

                            <!-- Name Field -->
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-medium text-blue-100">
                                    Full Name
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-blue-300 group-focus-within:text-blue-200 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                                        class="block w-full pl-12 pr-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 backdrop-blur-sm @error('name') border-red-400 @enderror"
                                        placeholder="Enter your full name">
                                </div>
                                @error('name')
                                    <p class="text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-blue-100">
                                    Email Address
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-blue-300 group-focus-within:text-blue-200 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                        class="block w-full pl-12 pr-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 backdrop-blur-sm @error('email') border-red-400 @enderror"
                                        placeholder="Enter your email address">
                                </div>
                                @error('email')
                                    <p class="text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="space-y-2">
                                <label for="password" class="block text-sm font-medium text-blue-100">
                                    Password
                                </label>
                                <div class="relative group" x-data="{ showPassword: false }">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-blue-300 group-focus-within:text-blue-200 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required
                                        class="block w-full pl-12 pr-12 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 backdrop-blur-sm @error('password') border-red-400 @enderror"
                                        placeholder="Create a secure password">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                        <button type="button" @click="showPassword = !showPassword" class="text-blue-300 hover:text-blue-200 focus:outline-none transition-colors">
                                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <p class="text-sm text-red-300">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-blue-300">Must be at least 8 characters long</p>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="space-y-2">
                                <label for="password_confirmation" class="block text-sm font-medium text-blue-100">
                                    Confirm Password
                                </label>
                                <div class="relative group" x-data="{ showConfirmPassword: false }">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-blue-300 group-focus-within:text-blue-200 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.414-4L12 16l-4.707-4.707a1 1 0 00-1.414 1.414L10 16l-1.414 1.414a1 1 0 01-1.414-1.414L10 13.172l-.293-.293a1 1 0 01.293-1.586L12 10l2 2 4-4z"></path>
                                        </svg>
                                    </div>
                                    <input :type="showConfirmPassword ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required
                                        class="block w-full pl-12 pr-12 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-300 backdrop-blur-sm @error('password_confirmation') border-red-400 @enderror"
                                        placeholder="Confirm your password">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                        <button type="button" @click="showConfirmPassword = !showConfirmPassword" class="text-blue-300 hover:text-blue-200 focus:outline-none transition-colors">
                                            <svg x-show="!showConfirmPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <svg x-show="showConfirmPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <p class="text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Terms and Privacy -->
                            <div class="flex items-start space-x-3">
                                <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-emerald-500 focus:ring-emerald-400 border-white/30 rounded bg-white/10 mt-1">
                                <label for="terms" class="text-sm text-blue-200 leading-relaxed">
                                    I agree to the
                                    <a href="#" class="text-emerald-300 hover:text-emerald-200 underline underline-offset-2 transition-colors">Terms of Service</a>
                                    and
                                    <a href="#" class="text-emerald-300 hover:text-emerald-200 underline underline-offset-2 transition-colors">Privacy Policy</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="group relative w-full flex justify-center py-4 px-6 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-emerald-500 via-emerald-600 to-teal-600 hover:from-emerald-600 hover:via-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transform hover:-translate-y-0.5 transition-all duration-300 shadow-xl hover:shadow-2xl">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-4">
                                    <svg class="h-5 w-5 text-emerald-200 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                    </svg>
                                </span>
                                Create Account
                            </button>

                            <!-- Login Link -->
                            <div class="text-center pt-4">
                                <p class="text-sm text-blue-200">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="font-medium text-emerald-300 hover:text-emerald-200 transition-colors duration-200 underline underline-offset-2">
                                        Sign in here
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
