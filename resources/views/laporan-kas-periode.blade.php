<!DOCTYPE html>
<html>

<head>
    <title>Data Rekap Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>


    {{-- <center>
        @foreach ($data2 as $e)
            <h5>{{ $e->masjid }}</h4>
        @endforeach
        <p>{{ \Carbon\Carbon::parse($tgl1)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tgl2)->format('d/m/Y') }}
    </center> --}}
    <hr>

    <table class='table table-bordered'>
       

    {{-- Data Uraian Masuk Keluar --}}
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Kas</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                @php $i=1 @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->uraian }}</td>
                    @if ($d->type == 'MASUK')
                    <td>@currency($d->kas)</td>
                    <td>Pemasukan</td>
                    @elseif($d->type == 'KELUAR')
                    <td>@currency($d->kas)</td>
                    <td>Pengeluaran</td>
                    @endif
                    {{-- <td>{{ $rekap->type == 'MASUK' ? $rekap->kas : 0 }}</td>
                <td>{{ $rekap->type == 'KELUAR' ? $rekap->kas : 0 }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Tutup Data Uraian Masuk Keluar --}}

</body>

</html>