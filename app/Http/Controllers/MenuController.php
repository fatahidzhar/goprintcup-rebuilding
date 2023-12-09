<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();

        return view('components.Menu', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.create.Menu');
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
            'nama' => ['required'],
            'kategori' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
            $image_path = '/images/' . $input['image'];
        } else {
            $image_path = '/images/default.jpg';
        }

        $uuid = (string) Str::uuid();

        $menu = new Menu();
        $menu->id_menu = $uuid;
        $menu->kategori = $request->kategori;
        $menu->nama = $request->nama;
        $menu->image = $image_path;
        $menu->harga = $request->harga;
        $menu->save();

        return redirect('admin/menu')->with('success', 'Berhasil menambahkan Menu ' . $request->nama);
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
    public function edit($id_menu)
    {
        $menu = Menu::where('id_menu', $id_menu)->first();

        return view('components.edit.Menu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_menu)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
            $image_path = '/images/' . $input['image'];
        } else {
            $image_path = '/images/default.jpg';
        }

        $menu = DB::table('menus')->where('id_menu', $id_menu)->first();

        if ($menu->image && !$request->hasFile('image')) {
            $image_path = $menu->image;
        }
        DB::table('menus')->where('id_menu', $request->id_menu)
            ->update([
                'kategori' => $request->kategori,
                'nama' => $request->nama,
                'image' => $image_path,
                'harga' => $request->harga,
            ]);

        return redirect('admin/menu')
            ->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('admin/menu')
            ->with('success', 'Menu deleted successfully');
    }
}
