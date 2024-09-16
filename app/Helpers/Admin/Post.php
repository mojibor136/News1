<?php
use App\Models\Post;

function PostCount() {
    return Post::count();
}
