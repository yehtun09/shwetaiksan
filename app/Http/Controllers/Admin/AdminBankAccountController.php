<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminBankAccountRequest;
use App\Http\Requests\UpdateAdminBankAccountRequest;
use App\Models\AdminBankAccount;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class AdminBankAccountController extends Controller
{
    protected $bankAccounts;

    public function __construct(AdminBankAccount $bankAccount)
    {
        $this->bankAccounts = $bankAccount;
    }

    public function index()
    {
        abort_if(Gate::denies('admin_bank_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAccounts = $this->bankAccounts->all();

        return view('admin.adminBankAccounts.index', compact('bankAccounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin_bank_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adminBankAccounts.create');
    }

    public function store(StoreAdminBankAccountRequest $request)
    {
        abort_if(Gate::denies('admin_bank_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->bankAccounts->create($request->all());

        return redirect()->route('admin.admin_bank_accounts.index')->with('message', 'Admin Bank Account created successfully!');
    }

    public function show($id)
    {
        abort_if(Gate::denies('admin_bank_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adminBankAccount = $this->bankAccounts->findOrFail($id);

        return view('admin.adminBankAccounts.show', compact('adminBankAccount'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('admin_bank_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adminBankAccount = $this->bankAccounts->findOrFail($id);

        return view('admin.adminBankAccounts.edit', compact('adminBankAccount'));
    }

    public function update(UpdateAdminBankAccountRequest $request, $id)
    {
        abort_if(Gate::denies('admin_bank_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAccount = $this->bankAccounts->findOrFail($id);
        $bankAccount->update($request->all());

        return redirect()->route('admin.admin_bank_accounts.index')->with('message', 'Admin Bank Account updated successfully!');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('admin_bank_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAccount = $this->bankAccounts->findOrFail($id);
        $bankAccount->delete();

        return redirect()->route('admin.admin_bank_accounts.index')->with('message', 'Admin Bank Account deleted successfully!');
    }
}

