@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')
    <div class="container-fluid p-5" style="height: 100%;">
        <div>
            <div>
                <h2 class="text-center text-white p-4" style="background-color :orangered;">Keranjang Menu</h2>
            </div>
            @foreach ($cart as $item)
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <div style="display: flex; margin-bottom:10px;">
                        <img src="{{ $item->image }}" alt="" width="100px">
                        <div style="margin-left: 20px">
                            <h5 class="dish-title">{{ $item->nama_product }}</h5>
                            <p class="dish-meta">Rp. {{ number_format($item->harga_total) }}</p>
                            <input type="hidden" name="id" id="" value="{{ $item->id }}">
                            <input type="hidden" name="id_users" value="{{ Auth::user()->id ?? '' }}" id="">
                            <input type="hidden" name="nama_product" value="{{ $item->nama_product }}" id="">
                            <input type="hidden" name="id_menu" value="{{ $item->id_menu }}" id="">
                            <input type="hidden" name="harga" value="{{ $item->harga }}" id="">
                            <input type="number" name="qty" id="" value="{{ $item->qty }}" min="1">
                            <button class="cart" style="border: none; margin-top:10px;margin-right:5px;">Update</button>
                        </div>
                    </div>
                </form>
            @endforeach
            <div
                style="margin-top:10px;display: flex;justify-content: flex-end;align-items: center;background-color :orangered;">
                <div>
                    <h5 class="dish-title" style="color: #fff; padding:10px; margin-top:10px;"><b>Total Harga :</b></h5>
                </div>
                <div style="margin-left: 10px">
                    <h5 class="dish-meta" style="color: #fff; padding:10px; margin-top:10px;">Rp.
                        {{ number_format($total_harga) }}</h5>
                </div>
            </div>
        </div>
        <div style="display:flex;justify-content: flex-end;">

            <button class="cart" style="border: none; margin-top:10px;">Check Out</button>
        </div>
    </div>
    @include('layouts.Footer')
@endsection
