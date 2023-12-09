@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')

    <div class="content-wrapper" style="padding: 15px">
        <div class="row">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif
            <form role="form" action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data"
                id="form_calc">
                @csrf
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Menu</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="form-group" style="padding: 10px">
                            @foreach ($menu as $index => $item)
                                {{-- <div class="checkbox"> --}}
                                <label
                                    style="display: flex; justify-content: space-between;
                                    align-items: center;">
                                    <input type="text" name="transaksi_attr[{{ $index }}][menu]" readonly
                                        value="{{ $item->nama }}" data-harga="{{ $item->harga }}">
                                    <div>
                                        <a class="btn-tambah btn btn-primary" data-harga="{{ $item->harga }}">+</a>
                                        <input type="number" readonly style="width: 30px; text-align: center;"
                                            value="" name="transaksi_attr[{{ $index }}][qty]" class="jumlah">
                                        <a class="btn-kurang btn btn-primary" data-harga="{{ $item->harga }}">-</a>
                                        <input type="hidden" name="transaksi_attr[{{ $index }}][harga_attr]"
                                            value="{{ $item->harga }}">
                                    </div>
                                    <div style="width: 80px; text-align: right;">
                                        Rp. {{ number_format($item->harga) }}
                                    </div>
                                </label>
                                {{-- </div> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Transaksi</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div style="margin-bottom: 15px">
                                <button type="button" class="discount-btn" data-discount="5">5% off</button>
                                <button type="button" class="discount-btn" data-discount="10">10% off</button>
                                <button type="button" class="discount-btn" data-discount="15">15% off</button>
                                <button type="button" class="discount-btn" data-discount="25">25% off</button>
                                <button type="button" class="discount-btn" data-discount="50">50% off</button>
                                <button type="button" class="discount-btn" data-discount="75">75% off</button>
                                <button type="button" class="discount-btn" data-discount="100">100% off</button>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                                <label>Total harga:</label>
                                <input type="text" class="form-control" id="total" name="harga" value="0"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label>Masukan No Telp Pembeli Untuk Mendapatkan Discount</label>
                                <input type="text" name="no_hp" id="no_telp" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="hidden" readonly name="users_id" id="users_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Customer</label>
                                <input type="text" readonly name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat Customer</label>
                                <textarea name="alamat" readonly class="form-control" id="alamat" cols="10" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Total Kunjungan</label>
                                <input type="number" class="form-control" id="kunjungan" readonly>
                            </div>
                            <div class="form-group">
                                <label>Point</label>
                                <input type="number" name="point" class="form-control" id="point" readonly>
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" class="form-control" id="discount1" name="discount" readonly>
                            </div>
                            <div class="form-group">
                                <label>Total harga setelah Discount:</label>
                                <input type="text" class="form-control" id="total1" name="harga_discount" readonly>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        // function applyDiscount(discount) {
        //     const totalPrice = parseFloat(document.getElementById("total1").value);
        //     const discountedPrice = totalPrice * (1 - discount / 100);
        //     document.getElementById("total1").value = discountedPrice;
        //     if (discount === 5) {
        //         $("#btn5").attr("disabled", true).addClass("disabled");
        //     } else if (discount === 10) {
        //         $("#btn10").attr("disabled", true).addClass("disabled");
        //     } else if (discount === 15) {
        //         $("#btn15").attr("disabled", true).addClass("disabled");
        //     } else if (discount === 25) {
        //         $("#btn25").attr("disabled", true).addClass("disabled");
        //     } else if (discount === 50) {
        //         $("#btn50").attr("disabled", true).addClass("disabled");
        //     }
        // }

        $(document).ready(function() {
            $(".discount-btn").click(function() {
                var discount = $(this).data("discount");
                var totalHarga = parseInt($("#total").val());
                var hargaDiskon = totalHarga * discount / 100;
                var hargaSetelahDiskon = totalHarga - hargaDiskon;
                $("#total1").val(hargaSetelahDiskon);
                $("#discount1").val(discount);
                $(".discount-btn").attr("disabled", true).addClass("disabled");
            });
        });
        $(document).ready(function() {
            $("#form_calc input[type='checkbox']").change(function() {
                var totalPrice = 0;
                $("#form_calc input[type='text']").each(function() {
                    totalPrice += parseInt($(this).data("harga"));
                });

                $("#total").val(totalPrice);

                var no_hp = $("#no_telp").val();
                $.ajax({
                    url: "/admin/user/" + no_hp,
                    success: function(data) {
                        if (data && data.name) {
                            // var diskon = Math.floor(Math.random() * 20) + 1;
                            // var totalHarga = parseInt($("#total").val());
                            // var hargaDiskon = totalHarga * diskon / 100;
                            // var hargaSetelahDiskon = totalHarga - hargaDiskon;
                            // console.log("Data ditemukan!");
                            // console.log("Diskon: " + diskon + "%");
                            // console.log("Harga setelah diskon: " + hargaSetelahDiskon);
                            // $("#total1").val(hargaSetelahDiskon);
                            // $("#total_discount").val(diskon + "%");
                        } else {
                            console.log("Data tidak ditemukan!");
                        }
                    },
                    error: function() {
                        alert("Terjadi kesalahan saat mengambil data pengguna dengan nomor handphone " +
                            no_hp + ".");
                    }
                });
            });

            $("#no_telp").on("input", function() {
                var no_hp = $("#no_telp").val();
                $.ajax({
                    url: "/admin/user/" + no_hp,
                    success: function(data) {
                        if (data && data.name) {
                            if (typeof discount !== 'undefined') {
                                var totalHarga = parseInt($("#total").val());
                                
                            }
                            $("#total1").val(totalHarga);
                            $("#users_id").val(data.id);
                            $("#nama").val(data.name);
                            $("#alamat").val(data.alamat);
                            $("#kunjungan").val(data.kunjungan);
                            $("#point").val(data.point);

                            // $("#total_discount").val(diskon + "%");

                        } else {
                            console.log("Data tidak ditemukan!");
                        }
                    },
                    error: function() {
                        alert("Terjadi kesalahan saat mengambil data pengguna dengan nomor handphone " +
                            no_hp + ".");
                    }
                });
            });

            $('.jumlah').val('0');

            $('.btn-tambah').click(function() {
                var harga = parseInt($(this).data('harga'));
                var jumlah = parseInt($(this).siblings('.jumlah').val()) + 1;
                $(this).siblings('.jumlah').val(jumlah);
                var totalHarga = parseInt($('#total').val()) + harga;
                $('#total').val(totalHarga);
            });

            $('.btn-kurang').click(function() {
                var harga = parseInt($(this).data('harga'));
                var jumlah = parseInt($(this).siblings('.jumlah').val()) - 1;
                if (jumlah < 0) {
                    jumlah = 0;
                }
                $(this).siblings('.jumlah').val(jumlah);
                var totalHarga = parseInt($('#total').val()) - harga;
                if (totalHarga < 0) {
                    totalHarga = 0;
                }
                $('#total').val(totalHarga);
            });
        });
    </script>
@endsection
