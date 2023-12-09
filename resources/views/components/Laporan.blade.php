@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')

    <div class="content-wrapper" style="padding: 15px">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Laporan Pendapatan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="GET">
                    <div class="form-group">
                        <label for="start_date">Pilih Tanggal Awal:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="end_date">Pilih Tanggal Akhir:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 15px">Tampilkan</button>
                </form>
                <div class="form-group">
                    <a href="{{ route('laporan.exportPDF', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-danger">PDF</a>
                </div>
                @if ($start_date && $end_date)
                    <p>Data Laporan Pendapatan dari {{ $start_date }} sampai dengan {{ $end_date }}</p>
                @endif
               
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Menu</th>
                            <th>Harga Normal</th>
                            <th>Harga Discount</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi_attr->groupBy('id_transaksi') as $id_transaksi => $items)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                @php
                                $names = [];
                                @endphp

                                @foreach($items as $item)
                                    @php
                                        $nama = $item->nama;
                                    @endphp

                                    @if (!in_array($nama, $names))
                                        {{ $nama }}
                                        @php
                                            $names[] = $nama;
                                        @endphp
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                    @foreach ($items as $item)
                                    <small class="label bg-yellow"> {{$item->qty}}</small> <small class="label bg-primary">{{ $item->menu }} </small><br>
                                    @endforeach
                                </td>
                                <td>
                                    {{ number_format($item->harga) }}
                                </td>
                                <td>
                                    @if ($item->harga_discount != null)
                                        Rp.&nbsp;{{ number_format($item->harga_discount) }}
                                        <span class="label label-primary">{{ $item->discount }}%</span>
                                    @else
                                        Rp.&nbsp;{{ number_format($item->harga) }}
                                    @endif
                                </td>
                                <td>
                                    {{ $item->tanggal }}
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Menu</th>
                            <th>Harga Normal</th>
                            <th>Harga Discount</th>
                            <th>Tanggal</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection
