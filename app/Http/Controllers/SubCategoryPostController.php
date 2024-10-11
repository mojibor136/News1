<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class SubCategoryPostController extends Controller {
    public function Index( $id, $name ) {

        $allposts = Post::where( 'subcategory_id', $id )->get();

        $randomPosts = $allposts->count() >= 8 ? $allposts->random( 8 ) : $allposts->random( $allposts->count() );

        return view( 'subcategory_post', compact( 'name', 'allposts', 'randomPosts' ) );
    }
}
