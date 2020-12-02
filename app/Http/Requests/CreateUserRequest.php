<?php

namespace App\Http\Requests;

use App\Dto\CreateUserDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:6', 'max:12'],
            'email' => ['required', 'string', 'email', Rule::unique('users')],
            'password' => ['required', 'string', 'min:6', 'max:12'],
        ];
    }

    public function toDto(): CreateUserDto
    {
        return new CreateUserDto(
            $this->get('name'),
            $this->get('email'),
            $this->get('password')
        );
    }
}
