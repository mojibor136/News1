<?php

namespace App\Http\Controllers\Clint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClintController extends Controller {

    public function Dashboard() {
        return view( 'clint.dashboard' );
    }
}
