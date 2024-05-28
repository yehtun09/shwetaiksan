@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{trans('global.edit')}} {{trans('cruds.total_balance.title_singular')}}
    </div>
   
    <div class="card-body">
        <form method="POST" action="{{ route('admin.total_balances.update', $totalBalance->id) }}" enctype="multipart/form-data" id="myForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="required" for="user_id">{{trans('cruds.total_balance.fields.user_id')}}</label>
                        <input class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}" type="number" name="user_id" id="user_id" value="{{ old('user_id', $totalBalance->user_id) }}">
                        <span class="user_id_error"></span>
                        @if ($errors->has('user_id'))
                            <div class="invalid-feedback">{{ $errors->first('user_id')}}</div>
                        @endif
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label class="required" for="total_balance">{{trans('cruds.total_balance.fields.total_balance')}}</label>
                        <input class="form-control {{$errors->has('total_balance') ? 'is-invalid' : ''}}" type="number" name="total_balance" id="total_balance" value="{{ old('total_balance', $totalBalance->total_balance) }}">
                        <span class="total_balance_error"></span>
                        @if ($errors->has('total_balance'))
                            <div class="invalid-feedback">{{ $errors->first('total_balance')}}</div>
                        @endif
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
                    <div class="form-group mt-2">
                        <button class="btn btn-success" type="submit" id="save">
                            {{trans('global.save')}}
                        </button>
                    </div>
                    <div class="form-group mt-2 ms-2">
                        <a onclick="history.back()" class="btn btn-secondary text-white">{{trans('global.cancel')}}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
