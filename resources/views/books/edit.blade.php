<x-app-layout>
    <x-slot name="title">Edit Book - {{ $book->title }}</x-slot>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    📝 Edit Book
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Update book information and details
                </p>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('books.show', $book) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    View Book
                </a>
                <a href="{{ route('books.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"></path>
                    </svg>
                    Back to Library
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8" x-data="bookEditForm()">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Current Book Info Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-8 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white">Currently Editing</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            @if($book->cover_image)
                                <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}"
                                    class="w-20 h-28 object-cover rounded-lg shadow-sm">
                            @else
                                <div class="w-20 h-28 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white">{{ $book->title }}</h4>
                            <p class="text-gray-600 dark:text-gray-400">by {{ $book->author }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-500 mt-1">ISBN: {{ $book->isbn }}</p>
                            <div class="mt-2">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                    @if($book->status === 'available') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif
                                    @if($book->status === 'borrowed') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 @endif
                                    @if($book->status === 'maintenance') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                    {{ ucfirst($book->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Form -->
            <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data"
                  data-loading="true" @submit="handleSubmit" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">📚 Basic Information</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Essential book details and metadata</p>
                    </div>

                    <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div class="lg:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                📖 Book Title *
                            </label>
                            <input type="text" name="title" id="title" required maxlength="255"
                                value="{{ old('title', $book->title) }}"
                                x-model="form.title"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Enter the complete book title</p>
                        </div>

                        <!-- Author -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                ✍️ Author *
                            </label>
                            <input type="text" name="author" id="author" required maxlength="255"
                                value="{{ old('author', $book->author) }}"
                                x-model="form.author"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('author') border-red-500 @enderror">
                            @error('author')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- ISBN -->
                        <div>
                            <label for="isbn" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                🔢 ISBN *
                            </label>
                            <input type="text" name="isbn" id="isbn" required
                                value="{{ old('isbn', $book->isbn) }}"
                                x-model="form.isbn"
                                pattern="[\d\-X]+"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('isbn') border-red-500 @enderror">
                            @error('isbn')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: 978-0-123456-78-9</p>
                        </div>

                        <!-- Publisher -->
                        <div>
                            <label for="publisher" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                🏢 Publisher
                            </label>
                            <input type="text" name="publisher" id="publisher" maxlength="255"
                                value="{{ old('publisher', $book->publisher) }}"
                                x-model="form.publisher"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('publisher') border-red-500 @enderror">
                            @error('publisher')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Publication Date -->
                        <div>
                            <label for="publication_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                📅 Publication Date
                            </label>
                            <input type="date" name="publication_date" id="publication_date"
                                value="{{ old('publication_date', $book->publication_date?->format('Y-m-d')) }}"
                                x-model="form.publication_date"
                                max="{{ date('Y-m-d') }}"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('publication_date') border-red-500 @enderror">
                            @error('publication_date')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">📝 Additional Details</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Extended book information and specifications</p>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                📄 Description
                            </label>
                            <textarea name="description" id="description" rows="4" maxlength="1000"
                                x-model="form.description"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none @error('description') border-red-500 @enderror"
                                placeholder="Enter book summary or description...">{{ old('description', $book->description) }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <div class="flex justify-between mt-2">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Brief summary of the book content</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    <span x-text="form.description ? form.description.length : 0"></span>/1000 characters
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Pages -->
                            <div>
                                <label for="pages" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    📃 Pages
                                </label>
                                <input type="number" name="pages" id="pages" min="1" max="10000"
                                    value="{{ old('pages', $book->pages) }}"
                                    x-model="form.pages"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('pages') border-red-500 @enderror">
                                @error('pages')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Language -->
                            <div>
                                <label for="language" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    🌍 Language *
                                </label>
                                <select name="language" id="language" required
                                    x-model="form.language"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('language') border-red-500 @enderror">
                                    <option value="English" {{ old('language', $book->language) === 'English' ? 'selected' : '' }}>English</option>
                                    <option value="Indonesian" {{ old('language', $book->language) === 'Indonesian' ? 'selected' : '' }}>Indonesian</option>
                                    <option value="Javanese" {{ old('language', $book->language) === 'Javanese' ? 'selected' : '' }}>Javanese</option>
                                    <option value="Sundanese" {{ old('language', $book->language) === 'Sundanese' ? 'selected' : '' }}>Sundanese</option>
                                    <option value="Chinese" {{ old('language', $book->language) === 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                    <option value="Arabic" {{ old('language', $book->language) === 'Arabic' ? 'selected' : '' }}>Arabic</option>
                                    <option value="French" {{ old('language', $book->language) === 'French' ? 'selected' : '' }}>French</option>
                                    <option value="German" {{ old('language', $book->language) === 'German' ? 'selected' : '' }}>German</option>
                                    <option value="Spanish" {{ old('language', $book->language) === 'Spanish' ? 'selected' : '' }}>Spanish</option>
                                    <option value="Other" {{ old('language', $book->language) === 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('language')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    💰 Price (Rp)
                                </label>
                                <input type="number" name="price" id="price" min="0" max="999999.99" step="0.01"
                                    value="{{ old('price', $book->price) }}"
                                    x-model="form.price"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('price') border-red-500 @enderror">
                                @error('price')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status & Cover -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">⚙️ Status & Cover</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Book availability status and cover image</p>
                    </div>

                    <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                📊 Status *
                            </label>
                            <select name="status" id="status" required
                                x-model="form.status"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('status') border-red-500 @enderror">
                                <option value="available" {{ old('status', $book->status) === 'available' ? 'selected' : '' }}>
                                    ✅ Available
                                </option>
                                <option value="borrowed" {{ old('status', $book->status) === 'borrowed' ? 'selected' : '' }}>
                                    📚 Borrowed
                                </option>
                                <option value="maintenance" {{ old('status', $book->status) === 'maintenance' ? 'selected' : '' }}>
                                    🔧 Maintenance
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <div class="mt-2 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <p class="text-sm text-blue-700 dark:text-blue-300">
                                    <span x-show="form.status === 'available'">✅ Book is available for borrowing</span>
                                    <span x-show="form.status === 'borrowed'">📚 Book is currently borrowed by a user</span>
                                    <span x-show="form.status === 'maintenance'">🔧 Book is under maintenance or repair</span>
                                </p>
                            </div>
                        </div>

                        <!-- Cover Image -->
                        <div>
                            <label for="cover_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                🖼️ Cover Image
                            </label>
                            <div class="space-y-4">
                                <!-- Current Cover Preview -->
                                @if($book->cover_image)
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Current cover:</p>
                                        <img src="{{ Storage::url($book->cover_image) }}" alt="Current cover"
                                            class="w-24 h-32 object-cover rounded-lg shadow-sm">
                                    </div>
                                @endif

                                <!-- File Input -->
                                <input type="file" name="cover_image" id="cover_image" accept="image/jpeg,image/png,image/jpg"
                                    @change="previewCover($event)"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('cover_image') border-red-500 @enderror">
                                @error('cover_image')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror

                                <!-- New Cover Preview -->
                                <div x-show="coverPreview" class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">New cover preview:</p>
                                    <img x-bind:src="coverPreview" alt="New cover preview"
                                        class="w-24 h-32 object-cover rounded-lg shadow-sm">
                                </div>

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Accepted formats: JPEG, PNG, JPG. Maximum size: 2MB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <div class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Fields marked with * are required</span>
                        </div>

                        <div class="flex items-center space-x-4">
                            <a href="{{ route('books.show', $book) }}"
                                class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Cancel
                            </a>
                            <button type="submit"
                                :disabled="isSubmitting"
                                :class="isSubmitting ? 'opacity-50 cursor-not-allowed' : ''"
                                class="px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <span x-show="!isSubmitting" class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    Update Book
                                </span>
                                <span x-show="isSubmitting" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Updating...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function bookEditForm() {
            return {
                isSubmitting: false,
                coverPreview: null,
                form: {
                    title: '{{ old('title', $book->title) }}',
                    author: '{{ old('author', $book->author) }}',
                    isbn: '{{ old('isbn', $book->isbn) }}',
                    publisher: '{{ old('publisher', $book->publisher) }}',
                    publication_date: '{{ old('publication_date', $book->publication_date?->format('Y-m-d')) }}',
                    description: `{{ old('description', $book->description) }}`,
                    pages: '{{ old('pages', $book->pages) }}',
                    language: '{{ old('language', $book->language) }}',
                    price: '{{ old('price', $book->price) }}',
                    status: '{{ old('status', $book->status) }}'
                },

                previewCover(event) {
                    const file = event.target.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.coverPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    } else {
                        this.coverPreview = null;
                    }
                },

                handleSubmit(event) {
                    this.isSubmitting = true;

                    // Show loading overlay
                    if (window.showLoading) {
                        window.showLoading();
                    }
                }
            }
        }

        // Auto-hide loading on page load (in case of validation errors)
        document.addEventListener('DOMContentLoaded', function() {
            if (window.hideLoading) {
                setTimeout(() => {
                    window.hideLoading();
                }, 500);
            }
        });
    </script>

    <style>
        /* Custom styles for better UX */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Loading state animation */
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        /* Form field focus effects */
        .form-field-focus:focus-within {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px -8px rgba(59, 130, 246, 0.15);
        }

        /* Status indicator animations */
        .status-indicator {
            animation: statusPulse 2s ease-in-out infinite;
        }

        @keyframes statusPulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.02);
            }
        }

        /* Image upload hover effects */
        .image-upload-zone:hover {
            border-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.05);
        }

        /* Success checkmark animation */
        @keyframes checkmark {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .success-checkmark {
            animation: checkmark 0.5s ease-in-out;
        }
    </style>
</x-app-layout>
