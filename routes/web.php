<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book', function () {
    return view('books', [
        'books' => Book::all()
    ]);
});

Route::post('/books', function () {
    Book::query()
        ->create(request()->only('title', 'description'));

    return response()->json('', '201');
})->name('book.store');

Route::put('/books/{book}', function (Book $book) {
    $book->title = request()->get('title');
    $book->description = request()->get('description');
    $book->save();
})->name('book.update');

Route::delete('/books/{book}', function (Book $book) {
    $book->forceDelete();
})->name('book.destroy');

Route::delete('/books/{book}/soft-delete', function (Book $book) {
    $book->delete();
})->name('book.soft-delete');

Route::get('/posts/create', \App\Livewire\CreatePost::class);

Route::get('/posts/show', \App\Livewire\ShowPost::class);

Route::get('/posts/update/{post}', \App\Livewire\UpdatePost::class);
