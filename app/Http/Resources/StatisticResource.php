<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
