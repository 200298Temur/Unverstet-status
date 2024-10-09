<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unverstet extends Model
{
    use HasFactory;
    protected $fillable=['name','id','region','country','about','image'];
    public function statistic()
    {
        return $this->hasMany(Statistic::class);
    }
    public function editor()
    {
        return $this->hasMany(Editor::class);
    }
    public function program(){
        return $this->hasMany(Program::class);
    }
}
