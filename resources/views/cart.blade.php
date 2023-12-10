@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')
    <div class="container-fluid p-5" style="height: 100%;">
        <div>
            <div>
                <h2 class="text-center text-white p-4" style="background-color :blue;">Keranjang Menu</h2>
            </div>
            <div style="display: flex; margin-bottom:10px;">
                <img src="https://picsum.photos/300/300
                " alt="" width="100px">
                <div style="margin-left: 20px">
                    <h5 class="dish-title">Nama makanan</h5>
                    <p class="dish-meta">Rp. 20.000</p>
                    <input type="number" name="" id="" value="1" min="1">
                </div>
            </div>
            <div style="display: flex">
                <img src="https://picsum.photos/300/300
                " alt="" width="100px">
                <div style="margin-left: 20px">
                    <h5 class="dish-title">Nama makanan</h5>
                    <p class="dish-meta">Rp. 20.000</p>
                    <input type="number" name="" id="" value="1" min="1">
                </div>
            </div>
            <div
                style="margin-top:10px;display: flex;justify-content: flex-end;align-items: center;background-color :blue;">
                <div>
                    <h5 class="dish-title" style="color: #fff; padding:10px; margin-top:10px;"><b>Total Harga :</b></h5>
                </div>
                <div style="margin-left: 10px">
                    <h5 class="dish-meta" style="color: #fff; padding:10px; margin-top:10px;">Rp. 20.000</h5>
                </div>
            </div>
        </div>
        <div style="display:flex;justify-content: flex-end;">
            <button class="cart" style="border: none; margin-top:10px;margin-right:5px;">Update</button>
            <button class="cart" style="border: none; margin-top:10px;">Check Out</button>
        </div>
    </div>
    @include('layouts.Footer')
@endsection
