<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $newComment;

    public function mount($comments)
    {
        dd($comments);
        $this->newComment = $comments;
    }

    public $comments = [
        [
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley',
            'created_at' => '3 mins ago',
            'creator' => 'Austin Stan'
        ]
    ];

    public function render()
    {
        return view('livewire.comment');
    }

    public function addComment()
    {
        if ($this->newComment == '') {
            return;
        }
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'James Bond',
        ]);

        // $this->comments = "";
    }
}
