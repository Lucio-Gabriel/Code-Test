<?php

use App\Models\Book;
use function Pest\Laravel\get;

it('should by able return list book')
    ->get('/api/books')
    ->assertOk()
    ->assertExactJson([
        ['title' => 'Livro 1'],
        ['description' => 'Description 1'],
        ['title' => 'Livro 2'],
        ['description' => 'Description 2'],
    ]);

it('should by able list book', function () {
    $book1 = Book::factory()->create();
    $book2 = Book::factory()->create();

        get('/api/books')
            ->assertOk()
            ->assertJson([
                ['title' => 'Livro 1'],
                ['description' => 'Description 1'],
                ['title' => 'Livro 2'],
                ['description' => 'Description 2'],
                ['title' => $book1->title],
                ['description' => $book1->description],
                ['title' => $book2->title],
                ['description' => $book2->description]
            ]);
});
