<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'car_id' => 'required|exists:cars,id',
            'date_from' => 'required|date',
            'date_to' => 'required|date'
        ];
    }
}
