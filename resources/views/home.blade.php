@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Point Anda : {{ Auth::user()->point }}</h3>
        <div class="row py-2">
            <div class="col-sm-3">
                <div class="card col-md-12 border border-dark rounded px-4 py-2">
                    <h4><strong>{{ Auth::user()->name }}</strong></h4>
                    <ul class="list-group list-group-flush nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="list-group-item active" role="presentation">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" data-target="#pills-home"
                                type="button" role="tab" aria-controls="pills-home" aria-selected="true">Profil</a>
                        </li>
                        <li class="list-group-item" role="presentation">
                            <a class="nav-link" id="pills-pesanan-tab" data-toggle="pill" data-target="#pills-pesanan"
                                type="button" role="tab" aria-controls="pills-pesanan" aria-selected="true">Pesanan
                                Saya</a>
                        </li>
                        <li class="list-group-item" role="presentation">
                            <a class="nav-link" id="pills-testimoni-tab" data-toggle="pill" data-target="#pills-testimoni"
                                type="button" role="tab" aria-controls="pills-testimoni"
                                aria-selected="true">Testimoni</a>
                        </li>
                        <li class="list-group-item" role="presentation">
                            <a class="nav-link" id="pills-keluhan-tab" data-toggle="pill" data-target="#pills-keluhan"
                                type="button" role="tab" aria-controls="pills-keluhan"
                                aria-selected="false">Keluhan</a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="col-sm-8 ">
                <div class="col-md-12 border border-dark rounded px-4 py-2">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <h2>Profil</h2>
                            @if (empty(Auth::user()->alamat))
                                <div class="alert alert-danger" role="alert">
                                    Silahkan lengkapi alamat anda!
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-2">Nama </div>
                                <div class="col-sm-8">{{ Auth::user()->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">Email </div>
                                <div class="col-sm-8">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">No HP </div>
                                <div class="col-sm-8">{{ Auth::user()->no_hp }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">Alamat </div>
                                <div class="col-sm-8">{{ Auth::user()->alamat }}</div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-pesanan" role="tabpanel"
                            aria-labelledby="pills-pesanan-tab">
                            <table class="table">
                                <h2>Pesanan</h2>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nomor Transaksi</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Detail Pesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->id_transaksi }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->harga }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade show" id="pills-testimoni" role="tabpanel"
                            aria-labelledby="pills-testimoni-tab">
                            <table class="table">
                                <h2>Testimoni</h2>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Isi</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Tanggapan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimoni as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->isi }}</td>
                                            <td>{{ $item->tgl_tanggapan }}</td>
                                            <td>{{ $item->tanggapan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-keluhan" role="tabpanel" aria-labelledby="pills-keluhan-tab">
                            <table class="table">
                                <h2>Keluhan</h2>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Isi</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Tanggapan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keluhan as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->isi }}</td>
                                            <td>{{ $item->tgl_tanggapan }}</td>
                                            <td>{{ $item->tanggapan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Testimoni</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile"
                            type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Keluhan</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Point : {{ Auth::user()->point }}</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Isi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tanggapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimoni as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->isi }}</td>
                                        <td>{{ $item->tgl_tanggapan }}</td>
                                        <td>{{ $item->tanggapan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Isi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tanggapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhan as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->isi }}</td>
                                        <td>{{ $item->tgl_tanggapan }}</td>
                                        <td>{{ $item->tanggapan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
