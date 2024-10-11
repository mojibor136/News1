<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Carbon\Carbon;

class PostFilter extends Component {

    public $filter = 'latest';

    public function showLatest() {
        $this->filter = 'latest';
    }

    public function showOld() {
        $this->filter = 'old';
    }

    public function render() {
        if ( $this->filter === 'latest' ) {
            $posts = Post::latest()->get();
        } else {
            $posts = Post::where( 'created_at', '<=', Carbon::now()->subDay() )->get();
        }

        return view( 'livewire.post-filter', [ 'posts' => $posts ] );
    }
}
