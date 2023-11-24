<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class people extends Model
{
    public $table = "people"; //supaya laravelnya engga nambahin s jadi peoples
    use HasFactory;
    public $timestamps = false;
    public function project(){
        return $this->hasOne(project::class);
    }
}
