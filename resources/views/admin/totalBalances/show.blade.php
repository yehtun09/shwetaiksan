@extends('layouts.admin')
@section('content')

<div class="card">
    <h6 class="font-weight-bold card-header mb-5">
        {{trans('global.show')}} {{trans('cruds.total_balance.title')}}
    </h6>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{trans('cruds.total_balance.fields.id')}}
                        </th>
                        <td>{{$totalBalance->id}}</td>
                    </tr>
                    <tr>
                        <th>{{trans('cruds.total_balance.fields.user_id')}}</th>
                        <td>
                            {{$totalBalance->user_id}}
                        </td>
                    </tr>
                    <tr>
                        <th>{{trans('cruds.total_balance.fields.total_balance')}}</th>
                        <td>
                            {{$totalBalance->total_balance}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group mt-3">
                <a class="btn btn-secondary" href="{{route('admin.total_balances.index')}}">{{trans('global.back_to_list')}}</a>
            </div>
        </div>
    </div>
</div>

@endsection
