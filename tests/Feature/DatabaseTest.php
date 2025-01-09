<?php

use App\Models\Book;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

it('should be able o create a book', function () {

    postJson(
        route('book.store'),
        [
            'title' => 'Book qualquer',
            'description' => 'Descricao qualquer'
        ]
    )->assertCreated();

    assertDatabaseHas('books', ['title' => 'Book qualquer', 'description' => 'Descricao qualquer']);

    assertDatabaseCount('books', 1);
});

it('should be able to update a book', function () {

    $book = Book::factory()->create([
        'title' => 'Book qualquer',
        'description' => 'Descricao qualquer'
    ]);

    putJson(
        route('book.update', $book),
        [
            'title' => 'Book atualizado',
            'description' => 'Descricao atualizada'
        ]
    )->assertOk();

    assertDatabaseHas('books', [
        'id' => $book->id,
        'title' => 'Book atualizado',
        'description' => 'Descricao atualizada'
    ]);

    assertDatabaseCount('books', 1);
});

it('should be able to delete a book', function () {

    

})->todo();

it('should be able to soft delete a book', function () {

})->todo();
