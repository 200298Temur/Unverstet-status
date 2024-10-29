<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Program",
 *     type="object",
 *     title="Program",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Computer Science"),
 *     @OA\Property(property="unverstet_id", type="integer", example=1),
 *     @OA\Property(property="type_id", type="integer", example=2)
 * )
 */
class Program extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function unverstet()
    {
        return $this->belongsTo(Unverstet::class);
    }
}
