<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cart = DB::table('carts')
            ->select('carts.harga as harga_total', 'nama_product', 'menus.image', 'menus.harga', 'carts.id', 'carts.id_menu', 'carts.qty')
            ->leftJoin('menus', 'menus.id_menu', 'carts.id_menu')
            ->where('id_users', Auth::user()->id)
            ->get();

        $total_harga = DB::table('carts')
            ->where('id_users', Auth::user()->id)
            ->sum('harga');

        return view('cart', compact('cart', 'total_harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $cart = new Cart();
        // $cart->id = $request->id;
        // $cart->id_users = $request->id_users;
        // $cart->id_menu = $request->id_menu;
        // $cart->nama_product = $request->nama_product;
        // $cart->harga = $request->harga;
        // $cart->save();

        $q = $request->id_menu;

        Cart::updateOrCreate(
            ['id_menu' => $q], // Field untuk mencocokkan record yang sudah ada
            [
                'id_users' => $request->id_users,
                'nama_product' => $request->nama_product,
                'qty' => $request->qty,
                'harga' => $request->qty * $request->harga,
            ]   // Field yang ingin diubah pada record yang sudah ada atau pada record baru
        )->wasRecentlyCreated;

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
