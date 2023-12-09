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
    <p>Data Customer dari {{ $start_date }} sampai dengan {{ $end_date }}</p>
    <table id="example1" class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>No Telp</th>
                <th>Alamat</th>
                <th>Kunjungan</th>
                <th>Point</th>
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
                </tr>
            @endforeach
        </tbody>
        
    </table>
</body>
