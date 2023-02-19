<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    //Relacion muchos a muchos con usuarios
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
