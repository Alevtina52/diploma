<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyContestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // заявки могут отправлять гости
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:20',
            'comment'   => 'nullable|string',
            'work_file' => 'required|mimes:pdf,doc,docx,jpg,png|max:5120'
        ];
    }
}
