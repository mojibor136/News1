<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoController extends Controller {
    public function Index() {
        return view( 'admin.logo-management' );
    }
}
