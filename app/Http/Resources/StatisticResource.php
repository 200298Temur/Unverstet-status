<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="StatisticResource",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="university_id", type="integer"),
 *     @OA\Property(property="employment_rate", type="number", format="float"),
 *     @OA\Property(property="average_income", type="integer"),
 *     @OA\Property(property="employment_growth_rate", type="number", format="float"),
 *     @OA\Property(property="year", type="integer"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */


class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$request->id,
           'total_students'=>$request->total_students,
           'total_scholarships'=>$request->total_scholarships,
           'unverset_id' => $this->unverset->name ?? null,
           'type_id' => $this->type->name ?? null,
        ];
    }
}
