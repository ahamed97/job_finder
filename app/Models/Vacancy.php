<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }
}
