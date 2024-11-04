<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Livewire\Pagination;

class AdminController extends Controller {
    public function Index() {
        $perPage = 10;
        $posts = Post::latest()->where( 'status', 'approve' )->paginate( $perPage );
        return view( 'admin.dashboard', compact( 'posts' ) );
    }

    public function AdminUpdate( Request $request ) {
        $adminId = $request->adminId;
        $admin = Admin::findOrFail( $adminId );

        // Checking if the image is uploaded
        if ( $request->hasFile( 'image' ) ) {
            $image = $request->file( 'image' );
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Storing image in storage
            $imagePath = $image->storeAs( 'public/Admins', $imageName );

            // If old image exists, delete it
            if ( $admin->image ) {
                $oldImagePath = 'public/Admins/' . $admin->image;
                if ( Storage::exists( $oldImagePath ) ) {
                    Storage::delete( $oldImagePath );
                }
            }

            // Update with new image name
            $admin->image = $imageName;
        }

        // Update other fields
        $admin->update( [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $admin->image, // This now holds the new image name
        ] );

        return back()->with( 'success', 'Admin updated successfully!' );
    }

}