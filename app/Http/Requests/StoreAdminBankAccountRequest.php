<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreAdminBankAccountRequest extends FormRequest
{    public function authorize()
    {
        return Gate::allows('admin_bank_account_create');
    }
    public function rules()
    {
        return [
            "bank_type" => "required"
        ];
    }
}
