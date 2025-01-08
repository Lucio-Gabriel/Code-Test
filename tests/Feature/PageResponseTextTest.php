<?php

use App\Models\Book;
use function Pest\Laravel\get;

test('should list books')
        ->get('/book')
        ->assertOk()
        ->assertSeeTextInOrder([
            'Book A',
            'Description A',
            'Book B',
            'Description B',
        ]);

it('should list books from the database', function() {
        $book1 = Book::factory()->create();
        $book2 = Book::factory()->create();

        get('/book')
        ->assertOk()
        ->assertSeeTextInOrder([
           'Book A',
           'Description A',
           'Book B',
           'Description B',
           $book1->title,
           $book1->description,
           $book2->title,
           $book2->description,
        ]);
});
