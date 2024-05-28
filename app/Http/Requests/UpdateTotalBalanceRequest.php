<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateTotalBalanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('total_balance_edit');
    }

    public function rules()
    {
        return [
            "user_id" => "required",
            'total_balance' => "required",
        ];
    }
}
