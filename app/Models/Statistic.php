<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Statistic",
 *     type="object",
 *     required={"unverstet_id", "type_id", "total_students", "total_scholarships"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="unverstet_id", type="integer", example=1),
 *     @OA\Property(property="type_id", type="integer", example=1),
 *     @OA\Property(property="total_students", type="integer", example=500),
 *     @OA\Property(property="total_scholarships", type="integer", example=150),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-10T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-10T12:00:00Z")
 * )
 */
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
