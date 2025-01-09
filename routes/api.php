<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', function () {
    $books = Book::all();
    $book = $books->map(fn($b) => [
       'title' => $b->title,
       'description' => $b->description
    ]);

   return array_merge([
       ['title' => 'Livro 1'],
       ['description' => 'Description 1'],
       ['title' => 'Livro 2'],
       ['description' => 'Description 2'],
   ], $book->toArray());
});
