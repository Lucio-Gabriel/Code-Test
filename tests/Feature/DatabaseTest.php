<?php

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

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
