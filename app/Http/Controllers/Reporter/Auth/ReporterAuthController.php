<?php

namespace App\Http\Controllers\Reporter\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reporter;

class ReporterAuthController extends Controller {
    public function ReporterLoginPage() {
        return view( 'reporter.auth.login' );
    }

    public function ReporterLogin( Request $request ) {
        $request->validate( [
            'email' => 'required|email',
            'password' => 'required',
        ] );

        $reporter = Reporter::where( 'email', $request->email )->first();

        if ( !$reporter ) {
            return back()->with( 'error', 'Invalid email or password.' );
        }

        if ( Auth::guard( 'reporter' )->attempt( $request->only( 'email', 'password' ) ) ) {
            if ( $reporter->status !== 'active' ) {
                Auth::guard( 'reporter' )->logout();

                return back()->with( 'error', 'Your account is deactivated. Please contact support.' );
            }

            return redirect()->route( 'reporter' );

        }

        return back()->with( 'error', 'Invalid email or password.' );
    }

    public function ReporterLogout() {
        Auth::guard( 'reporter' )->logout();
        return redirect()->route( 'home' );
    }
}
