<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'district_id' => 'required|exists:districts,id',
            'area' => 'required|numeric',
            'status' => 'required|string',
            'fire_date' => 'required|date',
        ];
    }
}
