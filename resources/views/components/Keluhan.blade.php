@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table Keluhan</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            @if (request()->is('admin/laporan/keluhan')) 
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
                        <a href="{{ route('laporan.exportPDFKeluhan', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-danger">PDF</a>
                    </div>
                @if ($start_date && $end_date)
                    <p>Data Keluhan dari {{ $start_date }} sampai dengan {{ $end_date }}</p>
                @endif
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Isi Tanggapan</th>
                            <th>Tanggal</th>
                            <th>Tanggapan</th>
                            <th>Status</th>
                            @if (request()->is('admin/keluhan')) 
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keluhan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->excerpt() }}</td>
                                <td>{{ $item->tgl_tanggapan }}</td>
                                <td>{{ $item->tanggapan }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <small class="label bg-yellow">Belum di-Tanggapi</small>
                                    @elseif($item->status == 1)
                                        <small class="label bg-green">Sudah di-Tanggapi</small>
                                    @endif
                                </td>
                                @if (request()->is('admin/keluhan')) 
                                <td>
                                    <a href="{{ url('admin/keluhan/' . $item->id . '/edit') }}"
                                        class="btn btn-block btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i></a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Isi Tanggapan</th>
                            <th>Tanggal</th>
                            <th>Tanggapan</th>
                            <th>Status</th>
                            @if (request()->is('admin/keluhan')) 
                            <th>Action</th>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection
