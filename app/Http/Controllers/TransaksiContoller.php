<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\Transaksis_attr;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransaksiContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today('Asia/Jakarta');
        
        $transaksi_attr = DB::table('transaksis')
        ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', 'transaksis_attrs.id_transaksi')
        ->where('tanggal', $today)
        ->orderBy('transaksis.created_at', 'desc')
        ->get();

        return view('components.Transaksi', compact('transaksi_attr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        return view('components.create.Transaksi', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nis' => ['required', 'string', 'max:255', 'unique:siswas'],
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // ]);

        $uuid = (string) Str::uuid();

        DB::transaction(function () use ($request, $uuid) {

            $transaksi = new Transaksi();
            $transaksi->id_transaksi = $uuid;
            $transaksi->no_hp = $request->no_hp;
            $transaksi->tanggal = $request->tanggal;
            $transaksi->users_id = $request->users_id;
            $transaksi->nama = $request->nama;
            $transaksi->alamat = $request->alamat;
            $transaksi->harga = $request->harga;
            $transaksi->harga_discount = $request->harga_discount;
            $transaksi->discount = $request->discount;
            $transaksi->save();

            $customer = User::where('no_hp', $request->no_hp)->first();
            $discount = User::find($request->users_id);

            if($customer) {
                $customer->kunjungan += 1;
                $customer->save();
            }

            if ($discount) {
                $discount->point -= $request->discount;
                if ($discount->point < 0) {
                    $discount->point = 0; // Prevent negative points
                }
                $discount->save();
            }

            foreach ($request->transaksi_attr as $index => $input) {
                if ($input['qty'] == 0) {
                    continue;
                }
                $transaksi_attr = new Transaksis_attr();
                $transaksi_attr->id_transaksi = $uuid;
                $transaksi_attr->menu = $input['menu'];
                $transaksi_attr->qty = $input['qty'];
                // Cek apakah qty lebih dari 1
                if ($input['qty'] > 1) {
                    $transaksi_attr->harga_attr = $input['harga_attr'] * $input['qty'];
                } else {
                    $transaksi_attr->harga_attr = $input['harga_attr'];
                }
                $transaksi_attr->save();
            }
        });

        return redirect('admin/transaksi')->with('success', 'Berhasil Memesan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
