<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function planet() {
        return $this->belongsTo(Planet::class);
    }

    public function species() {
        return $this->belongsToMany(Species::class);
    }
}
