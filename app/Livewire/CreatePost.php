<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class CreatePost extends Component
{
    public $title;
    public function render(): View
    {
        return view('livewire.create-post');
    }
}
