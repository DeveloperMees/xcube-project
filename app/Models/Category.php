<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Part;

class Category extends Model
{
    use HasFactory;

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
