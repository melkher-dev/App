<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreResultRequest extends FormRequest
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
            'country_id' => 'required|integer|exists:App\Models\Country,id',
            'weapon_id' => 'required|integer|exists:App\Models\Weapon,id',
            'amount' => 'required|integer',
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'country_id' => 'Please select a country',
            'weapon_id' => 'Please select a weapon',
            'amount.required' => 'Please enter an amount.',
        ];
    }
}
