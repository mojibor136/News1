<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;

class ArchiveSearch extends Component {
    public $startDate;
    public $endDate;
    public $category = 'all';
    public $categories;
    public $posts = [];

    public function mount() {
        $this->categories = Category::all();
        $this->posts = Post::all();
    }

    public function search() {
        $this->posts = Post::query();

        if ( $this->startDate && $this->endDate ) {
            $this->posts->whereBetween( 'created_at', [ $this->startDate, $this->endDate ] );
        }

        if ( $this->category !== 'all' ) {
            $this->posts->where( 'category_id', $this->category );
        }

        $this->posts = $this->posts->get();
    }

    public function render() {
        return view( 'livewire.archive-search', [
            'posts' => $this->posts,
        ] );
    }
}
