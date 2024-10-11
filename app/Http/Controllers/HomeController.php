<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class HomeController extends Controller {
    public function Home() {

        $posts = getPostGroups();
        $videoFor = Video::inRandomOrder()->take( 4 )->get();
        $videoOne = Video::latest()->first();

        return view( 'welcome', compact( 'posts', 'videoFor', 'videoOne' ) );
    }
}
