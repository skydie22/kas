<!DOCTYPE html>
<html>

<head>
    <title> Laporan PDF Kas</title>
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


    <center>
        <h5>Laporan Kas Pdf</h5>
    </center>

    {{-- <table class="table table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Total Kas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">@currency($datasMasuk)</td>
            </tr>
        </tbody>
    </table> --}}

    <table class="table table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Total Kas</th>
                <th class="text-center">Sisa Kas</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">@currency($datasMasuk)</td>
                <td class="text-center">@currency($datasSisa)</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Kas</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasAll as $rekap)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rekap->tanggal }}</td>
                    <td>{{ $rekap->uraian }}</td>
                    @if ($rekap->type == 'MASUK')
                    <td>@currency($rekap->kas)</td>
                    <td>Pemasukan</td>
                    @elseif($rekap->type == 'KELUAR')
                    <td>@currency($rekap->kas)</td>
                    <td>Pengeluaran</td>
                    @endif
                    {{-- <td>{{ $rekap->type == 'MASUK' ? $rekap->kas : 0 }}</td>
                <td>{{ $rekap->type == 'KELUAR' ? $rekap->kas : 0 }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>