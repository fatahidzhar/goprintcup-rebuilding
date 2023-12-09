@extends('layouts.main')
@section('content')
    @include('layouts.NavigationD')
    @include('layouts.Sidebar')
    <div class="content-wrapper" style="padding: 15px">
        <div class="box">
            <a href="menu/create" class="btn btn-primary" style="margin: 10px;">Tambah Menu</a>
            <div class="box-header">
                <h3 class="box-title">Data Menu</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar Menu</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ $item->image }}" width="100" alt=""></td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <form action="{{ route('menu.destroy', $item->id) }}" method="POST">
                                        <a href="{{ url('/admin/menu/' . $item->id_menu . '/edit') }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa fa-fw fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Gambar Menu</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection
