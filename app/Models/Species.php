<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    public function persons() {
        return $this->belongsToMany(Person::class);
    }

    public function planets() {
        return $this->belongsTo(Planet::class);
    }
}
