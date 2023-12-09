<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class UsersContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($no_hp)
    {
        $user = User::where('no_hp', $no_hp)->first();
        
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Data pengguna tidak ditemukan.']);
        }

        // $user = User::where('no_hp', $no_hp)->first();
        // $transaksicount = Transaksi::where('no_hp',  $no_hp)->count();
        
        // if ($user) {
        //     $response = [
        //         'user' => $user,
        //         'transaksicount' => $transaksicount,
        //     ];

        //     return response()->json($response);

        //     // dd($response);
        // } else {
        //     return response()->json(['error' => 'Data pengguna tidak ditemukan.']);
        // }
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
