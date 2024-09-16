<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller {
    public function Index() {
        return view( 'admin.post' );
    }

    public function PendingPost() {
        return view( 'admin.pending' );
    }
}
