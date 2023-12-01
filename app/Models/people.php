<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class people extends Authenticatable
{
    public $table = "people"; //supaya laravelnya engga nambahin s jadi peoples
    use HasFactory;
    public $timestamps = false;
    public function project(){
        return $this->hasOne(project::class);
    }
    
    protected $fillable = [
        'peopleID',
        'name',
        'age',
        'email',
        'password',
        'address',
        'date of birth',
        'phone number'
    ];
}
