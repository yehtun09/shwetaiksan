@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.admin_bank_account.title_singular') }}
    </div>
   
    <div class="card-body">
        <form method="POST" action="{{ route('admin.admin_bank_accounts.store') }}" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="required" for="bank_type">{{ trans('cruds.admin_bank_account.fields.bank_type') }}</label>
                        <input class="form-control {{ $errors->has('bank_type') ? 'is-invalid' : '' }}" type="text" name="bank_type" id="bank_type" value="{{ old('bank_type') }}" >
                        @if ($errors->has('bank_type'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bank_type') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="account_no">{{ trans('cruds.admin_bank_account.fields.account_no') }}</label>
                        <input class="form-control {{ $errors->has('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" id="account_no" value="{{ old('account_no') }}">
                        @if ($errors->has('account_no'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('account_no') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="account_name">{{ trans('cruds.admin_bank_account.fields.account_name') }}</label>
                        <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name') }}">
                        @if ($errors->has('account_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('account_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="y_tube_link">{{ trans('cruds.admin_bank_account.fields.y_tube_link') }}</label>
                        <input class="form-control {{ $errors->has('y_tube_link') ? 'is-invalid' : '' }}" type="text" name="y_tube_link" id="y_tube_link" value="{{ old('y_tube_link') }}">
                        @if ($errors->has('y_tube_link'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('y_tube_link') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
                    <div class="form-group mt-2">
                        <button class="btn btn-success" type="submit" id="save">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                    <div class="form-group mt-2 ms-2">
                        <a onclick="history.back()" class="btn btn-secondary text-white">{{ trans('global.cancel') }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
