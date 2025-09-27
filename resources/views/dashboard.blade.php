<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
                    📊 Dashboard
                </h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    Welcome back, <span class="font-semibold text-blue-600 dark:text-blue-400">{{ Auth::user()->name }}</span>!
                    Here's your library overview.
                </p>
            </div>

            <div class="flex items-center space-x-2 text-sm">
                <span class="px-3 py-1 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 dark:from-purple-900 dark:to-pink-900 dark:text-purple-200 font-medium">
                    {{ ucfirst(Auth::user()->role) }} Account
                </span>
                <span class="text-gray-500 dark:text-gray-400">•</span>
                <span class="text-gray-600 dark:text-gray-400">{{ now()->format('F d, Y') }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Quick Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Books -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium">Total Books</p>
                            <p class="text-3xl font-bold mt-1">{{ \App\Models\Book::count() }}</p>
                            <p class="text-blue-100 text-xs mt-2">
                                +{{ \App\Models\Book::whereDate('created_at', today())->count() }} today
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-full p-3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Available Books -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm font-medium">Available</p>
                            <p class="text-3xl font-bold mt-1">{{ \App\Models\Book::where('status', 'available')->count() }}</p>
                            <p class="text-green-100 text-xs mt-2">
                                {{ number_format((\App\Models\Book::where('status', 'available')->count() / max(\App\Models\Book::count(), 1)) * 100, 1) }}% of total
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-full p-3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Borrowed Books -->
                <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-yellow-100 text-sm font-medium">Borrowed</p>
                            <p class="text-3xl font-bold mt-1">{{ \App\Models\Book::where('status', 'borrowed')->count() }}</p>
                            <p class="text-yellow-100 text-xs mt-2">
                                {{ number_format((\App\Models\Book::where('status', 'borrowed')->count() / max(\App\Models\Book::count(), 1)) * 100, 1) }}% of total
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-full p-3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Authors Count -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm font-medium">Authors</p>
                            <p class="text-3xl font-bold mt-1">{{ \App\Models\Book::distinct('author')->count('author') }}</p>
                            <p class="text-purple-100 text-xs mt-2">
                                Unique contributors
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-full p-3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Books -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Recently Added Books
                                </h3>
                                <a href="{{ route('books.index') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 font-medium">
                                    View All →
                                </a>
                            </div>
                        </div>

                        <div class="p-6">
                            @php
                                $recentBooks = \App\Models\Book::with('creator')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(5)
                                    ->get();
                            @endphp

                            @if($recentBooks->count() > 0)
                                <div class="space-y-4">
                                    @foreach($recentBooks as $book)
                                        <div class="flex items-center space-x-4 p-4 rounded-xl bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                                            @if($book->cover_image)
                                                <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}" class="w-12 h-16 object-cover rounded-lg shadow-sm">
                                            @else
                                                <div class="w-12 h-16 bg-gray-300 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                                    </svg>
                                                </div>
                                            @endif

                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center justify-between">
                                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                                                        {{ $book->title }}
                                                    </h4>
                                                    <span class="ml-2 px-2 py-1 text-xs rounded-full
                                                        @if($book->status === 'available') bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 @endif
                                                        @if($book->status === 'borrowed') bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300 @endif
                                                        @if($book->status === 'maintenance') bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 @endif
                                                    ">
                                                        {{ ucfirst($book->status) }}
                                                    </span>
                                                </div>
                                                <p class="text-sm text-gray-600 dark:text-gray-400 truncate">by {{ $book->author }}</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                                    Added {{ $book->created_at->diffForHumans() }} by {{ $book->creator->name }}
                                                </p>
                                            </div>

                                            <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-12">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No books yet</h3>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by adding your first book.</p>
                                    @can('create', App\Models\Book::class)
                                        <div class="mt-6">
                                            <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Add Book
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Stats -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Quick Actions
                            </h3>
                        </div>

                        <div class="p-6 space-y-3">
                            <a href="{{ route('books.index') }}" class="w-full flex items-center p-3 rounded-lg bg-blue-50 hover:bg-blue-100 dark:bg-blue-900 dark:hover:bg-blue-800 text-blue-700 dark:text-blue-300 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">Browse Library</p>
                                    <p class="text-xs opacity-75">View all books</p>
                                </div>
                            </a>

                            @can('create', App\Models\Book::class)
                                <a href="{{ route('books.create') }}" class="w-full flex items-center p-3 rounded-lg bg-green-50 hover:bg-green-100 dark:bg-green-900 dark:hover:bg-green-800 text-green-700 dark:text-green-300 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <div>
                                        <p class="font-medium">Add New Book</p>
                                        <p class="text-xs opacity-75">Expand your library</p>
                                    </div>
                                </a>
                            @endcan

                            <a href="{{ route('profile.edit') }}" class="w-full flex items-center p-3 rounded-lg bg-purple-50 hover:bg-purple-100 dark:bg-purple-900 dark:hover:bg-purple-800 text-purple-700 dark:text-purple-300 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">Edit Profile</p>
                                    <p class="text-xs opacity-75">Update your information</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Library Statistics -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Statistics
                            </h3>
                        </div>

                        <div class="p-6 space-y-4">
                            @php
                                $topLanguages = \App\Models\Book::selectRaw('language, COUNT(*) as count')
                                    ->groupBy('language')
                                    ->orderBy('count', 'desc')
                                    ->limit(3)
                                    ->get();
                                $totalBooks = \App\Models\Book::count();
                            @endphp

                            <div>
                                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Top Languages</h4>
                                @foreach($topLanguages as $lang)
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $lang->language }}</span>
                                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $lang->count }} books</span>
                                    </div>
                                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-3">
                                        <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full" style="width: {{ ($lang->count / max($totalBooks, 1)) * 100 }}%"></div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="pt-4 border-t border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600 dark:text-gray-400">Total Value</span>
                                    <span class="font-semibold text-green-600 dark:text-green-400">
                                        Rp {{ number_format(\App\Models\Book::whereNotNull('price')->sum('price'), 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
