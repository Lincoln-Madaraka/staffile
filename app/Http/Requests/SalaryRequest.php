<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:6|max:255',
            'description' => 'required|min:6|max:500',
            'due_date' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'category_id' => 'required|exists:categories,id',
            'assigned_to_user_id' => 'nullable|exists:users,id',
        ];
    }
}
