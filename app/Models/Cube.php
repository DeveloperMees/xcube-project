<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Part;
use App\Models\Theme;

class Cube extends Model
{
    use HasFactory;

    public function parts()
    {
        return $this->belongsToMany(Part::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
