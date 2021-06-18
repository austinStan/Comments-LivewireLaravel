<?php

namespace App\Http\Livewire;

use App\Comment as AppComment;
use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $comments;

    public $newComment;

    public function mount()
    {
        $initialcomments = AppComment::latest()->get();
        $this->comments = $initialcomments;
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required | max:10']);
    }

    public function render()
    {
        return view('livewire.comment');
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required'
        ]);

        $createdComment = AppComment::create([
            'body' => $this->newComment,
            'user_id' => 1,
        ]);

        $this->comments->push($createdComment);

        $this->newComment = "";
    }
}
