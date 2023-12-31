<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'string', 'max:20'],
            'datetime' => ['required', 'date_format:"Y/m/d H:i:s"'],
            'check_flg' => ['in:1', 'nullable'],
            'content' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
