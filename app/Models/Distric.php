<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distric extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function subDistricts() {
        return $this->hasMany( SubDistric::class, 'district_id' );
    }

    public function posts() {
        return $this->hasMany( Post::class, 'district_id' );
    }
}
