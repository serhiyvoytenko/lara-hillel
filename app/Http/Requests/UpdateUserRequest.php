<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
//    dd($this->route()->parameter('user')->id);
        $userId = $this->route()?->parameter('user')->id;

        return [
            'name' => ['min:4', 'max:20'],
            'surname' => ['min:4', 'max:30'],
            'birthdate' => ['date', 'min:4', 'max:30'],
            'phone' => ['min:6', 'max:13'],
            'email' => ['email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'balance' => ['required', 'numeric'],
        ];
    }
}
