<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller {
    public function Index() {
        return view( 'admin.subcategory' );
    }
}
