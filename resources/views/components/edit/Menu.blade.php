@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Menu</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('menu.update', $menu->id_menu) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="hidden" name="id_menu" value="{{ $menu->id_menu }}" class="form-control">
                        <input type="text" name="nama" value="{{ $menu->nama }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option selected value="{{ $menu->kategori }}">--{{ $menu->kategori }}--</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Masukan Gambar</label>
                        <input type="file" name="image" id="exampleInputFile">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" value="{{ $menu->harga }}" class="form-control">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Check me out
                        </label>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
@endsection
 