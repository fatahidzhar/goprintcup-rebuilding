<?php

namespace App\Exports;

use App\Models\Laporan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaksi::select(
            'transaksis_attrs.menu',
            'transaksis.tanggal',
            DB::raw('SUM(transaksis_attrs.qty) as qty1'),
            DB::raw('SUM(transaksis.harga) as total_harga'),
            DB::raw('SUM(COALESCE(transaksis.harga_discount, transaksis.harga)) as total_harga_setelah_diskon')
        )
            ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', '=', 'transaksis_attrs.id_transaksi')
            ->groupBy('transaksis_attrs.menu', 'transaksis.tanggal')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Menu',
            'Tanggal',
            'Qty',
            'Total Harga',
            'Total Harga Setelah Diskon',
        ];
    }
}
