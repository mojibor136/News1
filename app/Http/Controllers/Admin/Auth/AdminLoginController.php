<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller {
    public function Index() {
        return view( 'admin.auth.login' );
    }

    public function AdminLogin( Request $request ) {
        $request->validate( [
            'email' => 'required|email',
            'password' => 'required',
        ] );

        if ( Auth::guard( 'admin' )->attempt( $request->only( 'email', 'password' ) ) ) {
            return redirect()->route( 'admin' );
        }

        return back()->with( 'error', 'Invalid email or password.' );
    }

    public function AdminLogout() {
        Auth::guard( 'admin' )->logout();
        return redirect()->route( 'admin.login' );
    }
}
