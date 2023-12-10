@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <div class="box">
            <div class="box-header">
                <div class="form-group">
                    <h3 class="box-title">Data Table Testimoni</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                @if (request()->is('admin/laporan/testimoni')) 
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
                    <a href="{{ route('laporan.exportPDFTestimoni', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-danger">PDF</a>
                </div>
                @if ($start_date && $end_date)
                    <p>Data Testimoni dari {{ $start_date }} sampai dengan {{ $end_date }}</p>
                @endif
                @endif
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Isi Testimoni</th>
                            <th>Tanggal</th>
                            <th>Penilaian</th>
                            @if (request()->is('admin/testimoni')) 
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->excerpt() }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>
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
                                </td>
                                @if (request()->is('admin/testimoni')) 
                                <td>
                                    <a href="{{ url('admin/testimoni/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i></a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Isi Testimoni</th>
                            <th>Tanggal</th>
                            <th>Penilaian</th>
                            @if (request()->is('admin/testimoni')) 
                                <th>Action</th>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection
