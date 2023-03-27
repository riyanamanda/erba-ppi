<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surveilans</title>

    <style>
        *, ::after, ::before {
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 52px;
            color: #64748b;
        }

        .header .title {
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
        }

        .header .title span {
            color: #6777ef;
        }

        .header .sub-title {
            font-size: 12px;
            font-weight: 500;
            color: #6777ef;
        }

        .header .sub-title strong {
            color: #64748b;
        }

        table {
            width: 100%;
            margin-bottom: 52px;
            color: #64748b;
            font-size: 12px;
        }

        table thead th {
            vertical-align: bottom;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
            padding-bottom: 5px;
            color: #475569;
        }

        .footer {
            font-size: 12px;
            color: #64748b;
        }

        .footer span {
            color: #6777ef;
        }

        .footer p {
            margin: 0;
        }

        .footer strong {
            color: #6777ef;
        }
    </style>
</head>

<body>
<div class="header">
    <h1 class="title">Laporan <span>Surveilans</span></h1>
    <div class="sub-title">
        Periode: <strong>{{ $dari }}</strong> - <strong>{{ $sampai }}</strong>
    </div>
</div>

<table>
    <thead>
    <tr>
        <th scope="col">No. Rekam Medis</th>
        <th scope="col">Nama Pasien</th>
        <th scope="col">Jenis Surveilans</th>
        <th scope="col">DPJP</th>
        <th scope="col">Waktu</th>
        <th scope="col">Tanggal</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($surveilans as $item)
        <tr>
            <td>{{ $item->datapasien->no_rekam_medis }}</td>
            <td>{{ $item->datapasien->nama }}</td>
            <td>
                @if ($item->surveilansable_type == "infeksi_saluran_kemih")
                    Infeksi Saluran Kemih (ISK)
                @elseif($item->surveilansable_type == "phlebitis")
                    Phlebitis
                @endif
            </td>
            <td>{{ $item->datapasien->dokter->nama }}</td>
            <td>{{ $item->created_at->toTimeString() }}</td>
            <td>{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="footer">
    <strong>{{ $jenis_surveilans }}</strong>
    <p>
        Total: <strong>{{ $surveilans->count() }}</strong> rekaman.
    </p>
</div>

</body>
</html>
