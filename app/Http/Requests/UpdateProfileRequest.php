<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->get('id');
        return [
            'id' => ['required', 'numeric', 'exists:users,id'],
            'firstName' => ['required', 'string', 'max:50'],
            'middleName' => ['string', 'max:50'],
            'secondName' => ['required', 'string', 'max:50'],
            'dateBirthday' => ['required', 'date'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
            'phone' => ['required', Rule::unique('users')->ignore($userId)],
        ];
    }
}
