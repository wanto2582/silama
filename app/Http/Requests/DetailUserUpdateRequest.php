<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailUserUpdateRequest extends FormRequest
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
            'photo' => ['nullable', 'image', 'max:1024'],
            'nik' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:255'],
            'religion' => ['nullable', 'string', 'max:255'],
            'born_place' => ['nullable', 'string', 'max:255'],
            'born_date' => ['nullable', 'date', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', ],
            'role' => ['nullable', 'string', 'max:255'],
        ];
    }
}
