<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cube;

class Theme extends Model
{
    use HasFactory;

    public function cubes()
    {
        return $this->belongsToMany(Cube::class);
    }
}
