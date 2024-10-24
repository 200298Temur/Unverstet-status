<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     schema="TypeRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Example Type"),
 *     @OA\Property(property="description", type="string", example="Description of the type")
 * )
 */

class TypeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required' 
        ];
    }
}
