<?php
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

function ViewPostCount() {
    $userId = Auth::id();

    return Post::where( 'author_id', $userId )->count();
}
