<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ad;

class AdController extends Controller {
    public function Index() {
        $ads = Ad::all();
        return view( 'admin.ads', compact( 'ads' ) );
    }

    public function CreateAds() {
        return view( 'admin.create-ads' );
    }

    public function DeleteAds( $id ) {
        Ad::findOrFail( $id )->delete();
        return back()->with( 'success', 'Ads deleted successfully' );
    }

    public function StoreAds( Request $request ) {
        $request->validate( [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required|url',
        ] );

        if ( $request->hasFile( 'image' ) ) {
            $image = $request->file( 'image' );
            $imagePath = $image->store( 'public/images' );
            $imageUrl = Storage::url( $imagePath );
        }

        Ad::create( [
            'image' => $imageUrl,
            'link' => $request->link,
        ] );

        return redirect()->route( 'ads' )->with( 'success', 'Ad created successfully.' );
    }
}
