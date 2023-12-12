@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')
    <div style="display: flex;justify-content: space-around;align-items: center;">
        <div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="display:flex;">
                    <img src="{{ $menu->image }}" width="300" alt="">
                    <div style="display: flex;flex-direction: column;margin-left:20px;">
                        <input type="hidden" name="id_users" value="{{ Auth::user()->id }}" id="">
                        <input type="hidden" name="nama_product" value="{{ $menu->nama }}" id="">
                        <input type="hidden" name="harga" value="{{ $menu->harga }}" id="">
                        <span style="font-size:2em">
                            {{ $menu->nama }}
                        </span>
                        <span style="font-size:1.5em">
                            {{ $menu->harga }}
                        </span>
                        <span style="font-size:1.5em">
                            <input type="number" name="qty" min="1" value="1">
                        </span>
                        <div style="margin-top: 20px">
                            <button class="nav-link bg-primary" style="color:white; border: none;">
                                TAMBAH KERANJANG
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.Footer')
@endsection
