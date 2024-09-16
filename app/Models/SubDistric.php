<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistric extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'district_id',
    ];

    public function district() {
        return $this->belongsTo( Distric::class, 'district_id' );
    }

    public function posts() {
        return $this->hasMany( Post::class, 'subdistrict_id' );
    }

}
