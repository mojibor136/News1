<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller {
    public function Index( Request $request ) {
        $searchTerm = $request->input( 'query' );
        $posts = Post::where( 'status', 'approve' )->where( 'title', 'LIKE', "%{$searchTerm}%" )
        ->orWhere( 'description', 'LIKE', "%{$searchTerm}%" )
        ->get();

        return view( 'search', compact( 'posts', 'searchTerm' ) );
    }
}
