<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\Testimoni;
use App\Models\Transaksi;
use App\Models\Transaksis_attr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $keluhan = DB::table('keluhans')
            ->select('users.*', 'keluhans.*')
            ->leftJoin('users', 'users.name', '=', 'keluhans.nama')
            ->where('users.name', '=', Auth::user()->name)
            // ->where('keluhans.status', '=', '1')
            ->get();

        $testimoni = DB::table('testimonis')
            ->select('users.*', 'testimonis.*')
            ->leftJoin('users', 'users.name', '=', 'testimonis.nama_user')
            ->where('users.name', '=', Auth::user()->name)
            // ->where('testimonis.status1', '=', '1')
            ->get();

        $transaksi = DB::table('transaksis')
            ->where('users_id', '=', Auth::user()->id)
            ->get();


        return view('home', compact('keluhan', 'testimoni', 'transaksi'));
    }
    public function handleAdmin()
    {
        $today = Carbon::today('Asia/Jakarta');

        $transaksi = Transaksi::where('tanggal', $today)->count();
        $testimoni = Testimoni::all()->count();
        $testimonial = Testimoni::all();
        $keluhans = Keluhan::all();
        $keluhan = Keluhan::all()->count();
        $transaksi_attr = Transaksis_attr::paginate(15);

        $dataProduk = DB::table('transaksis')->select('harga', 'harga_discount')->where('tanggal', $today)->get();

        $totalHarga = 0;
        $totalHargaDiscount = 0;

        foreach ($dataProduk as $produk) {
            if ($produk->harga_discount != null) {
                $hargaProduk = $produk->harga_discount;
            } else {
                $hargaProduk = $produk->harga;
            }

            $totalHarga += $hargaProduk;
            if ($produk->harga_discount != null) {
                $totalHargaDiscount += $produk->harga_discount;
            } else {
                $totalHargaDiscount += $produk->harga;
            }
        }

        if ($totalHargaDiscount != 0) {
            $totalHarga = $totalHargaDiscount;
        }

        return view('handleAdmin', compact('transaksi', 'totalHarga', 'testimoni', 'keluhan', 'testimonial', 'keluhans'));
    }
}
