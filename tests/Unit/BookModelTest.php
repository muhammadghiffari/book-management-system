<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_book_belongs_to_creator()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create(['created_by' => $user->id]);

        $this->assertInstanceOf(User::class, $book->creator);
        $this->assertEquals($user->id, $book->creator->id);
    }

    public function test_formatted_price_attribute()
    {
        $book = Book::factory()->make(['price' => 150000]);

        $this->assertEquals('Rp 150.000', $book->formatted_price);
    }

    public function test_search_scope()
    {
        $user = User::factory()->create();
        Book::factory()->create([
            'title'      => 'Laravel Framework',
            'author'     => 'Taylor Otwell',
            'created_by' => $user->id
        ]);
        Book::factory()->create([
            'title'      => 'Vue.js Guide',
            'author'     => 'Evan You',
            'created_by' => $user->id
        ]);

        $results = Book::search('Laravel')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Laravel Framework', $results->first()->title);
    }
}
