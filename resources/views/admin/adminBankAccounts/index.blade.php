@extends('layouts.admin')
@section('content')
    <div class="card">

        <div class="custom-header">
            <h5 class="font-weight-bold">
                {{ trans('cruds.admin_bank_account.title_singular') }} {{ trans('global.list') }}
            </h5>
            <div>
                {{-- <a href="{{ route('admin.admin_bank_accounts.create') }}" class="btn btn-success">{{ trans('global.add') }}
                    {{ trans('cruds.admin_bank_account.title_singular') }}</a> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-BankAccount">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('global.no') }}
                            </th>
                            <th>
                                {{ trans('cruds.admin_bank_account.fields.bank_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.admin_bank_account.fields.account_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.admin_bank_account.fields.account_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.admin_bank_account.fields.y_tube_link') }}
                            </th>
                            <th>
                                {{ trans('global.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bankAccounts as $key => $adminBankAccount)
                            <tr data-entry-id="{{ $adminBankAccount->id }}">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $adminBankAccount->bank_type ?? '' }}
                                </td>
                                <td>
                                    {{ $adminBankAccount->account_no ?? '' }}
                                </td>
                                <td>
                                    {{ $adminBankAccount->account_name ?? '' }}
                                </td>
                                <td>
                                    {{ $adminBankAccount->y_tube_link ?? '' }}
                                </td>
                                <td>
                                    @can('admin_bank_account_show')
                                        <a class="p-0 glow btn btn-primary text-white"
                                            style="width:60px;display:inline-block;line-height:36px;color:gray" title="view"
                                            href="{{ route('admin.admin_bank_accounts.show', $adminBankAccount->id) }}">Show</a>
                                    @endcan

                                    @can('admin_bank_account_edit')
                                        <a class="p-0 glow btn btn-success text-white"
                                            style="width:60px;display:inline-block;line-height:36px;color:gray" title="edit"
                                            href="{{ route('admin.admin_bank_accounts.edit', $adminBankAccount->id) }}">Edit</a>
                                    @endcan

                                    {{-- @can('admin_bank_account_delete')

                                    <form id="orderDelete-{{ $adminBankAccount->id }}"
                                        action="{{ route('admin.admin_bank_accounts.destroy', $adminBankAccount->id) }}" method="POST"
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

                                    @endcan --}}
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
            let table = $('.datatable-BankAccount:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection