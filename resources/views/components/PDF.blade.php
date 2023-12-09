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
        <p>Data Laporan Pendapatan dari {{ $start_date }} sampai dengan {{ $end_date }}</p>
    @endif
    <table id="example1" class="table table-bordered table-striped" style="width:100%">
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
                <th colspan="5">Jumlah Total Pendapatan</th>
                <th>  @foreach($transaksi as $item)
                Rp. {{ number_format($item->total_harga) }}
    @endforeach</th>
            </tr>
        </tfoot>
    </table>
</body>
