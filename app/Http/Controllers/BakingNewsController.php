<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BakingNewsController extends Controller {
    public function Index() {
        return view( 'admin.bakingnews' );
    }
}
