<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $fillable=['id','total_students','total_scholarships'];
    public function unverset()
    {
        return $this->belongsTo(Unverstet::class, 'unverstet_id'); // unverstet_id'ni unverset modeliga bog'laydi
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id'); // type_id'ni type modeliga bog'laydi
    }
}
