<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','username','email','password',
    ];
    public function unverstet(){
        return $this->belongsTo(Unverstet::class);
    }
    
}
