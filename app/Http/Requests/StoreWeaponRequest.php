<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreWeaponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'weapon' => 'required|alpha|max:100',
        ];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function messages()
    {
        return [
            'weapon.required' => 'Please enter a weapon name',
        ];
    }
}
