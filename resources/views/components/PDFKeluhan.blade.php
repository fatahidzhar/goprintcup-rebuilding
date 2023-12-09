<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <h2 style="text-align: center"> Mie Ayam
        Djoedes Wadassari</h2>
    <h5 style="text-align: center">
        Rasakan sensasi pedas yang membuat Anda ketagihan!
    </h5>
    @if ($start_date && $end_date)
        <p>Data Keluhan dari {{ $start_date }} sampai dengan {{ $end_date }}</p>
    @endif
    <table id="example1" class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Isi Tanggapan</th>
                <th>Tanggal</th>
                <th>Tanggapan</th>
                <th>Status</th>
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
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
