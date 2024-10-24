<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="TypeResource",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Example Type"),
 *     @OA\Property(property="description", type="string", example="Description of the type"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-24T12:34:56"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-24T12:34:56")
 * )
 */

class TypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            "name"=>$this->name,
        ];
    }
}
