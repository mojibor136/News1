<?php

namespace App\Http\Controllers\Clint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ClintController extends Controller {

    public function Dashboard() {
        $authId = Auth::id();
        $posts = Post::where( 'author_id', $authId )->where( 'role', 'user' )->paginate( 10 );
        return view( 'clint.dashboard', compact( 'posts' ) );
    }
}
