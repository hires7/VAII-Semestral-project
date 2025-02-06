<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    
    protected $fillable = ['brand', 'model', 'license_plate', 'year', 'photo_path'];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
