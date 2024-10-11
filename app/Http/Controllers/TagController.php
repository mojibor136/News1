<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller {
    public function Index( $id, $name ) {
        $tag = Tag::findOrFail( $id );
        $posts = $tag->posts;
        return view( 'tag', compact( 'name', 'posts' ) );
    }
}
