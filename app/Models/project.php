<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    public $table = "project"; //supaya laravelnya engga nambah s jadi projects
    public $timestamps = false;
    public function people(){
        return $this->belongsTo(people::class);
    }

    public function stakeholder(){
        return $this->hasMany(stakeholder::class);
    }
    
}
