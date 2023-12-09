@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-bottom:20px;">Data Customer</h3>
                @if (request()->is('admin/laporan/customer')) 
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
                @if ($start_date && $end_date)
                    <p>Data Customer dari {{ $start_date }} sampai dengan {{ $end_date }}</p>
                @endif
            </div><!-- /.box-header -->
            <a href="{{ route('laporan.exportPDFCustomer', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-danger" style="margin-left:10px;">PDF</a>
            @endif
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Kunjungan</th>
                            <th>Point</th>
                            @if (request()->is('admin/customer')) 
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->kunjungan }}</td>
                                <td>{{ $item->point }}</td>
                                @if (request()->is('admin/customer')) 
                                <td><a href="{{ url('admin/customer/data/' . $item->id) }}" class="btn btn-block btn-primary">View</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Kunjungan</th>
                            <th>Point</th>
                            @if (request()->is('admin/customer')) 
                            <th>Action</th>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection
