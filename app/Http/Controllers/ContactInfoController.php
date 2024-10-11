<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactInfoController extends Controller {
    public function Index() {
        return view( 'admin.contactinfo' );
    }
}
