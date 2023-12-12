@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Buat Product</h3>
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
                            <option value="CUP DATAR">CUP DATAR</option>
                            <option value="CUP OVAL">CUP OVAL</option>
                            <option value="PAPER CUP">PAPER CUP</option>
                            <option value="TUTUP">TUTUP</option>
                            <option value="TUTUP PAPER">TUTUP PAPER</option>
                            <option value="1221 WF">1221 WF</option>
                            <option value="1218 WF">1218 WF</option>
                            <option value="620 WFHTM">620 WFHTM</option>
                            <option value="524 WP">524 WP</option>
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
