<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surveilans</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<div class="row justify-content-center mb-5">
    <h4 class="text-center">Laporan Surveilans</h4>
    <div class="text-center" style="font-size: 12px;">
        <strong>{{ $dari }}</strong> - <strong>{{ $sampai }}</strong>
    </div>
</div>

<div class="row mb-5">
    <div class="col-12">
        <table class="table table-sm tabel-borderless">
            <thead style="font-size: 12px;">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">No. Rekam Medis</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Jenis Surveilans</th>
                <th scope="col">Dokter Penanggung Jawab</th>
                <th scope="col">Tanggal Laporan</th>
            </tr>
            </thead>
            <tbody style="font-size: 11px;">
            @foreach ($surveilans as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
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
                    <td>{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex flex-column">
                <span><strong class="text-primary">{{ $jenis_surveilans }}</strong></span>
            </div>
            <div style="font-size: 12px;"><strong class="text-primary">{{ $surveilans->count() }}</strong> total
                rekaman.
            </div>
        </div>
    </div>
</div>
</body>
</html>
