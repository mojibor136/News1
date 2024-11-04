<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginUserController extends Controller {
    public function Login() {
        return view( 'auth.login' );
    }

    public function LoginStore( Request $request ) {
        // Validate the request
        $request->validate( [
            'email' => 'required|email',
            'password' => 'required',
        ] );

        // Retrieve the user based on the email
        $user = User::where( 'email', $request->email )->first();

        // Attempt to authenticate the user
        if ( !Auth::guard( 'web' )->attempt( $request->only( 'email', 'password' ) ) ) {
            return redirect()->route( 'login' )->with( 'error', 'Invalid email or password.' );
        }

        // Check if the user's status is active
        if ($user && $user->status !== 'active') {
            Auth::guard('web')->logout(); // Log out the user if they are inactive
            return redirect()->route('login')->with('error', 'Your account is deactivated. Please contact support.');
        }
    
        // Redirect to the home route if the user is active
        return redirect()->route('home' );
    }

}
