<?php
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

function ViewPostCount() {
    $user = Auth::user();

    return $user->posts()->count();
}
