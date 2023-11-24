<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stakeholder extends Model
{
    use HasFactory;
    public $table = "stakeholder"; //supaya laravel engga tambahin s jadi stakeholders
    public $timestamps = false;
    public function project(){
        return $this->belongsToMany(project::class);
    }
}
