<?php
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

function ClintPostCount() {
    $AuthId = Auth::id();
    return Post::where( 'author_id', $AuthId )
    ->where( 'role', 'user' )
    ->count();
}
