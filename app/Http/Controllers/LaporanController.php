<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\Keluhan;
use App\Models\Testimoni;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $transaksi_attr = DB::table('transaksis')
            ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', 'transaksis_attrs.id_transaksi');

        $transaksi = DB::table('transaksis')
            ->select(DB::raw('SUM(COALESCE(harga_discount, harga)) as harga_discount'));

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $transaksi = $transaksi->whereBetween('transaksis.tanggal', [$start_date, $end_date]);
            $transaksi_attr = $transaksi_attr->whereBetween('transaksis.tanggal', [$start_date, $end_date]);
        }

        $transaksi_attr = $transaksi_attr->get();
        $transaksi = $transaksi->get();

        return view('components.Laporan', compact('start_date', 'end_date', 'transaksi_attr', 'transaksi'));

    }

    public function export(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
        }

        $transaksi = DB::table('transaksis')
            ->select(
                'transaksis_attrs.menu',
                'transaksis.tanggal',
                DB::raw('SUM(transaksis_attrs.qty) as qty1'),
                DB::raw('SUM(transaksis.harga) as total_harga'),
                DB::raw('SUM(COALESCE(transaksis.harga_discount, transaksis.harga)) as total_harga_setelah_diskon')
            )
            ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', '=', 'transaksis_attrs.id_transaksi')
            ->when($request->has('start_date') && $request->has('end_date'), function ($query) use ($start_date, $end_date) {
                return $query->whereBetween('transaksis.tanggal', [$start_date, $end_date]);
            })
            ->groupBy('transaksis_attrs.menu', 'transaksis.tanggal')
            ->get();

        $total_qty = $transaksi->sum('qty1');
        $total_harga = $transaksi->sum('total_harga');
        $total_harga_diskon = $transaksi->sum('total_harga_setelah_diskon');

        $export = new LaporanExport($transaksi);

        return Excel::download($export, 'laporan.csv');
    }

    public function exportPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $transaksi_attr = DB::table('transaksis')
            ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', 'transaksis_attrs.id_transaksi');

        $transaksi = DB::table('transaksis')
            ->select(DB::raw('SUM(COALESCE(harga_discount, harga)) as total_harga'));

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $transaksi = $transaksi->whereBetween('transaksis.tanggal', [$start_date, $end_date]);
            $transaksi_attr = $transaksi_attr->whereBetween('transaksis.tanggal', [$start_date, $end_date]);
        }

        $transaksi_attr = $transaksi_attr->get();
        $transaksi = $transaksi->get();

        $pdf = PDF::loadView('components.PDF', compact('transaksi_attr', 'transaksi', 'start_date', 'end_date'));
        return $pdf->download('laporan.pdf');
    }
    public function exportPDFTestimoni(Request $request)
    {
        $testimoni = Testimoni::query();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $testimoni = $testimoni->whereBetween('testimonis.tanggal', [$start_date, $end_date]);
        }

        $testimoni = $testimoni->get();

        $pdf = PDF::loadView('components.PDFTestimoni', compact('testimoni', 'start_date', 'end_date'));
        return $pdf->download('laporan.pdf');

    }

    public function exportPDFKeluhan(Request $request)
    {
        $keluhan = Keluhan::query();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $keluhan = $keluhan->whereBetween('keluhans.tanggal', [$start_date, $end_date]);
        }

        $keluhan = $keluhan->get();

        $pdf = PDF::loadView('components.PDFKeluhan', compact('keluhan', 'start_date', 'end_date'));
        return $pdf->download('laporan.pdf');
    }

    public function exportPDFCustomer(Request $request)
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


        $pdf = PDF::loadView('components.PDFCustomer', compact('customer', 'start_date', 'end_date'));

        return $pdf->download('laporan.pdf');
    }
}