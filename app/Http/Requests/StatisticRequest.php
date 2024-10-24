<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="StatisticRequest",
 *     type="object",
 *     required={"unverstet_id", "type_id", "total_students", "total_scholarships"},
 *     @OA\Property(property="unverstet_id", type="integer", example=1, description="ID of the associated university"),
 *     @OA\Property(property="type_id", type="integer", example=1, description="ID of the type (e.g., program type)"),
 *     @OA\Property(property="total_students", type="integer", example=500, description="Total number of students"),
 *     @OA\Property(property="total_scholarships", type="integer", example=150, description="Total number of scholarships")
 * )
 */
class StatisticRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<string>|string>
     */
    public function rules(): array
    {
        return [
            'unverstet_id' => 'required|integer|exists:unverstets,id',
            'type_id' => 'required|integer|exists:types,id',
            'total_students' => 'required|integer',
            'total_scholarships' => 'required|integer',
        ];
    }
}
