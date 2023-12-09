@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>Rp. {{ number_format($totalHarga) }}</h3>
                            <p>Pendapatan Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="laporan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $transaksi }}</h3>
                            <p>Transaksi Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $testimoni }}</h3>
                            <p>Testimoni</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="testimoni" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $keluhan }}</h3>
                            <p>Keluhan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="keluhan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="nav-tabs-custom">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Table Testimoni</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Customer</th>
                                            <th>Isi Testimoni</th>
                                            <th>Penilaian</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonial as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_user }}</td>
                                                <td>{{ $item->isi }}</td>
                                                <td>
                                                    @if ($item->penilaian == 1)
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                    @elseif($item->penilaian == 2)
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                    @elseif($item->penilaian == 3)
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                    @elseif($item->penilaian == 4)
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                    @elseif($item->penilaian == 5)
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                        <i class="bi bi-star-fill" style="color:orangered"></i>
                                                    @endif
                                                </td>
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Customer</th>
                                            <th>Isi Testimoni</th>
                                            <th>Penilaian</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.nav-tabs-custom -->
                    <!-- Chat box -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table Keluhan</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>Isi Keluhan</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keluhans as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->isi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>Isi Keluhan</th>
                                      
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </section><!-- right col -->
            </div><!-- /.row (main row) -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
