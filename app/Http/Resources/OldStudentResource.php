<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OldStudentResource extends JsonResource
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
            'is_working'=>$this->is_working,
            'job'=>$this->job,
            'salaryYear'=>$this->salaryYear,
            'year'=>$this->year,
            'passportCode'=>$this->passportCode,
            'ruxsat'=>$this->ruxsat,
            'program_id' => $this->program->name ?? null,
            'user_id' => $this->user->username ?? null,
        ];
    }
}
