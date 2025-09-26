<x-app-layout>
    <x-slot name="title">{{ $book->title }}</x-slot>
    
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
            <div class="flex items-center space-x-4">
                <a href="{{ route('books.index') }}" 
                   class="inline-flex items-center text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Library
                </a>
                <div>
                    <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                        Book Details
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Complete information about this book
                    </p>
                </div>
            </div>

            @can('update', $book)
                <div class="flex space-x-3">
                    <a href="{{ route('books.edit', $book) }}" 
                       class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Book
                    </a>
                    
                    <form action="{{ route('books.destroy', $book) }}" 
                          method="POST" 
                          class="inline"
                          x-data="{ showConfirm: false }">
                        @csrf
                        @method('DELETE')
                        <button type="button" 
                                @click="showConfirm = true"
                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete
                        </button>

                        <!-- Confirmation Modal -->
                        <div x-show="showConfirm" 
                             x-cloak
                             class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full p-6">
                                <div class="flex items-center mb-4">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900">
                                        <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Delete Book</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                        Are you sure you want to delete "<strong>{{ $book->title }}</strong>"? This action cannot be undone.
                                    </p>
                                    <div class="flex space-x-3 justify-center">
                                        <button type="button" 
                                                @click="showConfirm = false"
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
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Book Cover and Quick Info -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden sticky top-8">
                        <!-- Cover Image -->
                        <div class="aspect-[3/4] bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 relative">
                            @if($book->cover_image)
                                <img src="{{ Storage::url($book->cover_image) }}" 
                                     alt="{{ $book->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 dark:text-gray-500">
                                    <div class="text-center">
                                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                        </svg>
                                        <p class="text-lg font-medium">No Cover Available</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-semibold
                                    @if($book->status === 'available') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif
                                    @if($book->status === 'borrowed') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 @endif
                                    @if($book->status === 'maintenance') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif
                                ">
                                    @if($book->status === 'available') ✅ Available @endif
                                    @if($book->status === 'borrowed') 📚 Borrowed @endif
                                    @if($book->status === 'maintenance') 🔧 Maintenance @endif
                                </span>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Language</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $book->language }}</span>
                            </div>
                            
                            @if($book->pages)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Pages</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ number_format($book->pages) }}</span>
                                </div>
                            @endif
                            
                            @if($book->price)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Price</span>
                                    <span class="font-bold text-xl text-green-600 dark:text-green-400">{{ $book->formatted_price }}</span>
                                </div>
                            @endif

                            <div class="flex items-center justify-between border-t border-gray-200 dark:border-gray-600 pt-4">
                                <span class="text-gray-600 dark:text-gray-400">Added by</span>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $book->creator->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $book->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Details -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Title and Author -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $book->title }}</h1>
                        <p class="text-xl text-gray-600 dark:text-gray-400 mb-4">by {{ $book->author }}</p>
                        
                        <!-- ISBN -->
                        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                            <span class="font-medium">ISBN:</span>
                            <span class="font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">{{ $book->isbn }}</span>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($book->description)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Description
                            </h2>
                            <div class="prose prose-gray dark:prose-invert max-w-none">
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $book->description }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Publication Details -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Publication Details
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if($book->publisher)
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Publisher</label>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $book->publisher }}</p>
                                </div>
                            @endif
                            
                            @if($book->publication_date)
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Publication Date</label>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $book->publication_date->format('F d, Y') }}</p>
                                </div>
                            @endif
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Language</label>
                                <p class="text-gray-900 dark:text-white font-semibold">{{ $book->language }}</p>
                            </div>
                            
                            @if($book->pages)
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Total Pages</label>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ number_format($book->pages) }} pages</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Timestamps -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Record Information
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Added to Library</label>
                                <p class="text-gray-900 dark:text-white font-semibold">{{ $book->created_at->format('F d, Y \a\t g:i A') }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $book->created_at->diffForHumans() }}</p>
                            </div>
                            
                            @if($book->updated_at->ne($book->created_at))
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Last Updated</label>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $book->updated_at->format('F d, Y \a\t g:i A') }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $book->updated_at->diffForHumans() }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>