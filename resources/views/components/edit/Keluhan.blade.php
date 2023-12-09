@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Keluhan</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('keluhan.update', $keluhan->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="tgl_tanggapan" value="{{ date('Y-m-d') }}">
                <input type="hidden" name="tanggal" value="{{ $keluhan->tanggal }}">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="hidden" name="id" value="{{ $keluhan->id }}" class="form-control">
                        <input type="text" name="nama" readonly value="{{ $keluhan->nama }}" class="form-control">
                    </div>
                    <label>Keluhan Customer</label>
                    <textarea class="form-control" name="isi" readonly rows="5">{{ $keluhan->isi }}</textarea>
                    <label style="margin-top: 15px">Isi Tanggapan Admin</label>
                    <textarea class="form-control" name="tanggapan" rows="5">{{ $keluhan->tanggapan }}</textarea>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" required value="1" name="status"> Check me out
                        </label>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                <a href="{{ url('https://api.whatsapp.com/send/?phone=' . $keluhan->no_hp . '&text=Hi%20' . $keluhan->nama . '%0A%0ATanggapan%20kamu%20sudah%20dibalas%20oleh%20admin%2C%20untuk%20mengecek%20tanggapan%20silahkan%20pergi%20ke%20menu%20profile.%0ATerimakasih%20sudah%20mengunjungi%20Mie%20Ayam%20Djoedes%20Wadassari.%0A%0AAdmin.&type=custom_url&app_absent=0') }}" target="_blank" class="btn btn-success">WhatsApp</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div><!-- /.box -->
@endsection
