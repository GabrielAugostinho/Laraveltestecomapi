<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
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
            //regras de validação
            $rules = 'name' => 'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:6',
                'max:15'
            ]
        ];

        if ($this->method() === 'PATCH') {
// Verifica se o método HTTP é PATCH e modifica as regras conforme necessário
            $rules['email'] = [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->id),
                //ignora o id atual
                // "unique:users, email.{$this->id}, id"
            ];

            $rules['password'] = [
                'nullable',
                'min:6',
                'max:15'
            ];
        }
        return $rules;
    }
}
