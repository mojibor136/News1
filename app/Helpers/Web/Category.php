<?php
use App\Models\Category;
use App\Models\Post;

function getCategory() {
    $categoryPostCounts = Post::select('category_id')
        ->groupBy('category_id')
        ->havingRaw('COUNT(*) >= 3') 
        ->pluck('category_id');

    $subcategoryPostCounts = Post::select('subcategory_id')
        ->groupBy('subcategory_id')
        ->havingRaw('COUNT(*) >= 3') 
        ->pluck('subcategory_id');

    return Category::whereIn('id', $categoryPostCounts)
        ->with(['subcategories' => function ($query) use ($subcategoryPostCounts) {
            $query->whereIn('id', $subcategoryPostCounts); 
        }])->get();
}

