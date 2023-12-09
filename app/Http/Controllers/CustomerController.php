<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $customer = DB::table('users')
        ->select('users.name', 'users.alamat', 'users.no_hp', DB::raw('COUNT(transaksis.nama) as kunjungan'), 'users.point', 'users.id')
        ->leftJoin('transaksis', 'users.name', 'transaksis.nama')
        ->where('is_admin', 0)
        ->groupBy('users.name', 'users.alamat', 'users.no_hp', 'users.point', 'users.id');

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $customer = $customer->whereBetween('transaksis.tanggal', [$start_date, $end_date]);
        }

        $customer = $customer->get();

        return view('components.Customer', compact('customer', 'start_date', 'end_date'));
    }

    public function show($id)
    {
        $customer_find = User::where('id', $id)->first();

        $customer = DB::table('users')
        ->select('users.name', 'users.no_hp', 'transaksis_attrs.menu', DB::raw('SUM(transaksis_attrs.qty) as qty'))
        ->leftJoin('transaksis', 'users.no_hp', '=', 'transaksis.no_hp')
        ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', '=', 'transaksis_attrs.id_transaksi')
        ->where('users.id', '=', $id)
        ->groupBy('users.name', 'users.no_hp', 'transaksis_attrs.menu')
        ->get();

        return view('components.show.Customer', compact('customer', 'customer_find'));
    }
}
