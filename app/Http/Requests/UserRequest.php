<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    

    public function rules(): array
    {
        $userId = $this->route('user') ? $this->route('user')->id : null;

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . ($userId ? $userId->id : null),
            'password' => 'required|min:5',
        ];
    }

    public function messages() : array {
        return [
            'name.required' => "Campo 'nome' é obrigatório!",
            'email.required' => "Campo 'email' é obrigatório!",
            'email.email' => 'Email deve ser válido!',
            'email.unique' => 'Email já existente!',
            'password.required' => 'Senha é obrigatória!',
            'password.min' => 'Senha deve conter no mínimo 5 letras.'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422));
    }

}
