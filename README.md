# 📚 BookVault - Book Management System

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange?style=for-the-badge&logo=mysql)
![Vite](https://img.shields.io/badge/Vite-6.x-purple?style=for-the-badge&logo=vite)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.4-green?style=for-the-badge&logo=tailwind-css)

---

## Project Overview

BookVault is a comprehensive web-based book management system designed to help users organize, track, and manage book collections. The application provides a user-friendly interface for cataloging books with detailed metadata including titles, authors, ISBN numbers, publication information, and cover images.

The system features role-based access control, allowing administrators to perform full CRUD operations on books while regular users have read-only access. Books can be categorized by status (available, borrowed, maintenance) and the system supports soft deletes for data integrity. 

---

## **Features**
- 🔐 **Authentication** – Secure login & registration system using Laravel Breeze.
- 👤 **Role-based Access Control** – Admin and Regular User roles.
- 📖 **Book Management** – Full CRUD (Create, Read, Update, Delete) for books.
- 🖼 **Book Cover Upload** – Upload and manage book covers stored securely.
- 🗃 **Seeder Support** – Preloaded admin and user accounts for testing.
- ⚡ **Vite + Tailwind** – Modern front-end workflow for fast development.
- 🗄 **MySQL Integration** – Persistent storage with migrations & factories.

---

## **Project Structure**
```plaintext
book-management-system/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── BookController.php
│   ├── Models/
│   │   └── Book.php
│   └── Policies/
│       └── BookPolicy.php
├── database/
│   ├── factories/
│   │   └── BookFactory.php
│   └── seeders/
│       └── AdminUserSeeder.php
├── public/
│   └── storage/ (symlink to uploaded book covers)
├── resources/
│   └── views/
│       └── books/
├── routes/
│   └── web.php
├── .env.example
├── composer.json
└── package.json
```

## **Tech Stack Used**

### **Backend**
- [Laravel 11.46.0](https://laravel.com/) - PHP framework providing robust backend architecture
- [PHP 8.2+](https://www.php.net/) - Server-side programming language
- [MySQL](https://www.mysql.com/) - Relational database management system
- [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze) - Authentication scaffolding

### **Frontend**
- [Vite 6.0.11](https://vitejs.dev/) - Modern build tool and development server
- [Tailwind CSS 3.4.17](https://tailwindcss.com/) - Utility-first CSS framework for responsive design
- [Alpine.js 3.15.0](https://alpinejs.dev/) - Lightweight JavaScript framework for interactivity
- [Axios 1.7.4](https://axios-http.com/) - HTTP client for API requests

### **Additional Tools**
- [Lucide React](https://lucide.dev/) - Icon library for consistent UI elements
- [Concurrently](https://www.npmjs.com/package/concurrently) - Tool for running multiple development processes simultaneously

---

## **Prerequisites**
Before installing and running this project, make sure the following tools are installed on your machine:

- [**PHP 8.2 or higher**](https://www.php.net/) (Recommended: 8.3+)
- [**Composer**](https://getcomposer.org/) (Latest version)
- [**Node.js 18+**](https://nodejs.org/) and **NPM** package manager
- [**MySQL 8.0+**](https://www.mysql.com/) - Database server
- [**Git**](https://git-scm.com/) - Version control system


### Step-by-Step Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/muhammadghiffari/book-management-system.git
   cd book-management-system
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
     Configure your database connection in the `.env` file. This project uses **MySQL** as the database. [6](#0-5)   Open `.env` and update the following lines:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=book_management_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run database migrations and seed**
   Run the migrations to create database tables, then seed the database with sample data using factories and seeders:
   ```bash
   php artisan migrate --seed
   ```
💡 Tip:
You can refresh the database anytime with:
    ```
    php artisan migrate:fresh --seed
    ```
### Seeder & Factory Details
This project includes pre-configured **Seeder** and **Factory** classes to generate realistic sample data.

- **Factories** automatically generate fake data for:
  - Books (title, author, cover image, etc.)
  - Users (for testing with different roles)

- **Seeders** included:
  - `AdminUserSeeder` → Creates default admin and regular user accounts.
  - `BookSeeder` → Populates the book catalog with sample data.

> 📝 **Default Login Credentials**
> Use these accounts to log in after running:
> ```bash
> php artisan migrate --seed
> ```
>
> **Admin Account:**
> ```
> Email: admin@pusc.com
> Password: admin123
> ```
>
> **Regular User Account:**
> ```
> Email: user@pusc.com
> Password: user123
> ```

7. **Create storage link for file uploads**
   ```bash
   php artisan storage:link
   ```

8. **Start the development servers**
   The application includes a convenient development script that runs multiple services concurrently: [14](#0-13)
   In two separate terminals:

   **Terminal 1 - Run Laravel backend**
   ```bash
   php artisan serve
   ```
   **Terminal 2 - Run Vite frontend (Tailwind + JS assets)**
   ```bash
    npm run dev
    ```
   This will start the Laravel server, queue worker, logs, and Vite development server simultaneously.

10. **Access the application**
    Open your browser and navigate to:
   - **Laravel backend (API & Blade pages):** `http://localhost:8000`
   - **Vite frontend (assets & hot reload):** `http://localhost:5173`

## Feature Explanation

### User Authentication System
The application uses Laravel Breeze for authentication, providing secure login, registration, and profile management capabilities. Users must be authenticated and verified to access the main application features.

### Role-Based Access Control
The system implements a role-based permission system where:
- **Admin users** can create, update, and delete books
- **Regular users** can view all books but cannot modify them 
- User roles are managed through the `role` field in the User model

### Book Management (CRUD Operations)

#### Create Books
Administrators can add new books with comprehensive validation including:
- Required fields: title, author, ISBN, language, and status
- Optional fields: description, publisher, publication date, pages, and price
- Image upload support for book covers (JPEG, PNG, JPG up to 2MB)
- ISBN format validation and uniqueness enforcement

#### Read/View Books
- Paginated book listing with 12 books per page
- Search functionality across title, author, and ISBN fields
- Filter books by status (available, borrowed, maintenance)
- Detailed book view with complete information

#### Update Books
Administrators can edit existing books with the same validation rules as creation, including:
- ISBN uniqueness validation that excludes the current book being updated
- Cover image replacement with automatic cleanup of old images 

#### Delete Books
- Soft delete implementation for data integrity
- Automatic cleanup of associated cover images upon deletion
- Admin-only permission enforcement

### Advanced Features

#### Book Status Management
Books can have three status types: available, borrowed, or maintenance, allowing for inventory tracking.

#### Price Formatting
The system includes automatic price formatting for Indonesian Rupiah currency display. 

#### Database Optimization
The books table includes strategic indexes on frequently searched fields (title, author, ISBN, status) for improved query performance.

#### File Storage
Book cover images are stored in the public disk under the 'book-covers' directory with automatic file management.

## Notes

The application is designed with modern development practices including comprehensive validation, authorization policies, and responsive design. The use of Laravel Breeze provides a solid authentication foundation, while the combination of Tailwind CSS and Alpine.js ensures a modern, interactive user interface. The soft delete implementation maintains data integrity while allowing for book removal, and the role-based access control ensures proper security for administrative functions.

### Citations

**File:** app/Models/Book.php (L15-28)
```php
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'description',
        'publisher',
        'publication_date',
        'pages',
        'language',
        'status',
        'price',
        'cover_image',
        'created_by',
    ];
```

**File:** app/Models/Book.php (L41-48)
```php
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%")
                ->orWhere('isbn', 'like', "%{$search}%");
        });
    }
```

**File:** app/Models/Book.php (L50-53)
```php
    public function getFormattedPriceAttribute()
    {
        return $this->price ? 'Rp ' . number_format($this->price, 0, ',', '.') : 'N/A';
    }
```

**File:** app/Policies/BookPolicy.php (L10-17)
```php
    public function viewAny(User $user): bool
    {
        return true; // All authenticated users can view books
    }

    public function view(User $user, Book $book): bool
    {
        return true;
```

**File:** app/Policies/BookPolicy.php (L20-33)
```php
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Book $book): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Book $book): bool
    {
        return $user->isAdmin();
    }
```

**File:** database/migrations/2025_09_26_163315_create_books_table.php (L20-26)
```php
            $table->enum('status', ['available', 'borrowed', 'maintenance'])->default('available');
            $table->decimal('price', 10, 2)->nullable();
            $table->string('cover_image')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            // Soft deletes for model -> solves deleted_at missing
            $table->softDeletes();
```

**File:** database/migrations/2025_09_26_163315_create_books_table.php (L31-34)
```php
            // Indexes for performance
            $table->index(['title', 'author']);
            $table->index('isbn');
            $table->index('status');
```

**File:** composer.json (L8-9)
```json
    "require": {
        "php": "^8.2",
```

**File:** composer.json (L15-15)
```json
        "laravel/breeze": "^2.3",
```

**File:** composer.json (L30-32)
```json
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
```

**File:** .env.example (L24-29)
```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_management_system
DB_USERNAME=root
DB_PASSWORD=
```

**File:** package.json (L11-11)
```json
        "alpinejs": "^3.15.0",
```

**File:** package.json (L12-12)
```json
        "autoprefixer": "^10.4.2",
```

**File:** package.json (L13-13)
```json
        "axios": "^1.7.4",
```

**File:** package.json (L15-15)
```json
        "laravel-vite-plugin": "^1.2.0",
```

**File:** package.json (L16-16)
```json
        "postcss": "^8.4.31",
```

**File:** package.json (L19-19)
```json
    },
```

**File:** routes/web.php (L18-18)
```php
Route::middleware(['auth', 'verified'])->group(function () {
```

**File:** routes/web.php (L28-28)
```php
require __DIR__ . '/auth.php';
```

**File:** app/Models/User.php (L50-53)
```php
    public function isAdmin(): bool
    {
        return isset($this->role) && $this->role === 'admin';
    }
```

**File:** app/Http/Controllers/BookController.php (L18-28)
```php
        $books = Book::with('creator')
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('books.index', compact('books', 'search', 'status'));
```

**File:** app/Http/Controllers/BookController.php (L41-53)
```php
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'author'           => 'required|string|max:255',
            'isbn'             => 'required|string|unique:books,isbn|regex:/^[\d\-X]+$/',
            'description'      => 'nullable|string|max:1000',
            'publisher'        => 'nullable|string|max:255',
            'publication_date' => 'nullable|date|before_or_equal:today',
            'pages'            => 'nullable|integer|min:1|max:10000',
            'language'         => 'required|string|max:50',
            'status'           => 'required|in:available,borrowed,maintenance',
            'price'            => 'nullable|numeric|min:0|max:999999.99',
            'cover_image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
```

**File:** app/Http/Controllers/BookController.php (L56-56)
```php
            $validated['cover_image'] = $request->file('cover_image')->store('book-covers', 'public');
```

**File:** app/Http/Controllers/BookController.php (L85-85)
```php
            'isbn'             => ['required', 'string', 'regex:/^[\d\-X]+$/', Rule::unique('books')->ignore($book)],
```

**File:** app/Http/Controllers/BookController.php (L96-101)
```php
        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('book-covers', 'public');
        }
```

**File:** app/Http/Controllers/BookController.php (L111-111)
```php
        $this->authorize('delete', $book);
```

**File:** app/Http/Controllers/BookController.php (L113-115)
```php
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
```
