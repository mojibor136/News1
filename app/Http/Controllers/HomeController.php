<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function Home() {

        $posts = getPostGroups();

        return view( 'welcome', compact( 'posts' ) );
    }
}
