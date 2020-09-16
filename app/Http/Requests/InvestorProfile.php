<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class InvestorProfile extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();
        return [
            'account_number' => ['required', Rule::unique('banks', 'account_number')
                ->ignore($this->user()->id, 'user_id')],
        ];
    }

    public function messages()
    {
        return [
            'account_number.unique' => 'The account number has already been taken by another investor.',
        ];
    }
}
