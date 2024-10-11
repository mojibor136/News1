<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoryPostController extends Controller {
    public function Index( $id, $name ) {
        $posts = getPostGroups();

        $allposts = Post::where( 'category_id', $id )->get();

        $latestPost = $allposts->first();

        $secondPost = $allposts->skip( 1 )->first();

        $randomPosts = $allposts->take(3)->shuffle();

        return view( 'category_post', compact( 'name', 'allposts', 'posts', 'randomPosts', 'secondPost', 'latestPost' ) );
    }
}
