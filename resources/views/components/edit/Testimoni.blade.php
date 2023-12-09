@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Testimoni</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('testimoni.update', $testimoni->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="nama" value="{{ $testimoni->nama }}">
                <input type="hidden" name="tgl_tanggapan" value="{{ date('Y-m-d') }}">
                <input type="hidden" name="tanggal" value="{{ $testimoni->tanggal }}">
                <div class="box-body">
                    <div class="form-group">
                        <label>Rating : </label>
                        <input type="hidden" name="penilaian" value="{{ $testimoni->penilaian }}">
                        @if ($testimoni->penilaian == 1)
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                        @elseif($testimoni->penilaian == 2)
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                        @elseif($testimoni->penilaian == 3)
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                        @elseif($testimoni->penilaian == 4)
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                        @elseif($testimoni->penilaian == 5)
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                            <i class="bi bi-star-fill" style="color:orangered"></i>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="hidden" name="id" value="{{ $testimoni->id }}" class="form-control">
                        <input type="text" name="nama_user" readonly value="{{ $testimoni->nama_user }}"
                            class="form-control">
                    </div>
                    <label>Testimoni Customer</label>
                    <input type="hidden" name="tgl_tanggapan" value="{{ date('Y-m-d') }}">
                    <textarea class="form-control" name="isi" readonly rows="5">{{ $testimoni->isi }}</textarea>
                    <label style="margin-top:15px;">Isi Tanggapan Admin</label>
                    <textarea class="form-control" name="tanggapan" rows="5">{{ $testimoni->tanggapan }}</textarea>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" required value="1" name="status1">Beritahu Notif ke Customer
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" value="2" name="status2">Publish<br>
                            <input type="radio" value="3" name="status2">UnPublish
                        </label>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit Publish</button>
                    <a href="{{ url('https://api.whatsapp.com/send/?phone=' . $testimoni->no_hp . '&text=Hi%20' . $testimoni->nama_user . '%0A%0ATanggapan%20kamu%20sudah%20dibalas%20oleh%20admin%2C%20untuk%20mengecek%20tanggapan%20silahkan%20pergi%20ke%20menu%20profile.%0ATerimakasih%20sudah%20mengunjungi%20Mie%20Ayam%20Djoedes%20Wadassari.%0A%0AAdmin.&type=custom_url&app_absent=0') }}" target="_blank" class="btn btn-success">WhatsApp</a>
                    <button type="submit" class="btn btn-default">Kembali</button>
                </div>
            </form>
        </div>
    </div><!-- /.box -->
@endsection
