<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialLinkController extends Controller {
    public function Index() {
        return view( 'admin.link' );
    }
}
