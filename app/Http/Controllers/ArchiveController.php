<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchiveController extends Controller {
    public function Index() {
        return view( 'archives' );
    }
}
