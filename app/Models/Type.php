<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable=['id','name'];
    public function statistic()
    {
        return $this->hasMany(Statistic::class);
    }
    public function program()
    {
        return $this->hasMany(Program::class);
    }
}