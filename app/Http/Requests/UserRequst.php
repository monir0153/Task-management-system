<?php

namespace App\Http\Requests;

use App\Constants\Role;
use Illuminate\Foundation\Http\FormRequest;

class UserRequst extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'required|string|regex:/^(\+\d{1,3}[-.\s]?)?\(?\d{1,4}\)?[-.\s]?\d{1,10}$/',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' =>  ['required', 'string', 'in:' . implode(',', [Role::ADMIN, Role::USER])],
        ];
    }
}
