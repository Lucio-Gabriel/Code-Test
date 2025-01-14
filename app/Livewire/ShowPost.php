<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public function render()
    {
        return view('livewire.show-post', [
            'posts' => Post::all(),
        ]);
    }
}
