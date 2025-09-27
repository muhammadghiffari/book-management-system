<x-app-layout>
    <x-slot name="title">Books Library</x-slot>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    📚 Books Library
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Manage and discover your book collection
                </p>
            </div>

            @can('create', App\Models\Book::class)
                <a href="{{ route('books.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Book
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-8 overflow-hidden">
                <div class="p-6">
                    <form method="GET" action="{{ route('books.index') }}" class="space-y-4"
                        x-data="{ hasFilters: {{ $search || $status ? 'true' : 'false' }} }">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                            <!-- Search Input -->
                            <div class="md:col-span-6 lg:col-span-7">
                                <label for="search"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    🔍 Search Books
                                </label>
                                <div class="relative">
                                    <input type="text" id="search" name="search" value="{{ $search }}"
                                        placeholder="Search by title, author, or ISBN..."
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Filter -->
                            <div class="md:col-span-3 lg:col-span-2">
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    📊 Status
                                </label>
                                <select name="status" id="status"
                                    class="w-full py-3 pl-3 pr-8 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                                    <option value="">All Status</option>
                                    <option value="available" {{ $status === 'available' ? 'selected' : '' }}>✅ Available
                                    </option>
                                    <option value="borrowed" {{ $status === 'borrowed' ? 'selected' : '' }}>📚 Borrowed
                                    </option>
                                    <option value="maintenance" {{ $status === 'maintenance' ? 'selected' : '' }}>🔧
                                        Maintenance</option>
                                </select>
                            </div>

                            <!-- Action Buttons -->
                            <div class="md:col-span-3 flex space-x-2">
                                <button type="submit"
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Search
                                </button>
                                <a href="{{ route('books.index') }}"
                                    class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 text-center focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    Clear
                                </a>
                            </div>
                        </div>

                        <!-- Filter Summary -->
                        <div x-show="hasFilters"
                            class="flex flex-wrap items-center gap-2 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Active filters:</span>
                            @if($search)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    Search: "{{ $search }}"
                                </span>
                            @endif
                            @if($status)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Status: {{ ucfirst($status) }}
                                </span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium opacity-90">Total Books</h3>
                            <p class="text-3xl font-bold">{{ \App\Models\Book::count() }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium opacity-90">Available</h3>
                            <p class="text-3xl font-bold">{{ \App\Models\Book::where('status', 'available')->count() }}
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium opacity-90">Borrowed</h3>
                            <p class="text-3xl font-bold">{{ \App\Models\Book::where('status', 'borrowed')->count() }}
                            </p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-xl p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-sm font-medium opacity-90">Maintenance</h3>
                            <p class="text-3xl font-bold">
                                {{ \App\Models\Book::where('status', 'maintenance')->count() }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Books Grid -->
            @if($books->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                    @foreach($books as $book)
                        <div
                            class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg border border-gray-200 dark:border-gray-700 book-card-hover overflow-hidden group">
                            <!-- Book Cover -->
                            <div
                                class="relative h-48 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800">
                                @if($book->cover_image)
                                    <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 dark:text-gray-500">
                                        <div class="text-center">
                                            <svg class="w-12 h-12 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                            </svg>
                                            <p class="text-sm">No Cover</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Status Badge -->
                                <div class="absolute top-3 right-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                                @if($book->status === 'available') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif
                                                @if($book->status === 'borrowed') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 @endif
                                                @if($book->status === 'maintenance') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif
                                            ">
                                        @if($book->status === 'available') ✅ @endif
                                        @if($book->status === 'borrowed') 📚 @endif
                                        @if($book->status === 'maintenance') 🔧 @endif
                                        {{ ucfirst($book->status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Book Details -->
                            <div class="p-5">
                                <div class="mb-3">
                                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-1 line-clamp-2">
                                        {{ $book->title }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">
                                        by {{ $book->author }}
                                    </p>
                                    <p class="text-gray-500 dark:text-gray-500 text-xs">
                                        ISBN: {{ $book->isbn }}
                                    </p>
                                </div>

                                @if($book->description)
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-2">
                                        {{ Str::limit($book->description, 80) }}
                                    </p>
                                @endif

                                <!-- Book Meta -->
                                <div class="flex flex-wrap gap-2 mb-4 text-xs text-gray-500 dark:text-gray-400">
                                    @if($book->publisher)
                                        <span class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                                            {{ $book->publisher }}
                                        </span>
                                    @endif
                                    @if($book->publication_date)
                                        <span class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                                            {{ $book->publication_date->format('Y') }}
                                        </span>
                                    @endif
                                    @if($book->pages)
                                        <span class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                                            {{ $book->pages }} pages
                                        </span>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('books.show', $book) }}"
                                        class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        View Details
                                    </a>

                                    @can('update', $book)
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('books.edit', $book) }}"
                                                class="text-yellow-600 hover:text-yellow-800 dark:text-yellow-400 dark:hover:text-yellow-200 transition-colors duration-200"
                                                title="Edit Book">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline"
                                                x-data="{ showConfirm: false }">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" @click="showConfirm = true"
                                                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-200 transition-colors duration-200"
                                                    title="Delete Book">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>

                                                <!-- Confirmation Modal -->
                                                <div x-show="showConfirm" x-cloak
                                                    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                                                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full p-6">
                                                        <div class="flex items-center mb-4">
                                                            <div
                                                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900">
                                                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                                                                Delete Book
                                                            </h3>
                                                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                                                Are you sure you want to delete
                                                                "<strong>{{ $book->title }}</strong>"? This action cannot be undone.
                                                            </p>
                                                            <div class="flex space-x-3 justify-center">
                                                                <button type="button" @click="showConfirm = false"
                                                                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition-colors duration-200">
                                                                    Cancel
                                                                </button>
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200">
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endcan
                                </div>

                                <!-- Price (if available) -->
                                @if($book->price)
                                    <div class="mt-3 pt-3 border-t border-gray-200 dark:border-gray-600">
                                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $book->formatted_price }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    {{ $books->appends(request()->query())->links('pagination::tailwind') }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div
                        class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>

                    @if($search || $status)
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                            No books found matching your criteria
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Try adjusting your search terms or filters to find what you're looking for.
                        </p>
                        <a href="{{ route('books.index') }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Clear Filters
                        </a>
                    @else
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                            No books in your library yet
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Start building your collection by adding your first book.
                        </p>

                        @can('create', App\Models\Book::class)
                            <a href="{{ route('books.create') }}"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Your First Book
                            </a>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Contact an administrator to add books to the library.
                            </p>
                        @endcan
                    @endif
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-app-layout>