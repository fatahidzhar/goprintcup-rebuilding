<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<body>
    <h2 style="text-align: center"> Mie Ayam
        Djoedes Wadassari</h2>
    <h5 style="text-align: center">
        Rasakan sensasi pedas yang membuat Anda ketagihan!
    </h5>
    @if ($start_date && $end_date)
        <p>Data Testimoni dari {{ $start_date }} sampai dengan {{ $end_date }}</p>
    @endif
    <table id="example1" class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Isi Testimoni</th>
                <th>Penilaian</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimoni as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_user }}</td>
                    <td>{{ $item->excerpt() }}</td>
                    <td>{{ $item->penilaian }}</td>
                    <td>{{ $item->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
</body>
