<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && check_role((int)Auth::id());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:4', 'max:15'],
            'description' => ['min:30', 'max:300'],
            'short_description' => ['required', 'min:20', 'max:200'],
            'sku' => ['required', 'min:3', 'max:20'],
            'category' => ['required', 'min:3', 'max:20'],
            'price' => ['required', 'min:1', 'max:9'],
            'discount' => ['required', 'min:1', 'max:3'],
            'count' => ['required', 'min:1', 'max:9'],
            'thumbnail' => ['required', 'image:jpg,jpeg,bmp,png'],
            'images.*' => ['image:jpeg,png'],
        ];
    }
}
