<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable=['total_score','unverstet_id'];
    public function unversitet()
    {
        return $this->hasMany(UniversityStatistic::class, 'university_id');
    }
}