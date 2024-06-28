<!DOCTYPE html>
<html>
<head>
    <title>Laporan Inventory Masuk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
        }
        .signature div {
            display: inline-block;
            margin: 0 50px;
        }
    </style>
</head>
<body>
    <h1>Laporan Inventory Masuk</h1>
    <p>Dari Tanggal: {{ tanggal_indonesia($awal, false) }}</p>
    <p>Sampai Tanggal: {{ tanggal_indonesia($akhir, false) }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah Masuk</th>
                <th>Nama Supplier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['nama_produk'] }}</td>
                    <td>{{ $item['tanggal'] }}</td>
                    <td>{{ $item['jumlahMasuk'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <div>
            <p>Disetujui oleh:</p>
            <br><br><br>
            <p>__________________________</p>
        </div>
        <div>
            <p>Diketahui oleh:</p>
            <br><br><br>
            <p>__________________________</p>
        </div>
    </div>
</body>
</html>
