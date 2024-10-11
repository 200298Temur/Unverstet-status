<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable=['total_score','unverstet_id'];
    public function unverstet()
    {
        return $this->hasMany(Unverstet::class, 'university_id');
    }
}