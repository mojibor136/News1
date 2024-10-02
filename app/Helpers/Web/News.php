<?php
use App\Models\News;

function getNews() {
    return News::all();
}