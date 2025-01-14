<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class UpdatePost extends Component
{
    public Post $post;

    public $title = '';

    public function mount(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title;
    }

    public function render(): View
    {
        return view('livewire.update-post');
    }
}
