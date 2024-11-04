<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;

class VideoController extends Controller {
    public function Index() {
        return view( 'admin.video' );
    }

    public function Video() {
        $videos = Video::all();
        return view( 'video', compact( 'videos' ) );
    }
}
