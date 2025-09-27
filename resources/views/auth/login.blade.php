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
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-blue-400 via-blue-500 to-indigo-600 rounded-3xl shadow-2xl mb-6 transform hover:scale-105 transition-transform duration-300">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6C22.4 5.55 21.75 5.25 21 5zM21 18.5c-1.1-.35-2.3-.5-3.5-.5-1.7 0-4.15.65-5.5 1.5V8c1.35-.85 3.8-1.5 5.5-1.5 1.2 0 2.4.15 3.5.5V18.5z"/>
                                <path d="M17.5 10.5c.88 0 1.73.09 2.5.26V9.24C19.21 9.09 18.36 9 17.5 9c-1.7 0-3.24.29-4.5.83v1.66C14.13 10.81 15.7 10.5 17.5 10.5z"/>
                                <path d="M13 12.49v1.66c1.13-.68 2.7-.99 4.5-.99.88 0 1.73.09 2.5.26V11.9c-.79-.17-1.62-.26-2.5-.26C15.8 11.64 14.26 11.9 13 12.49z"/>
                                <path d="M17.5 14.33c-1.8 0-3.37.31-4.5.99v1.66c1.26-.54 2.8-.83 4.5-.83.88 0 1.73.09 2.5.26v-1.52C19.23 14.72 18.38 14.33 17.5 14.33z"/>
                            </svg>
                        </div>
                        <h1 class="text-5xl xl:text-6xl font-bold bg-gradient-to-r from-white via-blue-100 to-blue-200 bg-clip-text text-transparent mb-4">
                            BookVault
                        </h1>
                        <div class="h-1 w-24 bg-gradient-to-r from-blue-400 to-indigo-500 mx-auto rounded-full"></div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-6 text-blue-100">
                        <p class="text-xl leading-relaxed">
                            Professional library management system
                        </p>
                        <div class="grid grid-cols-1 gap-4 mt-8">
                            <div class="flex items-center space-x-3 p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                                <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm">Advanced cataloging & search</span>
                            </div>
                            <div class="flex items-center space-x-3 p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                                <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm">Real-time inventory tracking</span>
                            </div>
                            <div class="flex items-center space-x-3 p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm">Comprehensive reporting</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full lg:w-1/2 xl:w-2/5 flex items-center justify-center p-8">
                <div class="w-full max-w-md">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6C22.4 5.55 21.75 5.25 21 5zM21 18.5c-1.1-.35-2.3-.5-3.5-.5-1.7 0-4.15.65-5.5 1.5V8c1.35-.85 3.8-1.5 5.5-1.5 1.2 0 2.4.15 3.5.5V18.5z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">BookVault</h2>
                    </div>

                    <!-- Login Card -->
                    <div class="bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 p-8">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-white mb-2">Welcome Back</h3>
                            <p class="text-blue-200">Sign in to access your dashboard</p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-6" :status="session('status')" />

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

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
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                                        class="block w-full pl-12 pr-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 backdrop-blur-sm @error('email') border-red-400 @enderror"
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
                                        class="block w-full pl-12 pr-12 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300 backdrop-blur-sm @error('password') border-red-400 @enderror"
                                        placeholder="Enter your password">
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
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-white/30 rounded bg-white/10">
                                    <label for="remember_me" class="ml-2 block text-sm text-blue-200">
                                        Remember me
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm text-blue-300 hover:text-blue-200 transition-colors duration-200">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="group relative w-full flex justify-center py-4 px-6 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-blue-500 via-blue-600 to-indigo-600 hover:from-blue-600 hover:via-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:-translate-y-0.5 transition-all duration-300 shadow-xl hover:shadow-2xl">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-4">
                                    <svg class="h-5 w-5 text-blue-200 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                Sign In to Dashboard
                            </button>

                            <!-- Demo Accounts -->
                            <div class="mt-8 bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                                <h4 class="text-sm font-semibold text-blue-100 mb-4 text-center">Demo Accounts</h4>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg border border-white/10">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-orange-500/20 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-orange-300" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9.504 1.132a1 1 0 01.992 0l1.75 1a1 1 0 11-.992 1.736L10 3.152l-1.254.716a1 1 0 11-.992-1.736l1.75-1zM5.618 4.504a1 1 0 01-.372 1.364L5.016 6l.23.132a1 1 0 11-.992 1.736L3 7.723V8a1 1 0 01-2 0V6a.996.996 0 01.52-.878l1.734-.99a1 1 0 011.364.372zm8.764 0a1 1 0 011.364-.372l1.733.99A1.002 1.002 0 0118 6v2a1 1 0 11-2 0v-.277l-1.254.145a1 1 0 11-.992-1.736L14.984 6l-.23-.132a1 1 0 01-.372-1.364zm-7 4a1 1 0 011.364-.372L10 8.848l1.254-.716a1 1 0 11.992 1.736L11 10.723V12a1 1 0 11-2 0v-1.277l-1.246-.855a1 1 0 01-.372-1.364zM3 11a1 1 0 011 1v1.277l1.246.855a1 1 0 01-1.364 1.364l-1.734-.99A.996.996 0 012 14v-2a1 1 0 011-1zm14 0a1 1 0 011 1v2a.996.996 0 01-.52.878l-1.734.99a1 1 0 11-1.364-1.364L16 13.277V12a1 1 0 011-1zm-9.618 5.504a1 1 0 011.364.372l.254.145V16a1 1 0 112 0v1.021l.254-.145a1 1 0 11.992 1.736l-1.735.992a.995.995 0 01-1.022 0l-1.735-.992a1 1 0 01-.372-1.364z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-white">Administrator</p>
                                                <p class="text-xs text-blue-300">admin@pusc.com</p>
                                            </div>
                                        </div>
                                        <span class="text-xs bg-orange-500/20 text-orange-200 px-3 py-1 rounded-full font-mono">admin123</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg border border-white/10">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-white">Standard User</p>
                                                <p class="text-xs text-blue-300">user@pusc.com</p>
                                            </div>
                                        </div>
                                        <span class="text-xs bg-emerald-500/20 text-emerald-200 px-3 py-1 rounded-full font-mono">user123</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Register Link -->
                            <div class="text-center pt-4">
                                <p class="text-sm text-blue-200">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="font-medium text-blue-300 hover:text-blue-200 transition-colors duration-200 underline underline-offset-2">
                                        Create new account
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
