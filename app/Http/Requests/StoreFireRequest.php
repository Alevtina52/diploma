<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // позже можно добавить проверку ролей
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
