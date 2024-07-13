<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
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
            'package_id' => ['required', 'integer', 'exists:packages,id'],
            'travel_date' => ['required', 'date', 'after_or_equal:today', 'before_or_equal:+1 year'],
            'quantity' => ['required', 'integer', 'max:50', 'min:1'],
            'phone' => ['required', 'string', 'max:15', 'min:10'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}
