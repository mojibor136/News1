<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    public function AllUser() {
        return view( 'admin.user' );
    }
}
