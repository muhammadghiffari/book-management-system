<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

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
    }

    public function create()
    {
        $this->authorize('create', Book::class);
        return view('books.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Book::class);

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

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->fit(400, 600)->save(storage_path('app/public/book-covers/' . $filename));
            $validated['cover_image'] = 'book-covers/' . $filename;
        }

        $validated['created_by'] = auth()->id();

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);

        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'author'           => 'required|string|max:255',
            'isbn'             => ['required', 'string', 'regex:/^[\d\-X]+$/', Rule::unique('books')->ignore($book)],
            'description'      => 'nullable|string|max:1000',
            'publisher'        => 'nullable|string|max:255',
            'publication_date' => 'nullable|date|before_or_equal:today',
            'pages'            => 'nullable|integer|min:1|max:10000',
            'language'         => 'required|string|max:50',
            'status'           => 'required|in:available,borrowed,maintenance',
            'price'            => 'nullable|numeric|min:0|max:999999.99',
            'cover_image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->fit(400, 600)->save(storage_path('app/public/book-covers/' . $filename));
            $validated['cover_image'] = 'book-covers/' . $filename;
        }

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully!');
    }
}
