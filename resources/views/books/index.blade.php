<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Book Management') }}
            </h2>
            @can('create', App\Models\Book::class)
                <a href="{{ route('books.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                    Add New Book
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filter -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('books.index') }}" class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text" name="search" value="{{ $search }}"
                                placeholder="Search by title, author, or ISBN..."
                                class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        </div>
                        <div>
                            <select name="status"
                                class="rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                <option value="">All Status</option>
                                <option value="available" {{ $status === 'available' ? 'selected' : '' }}>Available
                                </option>
                                <option value="borrowed" {{ $status === 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                                <option value="maintenance" {{ $status === 'maintenance' ? 'selected' : '' }}>Maintenance
                                </option>
                            </select>
                        </div>
                        <button type="submit"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                            Search
                        </button>
                        <a href="{{ route('books.index') }}"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">
                            Clear
                        </a>
                    </form>
                </div>
            </div>

            <!-- Books Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($books as $book)
                    <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-200">
                        <div class="p-6">
                            @if($book->cover_image)
                                <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}"
                                    class="w-full h-48 object-cover rounded-lg mb-4">
                            @else
                                <div
                                    class="w-full h-48 bg-gray-200 dark:bg-gray-700 rounded-lg mb-4 flex items-center justify-center">
                                    <span class="text-gray-500 dark:text-gray-400">No Cover</span>
                                </div>
                            @endif

                            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mb-2">{{ $book->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-2">by {{ $book->author }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-500 mb-2">ISBN: {{ $book->isbn }}</p>
                            <p class="text-sm font-medium mb-4">
                                <span class="px-2 py-1 rounded-full text-xs
                                        @if($book->status === 'available') bg-green-100 text-green-800 @endif
                                        @if($book->status === 'borrowed') bg-yellow-100 text-yellow-800 @endif
                                        @if($book->status === 'maintenance') bg-red-100 text-red-800 @endif
                                    ">
                                    {{ ucfirst($book->status) }}
                                </span>
                            </p>

                            <div class="flex justify-between items-center">
                                <a href="{{ route('books.show', $book) }}"
                                    class="text-blue-600 hover:text-blue-900 font-medium">View Details</a>

                                @can('update', $book)
                                    <div class="flex space-x-2">
                                        <a href="{{ route('books.edit', $book) }}"
                                            class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this book?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 dark:text-gray-400 text-xl">No books found.</p>
                        @can('create', App\Models\Book::class)
                            <a href="{{ route('books.create') }}"
                                class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                                Add First Book
                            </a>
                        @endcan
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $books->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
