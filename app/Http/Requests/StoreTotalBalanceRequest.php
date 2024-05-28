<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTotalBalanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('total_balance_create');
    }
    public function rules()
    {
        return [
            "user_id" => "required",
            'total_balance' => "required",
        ];
    }
}
