<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="UnverstetRequest",
 *     type="object",
 *     title="University Request",
 *     required={"name", "location"},
 *     @OA\Property(property="name", type="string", example="Sample University"),
 *     @OA\Property(property="location", type="string", example="City, Country"),
 * )
 */

class UnverstetRequest extends FormRequest
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
            'name'=>'required|min:3',
            'country'=>'required',
            'region'=>'required',
            'about'=>'required|min:20',
            // 'image'=>'required|mimes:jpeg,jpg,png',
        ];
    }
}
