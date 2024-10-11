<?php
use App\Models\Post;

function PostCount() {
    return Post::count();
}

function PostTitle() {
    return Post::first();
}
