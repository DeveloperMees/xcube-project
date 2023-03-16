<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Issue;
use App\Models\User;

class Ticket extends Model
{
    use HasFactory;

    function issue() {
        return $this->belongsTo(Issue::class);
    }

    function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}