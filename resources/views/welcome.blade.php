@extends('layouts.mainH')
@section('content')
    @include('layouts.NavigationH')
    <!-- slider section -->
    <section class="position-relative">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="slider_item-box">
                        <div class="slider_item-container">
                            <div class="container">
                                <div class="row" style="align-items: center;">
                                    <div class="col-md-6">
                                        <div class="slider_item-detail">
                                            <div>
                                                <h1>
                                                    Go Print<br />
                                                    Cup
                                                </h1>
                                                <p>
                                                    Sablon gelas plastik tangerang
                                                </p>
                                                <div class="d-flex">
                                                    <a href="/menu" class="text-uppercase custom_orange-btn mr-3">
                                                        Produk
                                                    </a>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="slider_img-box">
                                            <div>
                                                {{-- <img src="images/slide-img.png" alt="" class="" /> --}}
                                                <img src="images/logo.png" alt="" class="mb-5" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-xl-8 text-center">
                <h3 class="mb-4">Testimonial</h3>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    Banyak pelanggan yang telah memberi testimoni untuk tempat ini!
                </p>
            </div>
        </div>

        <div class="row text-center mb-5">
            @foreach ($testimoni as $item)
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                            class="rounded-circle shadow-1-strong" width="150" height="150" />
                    </div>
                    <h5 class="mb-3">{{ $item->nama_user }}</h5>
                    <h6 class="text-primary mb-3">
                        @if ($item->penilaian == 1)
                            <i class="bi bi-star-fill" style="color:blue"></i>
                        @elseif($item->penilaian == 2)
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                        @elseif($item->penilaian == 3)
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                        @elseif($item->penilaian == 4)
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                        @elseif($item->penilaian == 5)
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                            <i class="bi bi-star-fill" style="color:blue"></i>
                        @endif
                    </h6>
                    <p class="px-xl-3">
                        <i class="fas fa-quote-left pe-2"></i>{{ $item->isi }}
                    </p>
                    <ul class="list-unstyled d-flex justify-content-center mb-0">
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star fa-sm text-warning"></i>
                        </li>
                        <li>
                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    @include('layouts.Footer')
@endsection
