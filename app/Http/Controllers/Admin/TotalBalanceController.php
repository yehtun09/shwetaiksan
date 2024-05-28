<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTotalBalanceRequest;
use App\Http\Requests\StoreTotalBalanceRequest;
use App\Http\Requests\UpdateTotalBalanceRequest;
use App\Models\TotalBalance;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TotalBalanceController extends Controller
{
    protected $totalBalances;
    protected $users;

    public function __construct(TotalBalance $totalBalance, User $user)
    {
        $this->totalBalances = $totalBalance;
        $this->users = $user;
    }

    public function index()
    {
        abort_if(Gate::denies("total_balance_access"), Response::HTTP_FORBIDDEN, "403 Forbidden");

        $totalBalances = $this->totalBalances->all();
        return view('admin.totalBalances.index', compact('totalBalances'));
    }

    public function create()
    {
        abort_if(Gate::denies("total_balance_create"), Response::HTTP_FORBIDDEN, "403 Forbidden");

        $users = $this->users->pluck('name', 'id');
        return view('admin.totalBalances.create', compact('users'));
    }

    public function store(StoreTotalBalanceRequest $request)
    {
        abort_if(Gate::denies("total_balance_create"), Response::HTTP_FORBIDDEN, "403 Forbidden");

        $totalBalance = $this->totalBalances->create($request->all());
        return redirect()->route('admin.total_balances.index')->with('message', 'Total Balance Created Successfully!');
    }

    public function show($id)
    {
        abort_if(Gate::denies("total_balance_show"), Response::HTTP_FORBIDDEN, "403 Forbidden");

        // $totalBalance = $this->totalBalances->with('user')->findOrFail($id);
        $totalBalance = $this->totalBalances->findOrFail($id);

        return view('admin.totalBalances.show', compact('totalBalance'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies("total_balance_edit"), Response::HTTP_FORBIDDEN, "403 Forbidden");

        $totalBalance = $this->totalBalances->findOrFail($id);
        $users = $this->users->pluck('name', 'id');

        return view('admin.totalBalances.edit', compact(['totalBalance', 'users']));
    }

    public function update(UpdateTotalBalanceRequest $request, $id)
    {
        abort_if(Gate::denies("total_balance_edit"), Response::HTTP_FORBIDDEN, "403 Forbidden");

        $totalBalance = $this->totalBalances->findOrFail($id);
        $totalBalance->update($request->all());

        return redirect()->route('admin.total_balances.index')->with('message', 'Total Balance Updated Successfully!');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies("total_balance_delete"), Response::HTTP_FORBIDDEN, "403 Forbidden");

        $totalBalance = $this->totalBalances->findOrFail($id);
        $totalBalance->delete();

        return redirect()->route('admin.total_balances.index')->with('message', 'Total Balance Deleted Successfully!');
    }

}
