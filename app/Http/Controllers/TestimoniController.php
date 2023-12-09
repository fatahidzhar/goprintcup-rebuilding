<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        return view('components.Testimonial', compact('testimoni', 'start_date', 'end_date'));
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
        $request->validate([
            'isi' => 'required',
            'penilaian' => 'required',
        ]);

        $testimoni = new Testimoni();
        $testimoni->nama_user = $request->nama_user;
        $testimoni->isi = $request->isi;
        $testimoni->penilaian = $request->penilaian;
        $testimoni->tanggal = date('Y-m-d');
        $testimoni->save();

        $customer = User::where('name', $request->nama_user)->first();

        // Buat Nambah Point =+ Tambah Point
        if($customer) {
            $customer->point += 5; 
            $customer->save();
        }

        return redirect('testimoni')->with('succes', 'Data Testimoni Berhasil di Input');
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
        $testimoni = Testimoni::where('id', $id)->first();

        return view('components.edit.Testimoni', compact('testimoni'));
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
        DB::table('testimonis')->where('id', $request->id)
            ->update([
                'nama_user' => $request->nama_user,
                'isi' => $request->isi,
                'penilaian' => $request->penilaian,
                'tanggal' => $request->tanggal,
                'tanggapan' => $request->tanggapan,
                'tgl_tanggapan' => $request->tgl_tanggapan,
                'status1' => $request->status1,
                'status2' => $request->status2,
            ]);

        return redirect('admin/testimoni')
            ->with('success', 'Keluhan updated successfully');
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
