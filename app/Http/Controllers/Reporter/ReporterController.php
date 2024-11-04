<?php

namespace App\Http\Controllers\Reporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reporter;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ReporterController extends Controller {
    public function Index() {
        $authId = auth( 'reporter' )->id();
        $posts = Post::where( 'author_id', $authId )
        ->where( 'role', 'reporter' )
        ->paginate( 10 );
        return view( 'reporter.home', compact( 'posts' ) );
    }

    public function ReporterList() {
        $reporters = Reporter::paginate( 14 );
        return view( 'admin.reporterlist', compact( 'reporters' ) );
    }

    public function ReporterCreate( Request $request ) {
        Reporter::create( [
            'image' => '',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
            'role' => 'reporter',
            'status' => 'active',
        ] );

        return back()->with( 'success', 'Reporter Created Successfull' );
    }

    public function ReporterDelete( $id ) {
        Reporter::findOrFail( $id )->delete();
        return back()->with( 'success', 'Reporter Deleted Successfull' );
    }

    public function Status( $id ) {
        $reporter = Reporter::find( $id );

        if ( $reporter->status === 'active' ) {
            $reporter->status = 'deactive';
        } elseif ( $reporter->status === 'deactive' ) {
            $reporter->status = 'active';
        } else {
            $reporter->status = 'active';
        }

        $reporter->save();

        return redirect()->back();
    }

    public function Edit( $id ) {
        $reporter = Reporter::findOrFail( $id );
        return view( 'reporter.edit.edit', compact( 'reporter' ) );
    }

    public function Update( Request $request ) {
        $reporter = Reporter::findOrFail( $request->id );

        $reporter->update( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
        ] );

        return redirect()->route( 'reporter.list' )->with( 'success', 'Update Reporter Profile' );
    }

}
