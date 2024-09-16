<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller {
    public function Login() {
        return view( 'auth.login' );
    }

    public function LoginStore( Request $request ) {
        $request->validate( [
            'email' => 'required|email',
            'password' => 'required',
        ] );

        $reseller = $request->only( 'email', 'password' );

        if ( !Auth::guard( 'web' )->attempt( $reseller ) ) {
            return redirect()->route( 'login' )->with( 'error', 'Invalid email or password.' );
        }

        return redirect()->route( 'home' );
    }
}
