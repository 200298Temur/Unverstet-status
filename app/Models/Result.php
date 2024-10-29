<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Result",
 *     type="object",
 *     required={"total_score", "unverstet_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="total_score", type="integer", example=95),
 *     @OA\Property(property="unverstet_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-10T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-10T12:00:00Z")
 * )
 */

class Result extends Model
{
    use HasFactory;
    protected $fillable=['total_score','unverstet_id'];
    public function unverstet()
    {
        return $this->hasMany(Unverstet::class, 'university_id');
    }
}