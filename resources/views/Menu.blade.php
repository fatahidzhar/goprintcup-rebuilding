@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="page-section">
                        <br><br>
                        <h2 class="page-title"><b>Produk</b></h2></br></br>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- starter -->
                @foreach ($makanan as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="menu-block">
                            <div class="menu-content">
                                <div class="card my-2" style="width: 18rem;">
                                    <img src="{{ $item->image }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $item->nama }}</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <span class="dish-meta mb-3 font-weight-bold">Harga Rp.
                                            {{ number_format($item->harga) }}
                                        </span><br />
                                        <a href="#" class="btn btn-primary mt-2">Detail produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.menu -->
    </div>
    @include('layouts.Footer')
@endsection
