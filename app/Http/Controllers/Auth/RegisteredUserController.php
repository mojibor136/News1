<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller {
    /**
    * Display the registration view.
    */

    public function Registere(): View {
        return view( 'auth.register' );
    }

    /**
    * Handle an incoming registration request.
    *
    * @throws \Illuminate\Validation\ValidationException
    */

    public function Store( Request $request ): RedirectResponse {

        $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ] );

        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
            'role' => 'user',
        ] );

        event( new Registered( $user ) );

        Auth::login( $user );

        return redirect()->route( 'home' );
    }
}
