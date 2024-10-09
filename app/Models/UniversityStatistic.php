<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityStatistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'university_id',
        'employment_rate',
        'average_income',
        'employment_growth_rate',
        'year'
    ];

    public function university()
    {
        return $this->belongsTo(Unverstet::class, 'university_id');
    }
}
