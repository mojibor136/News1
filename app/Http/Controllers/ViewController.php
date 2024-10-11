<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostVisitor;

class ViewController extends Controller {
    public function Index( $id, $name ) {
        $posts = getPostGroups();
        $viewPost = Post::with( 'tags' )->findOrFail( $id );

        PostVisitor::create( [
            'post_id' => $viewPost->id,
            'role' => $viewPost->role,
        ] );

        $relatedPosts = Post::where( 'category_id', $viewPost->category_id )
        ->where( 'id', '!=', $viewPost->id )
        ->get();
        return view( 'view', compact( 'posts', 'relatedPosts', 'name', 'viewPost' ) );
    }
}
