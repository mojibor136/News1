<?php
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\PostVisitor;

function ReporterPostCount() {
    $reporterUser = Auth::guard( 'reporter' )->user();
    $authorId = $reporterUser->id;
    return Post::where( 'author_id', $authorId )->where( 'role', 'reporter' )->count();
}

function ReporterViewPostCount() {
    $reporterUser = Auth::guard( 'reporter' )->user();
    $authorId = $reporterUser->id;
    return PostVisitor::where( 'role', 'reporter' )->where( 'author_id', $authorId )->count();
}
