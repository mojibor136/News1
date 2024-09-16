<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserPermission as UserPermissionModel;

class UserPermission {
    /**
    * Handle an incoming request.
    *
    * @param  \Closure( \Illuminate\Http\Request ): ( \Symfony\Component\HttpFoundation\Response )  $next
    */

    public function handle( Request $request, Closure $next ): Response {
        $permission = UserPermissionModel::value( 'status' );

        if ( $permission === '0' ) {
            return redirect( '/' );
        }

        return $next( $request );
    }
}
