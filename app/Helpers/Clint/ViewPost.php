<?php
use App\Models\Post;
use App\Models\PostVisitor;
use Illuminate\Support\Facades\Auth;

function ClintPostCount() {
    $clintUser = Auth::guard( 'web' )->user();
    $authorId = $clintUser->id;
    return Post::where( 'author_id', $authorId )->where( 'role', 'user' )->count();
}

function ClintViewPostCount() {
    $clintUser = Auth::guard( 'web' )->user();
    $authorId = $clintUser->id;
    return PostVisitor::where( 'role', 'user' )->where( 'author_id', $authorId )->count();
}
