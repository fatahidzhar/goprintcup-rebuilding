@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <div class="box">
            <a href="transaksi/create" class="btn btn-primary" style="margin: 10px;">Tambah Transaksi</a>
            <div class="box-header">
                <h3 class="box-title">Data Table Transaksi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
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
                                    {{ $item->created_at }}
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
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
