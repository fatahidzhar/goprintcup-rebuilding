@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')
    <div class="container-fluid p-5">
        <div>
            <h2 class="text-center text-white p-4" style="background-color :orangered;">Masukkan Keluhan</h2>
            <br>
            @guest
                <div class="quote_btn-container"
                    style="display:flex;justify-content: center;align-items: center; padding-bottom:30px;">
                    @if (Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </div>
            @else
                <form action="{{ route('keluhan.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    <input type="hidden" name="nama" value="{{ Auth::user()->name }}">
                    <div class="row mb-3">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label fw-bolder">Tanggal Keluhan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bolder">Isi Keluhan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="isi" rows="5"></textarea>
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
