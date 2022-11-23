<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'model_id' => 'required|exists:models,id',
            'photo' => ($this->method() === 'POST' ? 'required' : '') . 'mimes:jpeg,jpg,png',
            'year' => 'required|integer|min:1800|max:2030',
            'state_number' => 'required|string',
            'color' => 'required|string',
            'transmission' => ['required', Rule::in(['auto', 'manual'])],
            'rental_price_per_day' => 'required|numeric|min:0',
        ];
    }
}
