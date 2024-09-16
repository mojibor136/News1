<?php

namespace App\Http\Controllers\Clint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClintPostController extends Controller {
    public function Index() {
        return view( 'clint.post' );
    }
}
