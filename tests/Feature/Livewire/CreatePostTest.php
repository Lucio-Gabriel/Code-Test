<?php

use App\Livewire\CreatePost;
use App\Livewire\ShowPost;
use App\Livewire\UpdatePost;
use App\Models\Post;
use Livewire\Livewire;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\get;

it('renders successfully', function () {
    Livewire::test(CreatePost::class)
        ->assertStatus(200);
});

test('component exist', function () {
    get('/posts/create')
        ->assertSee(CreatePost::class);
});

test('create title', function () {
    Post::factory()->create();

    Livewire::test(CreatePost::class)
        ->set('title', 'My title one')
        ->assertSet('title', 'My title one');

    assertDatabaseCount('posts', 1);
});

test('update post', function () {
    $post = Post::factory()->create([
        'title' => 'Titulo',
    ]);

    Livewire::test(UpdatePost::class, ['post' => $post])
        ->set('title', 'Titulo atualizado')
        ->assertSet('title', 'Titulo atualizado');

    assertDatabaseCount('posts', 1);
});

test('show posts', function () {
    Post::factory()->create(['title' => 'Meu primeiro title']);
    Post::factory()->create(['title' => 'Meu segundo title']);

    Livewire::test(ShowPost::class)
        ->assertSee('Meu primeiro title')
        ->assertSee('Meu segundo title');

    Livewire::test(ShowPost::class)
        ->assertViewHas('posts', function ($posts) {
            return count($posts) == 2;
        });

    assertDatabaseCount('posts', 2);
});
