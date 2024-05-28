@extends('layouts.admin')
@section('content')
    <div class="card">

        <div class="custom-header">
            <h5 class="font-weight-bold">
                {{ trans('cruds.total_balance.title_singular') }} {{ trans('global.list') }}
            </h5>
            <div>
                <a href="{{ route('admin.total_balances.create') }}" class="btn btn-success">{{ trans('global.add') }}
                    {{ trans('cruds.total_balance.title_singular') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-totalBalance">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('global.no') }}
                            </th>
                            <th>
                                {{ trans('cruds.total_balance.fields.user_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.total_balance.fields.total_balance') }}
                            </th>
                            <th>
                                {{ trans('global.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($totalBalances as $key => $totalBalance)
                            <tr data-entry-id="{{ $totalBalance->id }}">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $totalBalance->user_id ?? '' }}
                                </td>
                                <td>
                                    {{ $totalBalance->total_balance ?? '' }}
                                </td>
                                <td>
                                    @can('total_balance_show')
                                        <a class="p-0 glow btn btn-primary text-white"
                                            style="width:60px;display:inline-block;line-height:36px;color:gray" title="view"
                                            href="{{ route('admin.total_balances.show', $totalBalance->id) }}">Show</a>
                                    @endcan

                                    @can('total_balance_edit')
                                        <a class="p-0 glow btn btn-primary text-white"
                                            style="width:60px;display:inline-block;line-height:36px;color:gray" title="edit"
                                            href="{{ route('admin.total_balances.edit', $totalBalance->id) }}">Edit</a>
                                    @endcan

                                    @can('total_balance_delete')

                                    <form id="orderDelete-{{ $totalBalance->id }}"
                                        action="{{ route('admin.total_balances.destroy', $totalBalance->id) }}" method="POST"
                                        onsubmit=""
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden"
                                            style="width: 60px;display: inline-block;line-height: 36px;"
                                            class=" p-0 glow" value="{{ trans('global.delete') }}">
                                        <button
                                            style="width: 60px;display: inline-block;line-height: 36px;border:none;"
                                            class=" p-0 glow btn btn-danger text-white" title="delete"
                                            onclick="return confirm('{{ trans('global.areYouSure') }}');">
                                            Delete
                                        </button>
                                    </form>

                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('total_balance_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.users.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    //[1, 'desc']
                ],
                pageLength: 100,
                bPaginate:true,
                info:false,
            });
            let table = $('.datatable-totalBalance:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
