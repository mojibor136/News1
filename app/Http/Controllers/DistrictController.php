<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistrictController extends Controller {
    public function Index() {
        return view( 'admin.district' );
    }
}
