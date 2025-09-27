<x-app-layout>
    <x-slot name="title">Add New Book</x-slot>

    <x-slot name="header">
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
                    📚 Add New Book
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Add a new book to your library collection
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8"
                data-loading="true" x-data="{ 
                      previewImage: null, 
                      showPreview: false,
                      handleImageChange(event) {
                          const file = event.target.files[0];
                          if (file) {
                              const reader = new FileReader();
                              reader.onload = (e) => {
                                  this.previewImage = e.target.result;
                                  this.showPreview = true;
                              };
                              reader.readAsDataURL(file);
                          } else {
                              this.showPreview = false;
                          }
                      }
                  }">
                @csrf

                <!-- Basic Information -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div
                        class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Basic Information
                        </h3>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Book Title *
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('title') border-red-500 @enderror"
                                placeholder="Enter the book title">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Author -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Author *
                            </label>
                            <input type="text" id="author" name="author" value="{{ old('author') }}" required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('author') border-red-500 @enderror"
                                placeholder="Enter the author name">
                            @error('author')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- ISBN -->
                        <div>
                            <label for="isbn" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                ISBN *
                            </label>
                            <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}" required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('isbn') border-red-500 @enderror"
                                placeholder="978-0-123456-78-9">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Enter the ISBN number (with or
                                without hyphens)</p>
                            @error('isbn')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('description') border-red-500 @enderror"
                                placeholder="Brief description of the book (optional)">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Publication Details -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div
                        class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15">
                                </path>
                            </svg>
                            Publication Details
                        </h3>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Publisher -->
                        <div>
                            <label for="publisher"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Publisher
                            </label>
                            <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('publisher') border-red-500 @enderror"
                                placeholder="Publisher name">
                            @error('publisher')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Publication Date -->
                        <div>
                            <label for="publication_date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Publication Date
                            </label>
                            <input type="date" id="publication_date" name="publication_date"
                                value="{{ old('publication_date') }}" max="{{ date('Y-m-d') }}"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('publication_date') border-red-500 @enderror">
                            @error('publication_date')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pages -->
                        <div>
                            <label for="pages" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Number of Pages
                            </label>
                            <input type="number" id="pages" name="pages" value="{{ old('pages') }}" min="1" max="10000"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('pages') border-red-500 @enderror"
                                placeholder="e.g., 350">
                            @error('pages')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Language -->
                        <div>
                            <label for="language"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Language *
                            </label>
                            <select id="language" name="language" required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('language') border-red-500 @enderror">
                                <option value="">Select Language</option>
                                <option value="English" {{ old('language') === 'English' ? 'selected' : '' }}>English
                                </option>
                                <option value="Indonesian" {{ old('language') === 'Indonesian' ? 'selected' : '' }}>
                                    Indonesian</option>
                                <option value="Mandarin" {{ old('language') === 'Mandarin' ? 'selected' : '' }}>Mandarin
                                </option>
                                <option value="Japanese" {{ old('language') === 'Japanese' ? 'selected' : '' }}>Japanese
                                </option>
                                <option value="French" {{ old('language') === 'French' ? 'selected' : '' }}>French
                                </option>
                                <option value="German" {{ old('language') === 'German' ? 'selected' : '' }}>German
                                </option>
                                <option value="Spanish" {{ old('language') === 'Spanish' ? 'selected' : '' }}>Spanish
                                </option>
                                <option value="Other" {{ old('language') === 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('language')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Status and Pricing -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div
                        class="bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            Status & Pricing
                        </h3>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                       <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Book Status *
                        </label>
                        <select id="status"
                                name="status" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('status') border-red-500 @enderror">
                            <option value="">Select Status</option>
                            <option value="available" {{ old('status') === 'available' ? 'selected' : '' }}>✅ Available</option>
                            <option value="borrowed" {{ old('status') === 'borrowed' ? 'selected' : '' }}>📚 Borrowed</option>
                            <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>🔧 Maintenance</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Price (IDR)
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 dark:text-gray-400">Rp</span>
                            </div>
                            <input type="number" 
                                   id="price"
                                   name="price" 
                                   value="{{ old('price') }}"
                                   min="0"
                                   step="0.01"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 @error('price') border-red-500 @enderror"
                                   placeholder="150000">
                        </div>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Leave empty if price is not applicable</p>
                        @error('price')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Cover Image -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Book Cover Image
                    </h3>
                </div>
                
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- File Upload -->
                        <div>
                            <label for="cover_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Upload Cover Image
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="cover_image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition-colors duration-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold">Click to upload</span> or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or JPEG (MAX. 2MB)</p>
                                    </div>
                                    <input id="cover_image" 
                                           name="cover_image" 
                                           type="file" 
                                           accept=".jpg,.jpeg,.png"
                                           class="hidden" 
                                           @change="handleImageChange($event)" />
                                </label>
                            </div>
                            @error('cover_image')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Preview -->
                        <div x-show="showPreview" class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Preview</label>
                            <div class="relative inline-block">
                                <img :src="previewImage" class="max-w-xs max-h-48 rounded-lg shadow-md" alt="Cover Preview">
                                <button type="button" 
                                        @click="showPreview = false; document.getElementById('cover_image').value = ''"
                                        class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white rounded-full p-1 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex flex-col sm:flex-row gap-4 justify-end">
                    <a href="{{ route('books.index') }}" 
                       class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 font-medium transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancel
                    </a>
                    
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Book
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</x-app-layout>