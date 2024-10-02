<?php

use App\Models\Post;

function getPostGroups() {

    $allpost = Post::latest()->get();

    $latestPost = Post::latest()->first();

    $twoPosts = Post::latest()->distinct()->skip(1)->take(2)->get();

    $fourPosts = Post::latest()->skip( 3 )->take( 4 )->get();

    return [
        'latest' => $latestPost,
        'two' => $twoPosts,
        'four' => $fourPosts,
        'all' => $allpost,
    ];
}
