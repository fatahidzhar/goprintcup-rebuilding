@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')
    <div style="display: flex;justify-content: space-around;align-items: center;">
        <div>
            <div style="display:flex;">
                <img src="{{ $menu->image }}" alt="">
                <div style="display: flex;flex-direction: column;margin-left:20px;">
                    <span style="font-size:2em">
                        {{ $menu->nama }}
                    </span>
                    <span style="font-size:1.5em">
                        {{ $menu->harga }}
                    </span>
                    <div style="margin-top: 20px">
                        <button class="nav-link bg-primary" style="color:white; border: none;">
                            CART
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('layouts.Footer')
@endsection
