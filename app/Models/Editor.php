<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Editor",
 *     type="object",
 *     title="Editor",
 *     required={"username", "email", "password", "unverstet_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="username", type="string", example="editor_username"),
 *     @OA\Property(property="email", type="string", format="email", example="editor@example.com"),
 *     @OA\Property(property="password", type="string", example="password123"),
 *     @OA\Property(property="unverstet_id", type="integer", example=1)
 * )
 */
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
