@extends('layouts.admin')
@section('content')

<div class="card">
    <h6 class="font-weight-bold card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.admin_bank_account.title_singular') }}
    </h6>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.admin_bank_account.fields.id') }}
                        </th>
                        <td>{{ $adminBankAccount->id }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.admin_bank_account.fields.bank_type') }}</th>
                        <td>
                            {{ $adminBankAccount->bank_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.admin_bank_account.fields.account_no') }}</th>
                        <td>
                            {{ $adminBankAccount->account_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.admin_bank_account.fields.account_name') }}</th>
                        <td>
                            {{ $adminBankAccount->account_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.admin_bank_account.fields.y_tube_link') }}</th>
                        <td>
                            {{ $adminBankAccount->y_tube_link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group mt-3">
                <a class="btn btn-secondary" href="{{ route('admin.admin_bank_accounts.index') }}">{{ trans('global.back_to_list') }}</a>
            </div>
        </div>
    </div>
</div>

@endsection
