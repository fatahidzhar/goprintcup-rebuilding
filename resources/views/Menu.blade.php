@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="page-section">
                        <br><br>
                        <h2 class="page-title"><b>Category</b></h2></br></br>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- starter -->
                @foreach ($makanan as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="menu-block">
                            <div class="menu-content">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="dish-img"><img src="{{ $item->image }}" alt=""
                                                class="img-circle" width="70" height="70"></a></div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="dish-content">
                                            <div style="display:flex;flex-direction: column;">
                                                <div>
                                                    <h5 class="dish-title">{{ $item->nama }}</a></h5>
                                                </div>
                                            </div>
                                            <span class="dish-meta">Harga Rp. {{ number_format($item->harga) }} </span>
                                            <div class="dish-price">
                                                <p><a href="product/{{ $item->id }}"
                                                    class="cart">DETAIL</a> | <a href=""
                                                        class="cart">TAMBAH CART</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.menu -->

        <!-- menu -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="page-section">
                            <br><br>
                            <h2 class="page-title"><b></b></h2></br></br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- starter -->
                    @foreach ($minuman as $item)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                            <div class="menu-block">
                                <div class="menu-content">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="dish-img"><img src="{{ $item->image }}" alt=""
                                                    class="img-circle" width="70" height="70"></a></div>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="dish-content">
                                                <h5 class="dish-title">{{ $item->nama }}</a></h5>
                                                <span class="dish-meta">Harga</span>
                                                <div class="dish-price">
                                                    <p>Rp. {{ number_format($item->harga) }} | <a href=""
                                                            class="cart">TAMBAH CART</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layouts.Footer')
@endsection
