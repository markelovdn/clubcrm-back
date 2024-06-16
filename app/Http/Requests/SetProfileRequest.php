<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric', 'exists:users,id'],
            'rolesId' => ['required', 'numeric', 'exists:roles,id'],
            'firstName' => ['required', 'string', 'max:50'],
            'middleName' => ['string', 'max:50'],
            'secondName' => ['required', 'string', 'max:50'],
            'dateBirthday' => ['required', 'date'],
        ];
    }
}
