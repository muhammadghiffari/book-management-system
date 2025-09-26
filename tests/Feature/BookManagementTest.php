<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_book()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('books.store'), [
            'title'       => 'Test Book',
            'author'      => 'Test Author',
            'isbn'        => '978-0123456789',
            'description' => 'A test book',
            'language'    => 'English',
            'status'      => 'available',
        ]);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', ['title' => 'Test Book']);
    }

    public function test_regular_user_cannot_create_book()
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get(route('books.create'));

        $response->assertStatus(403);
    }

    public function test_book_search_functionality()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Book::factory()->create([
            'title'      => 'Laravel Guide',
            'author'     => 'John Doe',
            'created_by' => $admin->id
        ]);

        $response = $this->actingAs($admin)->get(route('books.index', ['search' => 'Laravel']));

        $response->assertStatus(200);
        $response->assertSeeText('Laravel Guide');
    }
}
