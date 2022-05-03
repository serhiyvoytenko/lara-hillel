<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'min:3', 'max:40'],
            'surname' => ['required', 'string', 'min:3', 'max:40'],
            'phone' => ['required', 'string', 'min:10', 'max:13'],
            'email' => ['required', 'email', 'min:5', 'max:100'],
            'country' => ['required', 'string', 'min:3', 'max:100'],
            'city' => ['required', 'string', 'min:3', 'max:100'],
            'address' => ['required', 'string', 'min:3', 'max:100'],
//            'total' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        ];
    }

    public function all($keys = null)
    {
        if (empty($keys)) {
            return parent::json()?->all();
        }

        return collect(parent::json()?->all())->only($keys)->toArray();
    }
}
