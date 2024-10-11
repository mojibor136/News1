<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment as CommentModel;

class Comment extends Component {
    public $name, $comment, $postId;

    public function mount( $id ) {
        $this->postId = $id;
    }

    public function Comment() {
        $this->validate( [
            'comment' => 'required',
            'name' => 'required',
        ] );

        // Comment save logic
        CommentModel::create( [
            'content' => $this->comment,
            'name' => $this->name,
            'news_id' => $this->postId,
        ] );

        // Reset fields after submit
        $this->resetInputFields();

        // Flash message
        session()->flash( 'message', 'Your comment has been posted successfully!' );
    }

    public function resetInputFields() {
        $this->reset( [ 'name', 'comment' ] );
    }

    public function render() {
        $comments = CommentModel::where( 'news_id', $this->postId )->get();
        return view( 'livewire.comment', [ 'comments' => $comments ] );
    }
}
