<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldStudent extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','is_working','job','salaryYear','passportCode','ruxsat','year'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function program(){
        return $this->belongsTo(related: Program::class);
    }
}
