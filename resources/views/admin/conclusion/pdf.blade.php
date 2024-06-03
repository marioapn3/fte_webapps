<!DOCTYPE html>
<html>

<head>
    <title>Work Stations PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Tabel Kesimpulan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Stasiun Kerja</th>
                <th>Tenaga Kerja</th>
                <th>WLA</th>
                <th>WFA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($work_stations as $workStation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $workStation->name }}</td>
                    <td>{{ $workStation->absences->workforce_avg ?? 'N/A' }}</td>
                    <td>{{ $workStation->wlaCycle->wla_bulet ?? 'N/A' }}</td>
                    <td>{{ $workStation->wfa_markup ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
