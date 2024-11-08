<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVisitor extends Model {
    use HasFactory;

    protected $fillable = [ 'post_id', 'role' , 'author_id'];

    public function post() {
        return $this->belongsTo( Post::class, 'post_id' );
    }

}
