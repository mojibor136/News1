<?php
use App\Models\Category;

function getCategory() {
    return Category::with( 'subcategories' )->get();
}
