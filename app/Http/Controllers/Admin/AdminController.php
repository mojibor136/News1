<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Livewire\Pagination;

class AdminController extends Controller {
    public function Index() {
        $posts = Post::paginate( 5 );
        return view( 'admin.dashboard', compact( 'posts' ) );
    }
}
