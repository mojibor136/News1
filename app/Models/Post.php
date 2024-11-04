<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'imgTitle',
        'reporter',
        'subtitle',
        'description',
        'category_id',
        'subcategory_id',
        'district_id',
        'subdistrict_id',
        'author_name',
        'author_id',
        'role',
        'status',
        'lead',
        'slug',
        'image',
    ];

    public function category() {
        return $this->belongsTo( Category::class );
    }

    public function subcategory() {
        return $this->belongsTo( SubCategory::class );
    }

    public function district() {
        return $this->belongsTo( Distric::class, 'district_id' );
    }

    public function subdistrict() {
        return $this->belongsTo( SubDistric::class, 'subcategory_id' );
    }

    public function tags() {
        return $this->belongsToMany( \App\Models\Tag::class, 'post_tag' );
    }

    public function visitors() {
        return $this->hasMany( PostVisitor::class, 'post_id' );
    }

}
