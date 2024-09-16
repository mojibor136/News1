<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubDistrictController extends Controller {
    public function Index() {
        return view( 'admin.subdistrict' );
    }
}
