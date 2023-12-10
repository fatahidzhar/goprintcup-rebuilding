@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')
    <div class="container-fluid p-5" style="height: 100%;">
        <div>
            <h2 class="text-center text-white p-4" style="background-color :blue;">Masukkan Testimoni</h2>

            <br>
            @guest
                <div class="quote_btn-container" style="display:flex;justify-content: center;align-items: center; padding-bottom:30px;">
                    @if (Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </div>
            @else
                <form action="{{ route('testiomoni.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    <input type="hidden" name="nama_user" value="{{ Auth::user()->name }}">
                    <div class="row mb-3">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label fw-bolder">Tanggal Testimoni</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly name="tanggal" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bolder">Isi Tesimoni</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="isi" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bolder">Beri Nilai</label>
                        <div class="col-sm-10">
                            <input type="radio" name="penilaian" value="1">
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <br>

                            <input type="radio" name="penilaian" value="2">
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <br>

                            <input type="radio" name="penilaian" value="3">
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <br>

                            <input type="radio" name="penilaian" value="4">
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <br>
                            <input type="radio" name="penilaian" value="5">
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-5" style="display: flex;justify-content: flex-end;">
                            <button type="submit" name="tambah" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endguest
    @include('layouts.Footer')
@endsection
