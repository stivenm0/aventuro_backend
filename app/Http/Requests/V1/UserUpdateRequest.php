<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
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
        if($this->method() === 'PUT'){
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 
                            'unique:users,email,'.Auth::user()->id  ],
                'phone' => ['nullable', 'string', 'max:20', 'min:10'],
                'address' => ['nullable', 'string', 'max:255'],
            ];
        }else{
            return [
                'name' => ['sometimes', 'string', 'max:255'],
                'email' => ['sometimes', 'string', 'lowercase', 'email', 'max:255', 
                            'unique:users,email,'.Auth::user()->id  ],
                'phone' => ['sometimes', 'string', 'max:20', 'min:10'],
                'address' => ['sometimes', 'string', 'max:255'],
            ];
        }
    }
}
