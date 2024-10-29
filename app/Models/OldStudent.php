<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="OldStudent",
 *     type="object",
 *     title="OldStudent",
 *     required={"is_working", "year", "passportCode", "user_id", "program_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="is_working", type="boolean", example=true),
 *     @OA\Property(property="job", type="string", example="Software Engineer"),
 *     @OA\Property(property="salaryYear", type="integer", example=50000),
 *     @OA\Property(property="year", type="integer", example=2024),
 *     @OA\Property(property="passportCode", type="string", example="AB123456"),
 *     @OA\Property(property="ruxsat", type="boolean", example=true),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="program_id", type="integer", example=1)
 * )
 */
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
