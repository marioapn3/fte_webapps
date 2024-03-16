<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penentuan jumlah tenaga kerja pembuatan cylinder setiap shift</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        td {
            text-align: center;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="title">Penentuan jumlah tenaga kerja pembuatan cylinder setiap shift</div>
    <table class="table text-center table-hover">
        <thead>
            <tr>
                <th>Proses Kerja</th>
                <th>Beban Kerja</th>
                <th>Jumlah Operator saat ini</th>
                <th>Beban kerja setiap operator</th>
                <th>Keterangan</th>
                <th>Jumlah operator optimal menjadi</th>
                <th>Beban kerja setiap operator</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($workElements as $workElement)
                <tr>
                    <td>{{ $workElement->name }}</td>
                    <td>{{ $workElement->workload }}</td>
                    <td>{{ $workElement->workerNeed->operator_now }}</td>
                    <td>{{ $workElement->workerNeed->operator_load }}</td>
                    <td>{{ $workElement->workerNeed->desc }}</td>
                    <td>{{ $workElement->workerNeed->operator_need }}</td>
                    <td>{{ $workElement->workerNeed->operator_load_need }}</td>
                    <td>{{ $workElement->workerNeed->desc_need }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
