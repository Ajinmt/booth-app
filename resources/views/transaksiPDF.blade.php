<!DOCTYPE html>
<html>
<head>
    <title>Transaction PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .approval {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Detail Transaksi</h1>
    <table>
        <tr>
            <th>ID Transaksi</th>
            <td>{{ $transaction->id }}</td>
        </tr>
        <tr>
            <th>Nomor Booth</th>
            <td>{{ $transaction->booth->nama }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $transaction->status }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>Rp. {{ number_format($transaction->harga, 2) }}</td>
        </tr>
    </table>
    <div class="approval">
        <p>Disetujui oleh admin</p>
    </div>
</body>
</html>
