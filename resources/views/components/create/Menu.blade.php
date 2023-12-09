@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Buat Menu</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="Belum Pilih">--Belum Pilih--</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Makanan">Makanan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Masukan Gambar</label>
                        <input type="file" name="image" id="exampleInputFile">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control">
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
