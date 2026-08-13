<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Laporan Data Hewan</title>

    <style>

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #222;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 5px 0;
        }

        .summary {
            width: 100%;
            margin-bottom: 20px;
        }

        .summary td {
            width: 33%;
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 7px;
        }

        th {
            background-color: #eeeeee;
            text-align: center;
        }

        .section-title {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .text-center {
            text-align: center;
        }

    </style>

</head>

<body>

    <div class="header">

        <h1>Teman Aqiqah</h1>

        <h2>Laporan Data Hewan</h2>

        @if($startDate && $endDate)

            <p>
                Periode:
                {{ \Carbon\Carbon::parse($startDate)->format('d-m-Y') }}
                s/d
                {{ \Carbon\Carbon::parse($endDate)->format('d-m-Y') }}
            </p>

        @else

            <p>Seluruh Periode</p>

        @endif

    </div>


    {{-- RINGKASAN --}}

    <table class="summary">

        <tr>

            <td>
                <strong>Hewan Masuk</strong>
                <br>
                {{ $animalsIn->count() }}
            </td>

            <td>
                <strong>Hewan Keluar</strong>
                <br>
                {{ $animalsOut->count() }}
            </td>

            <td>
                <strong>Hewan Tersedia</strong>
                <br>
                {{ $animalsAvailable }}
            </td>

        </tr>

    </table>


    {{-- DATA HEWAN MASUK --}}

    <div class="section-title">
        Data Hewan Masuk
    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Kode Hewan</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Grade</th>
                <th>Kandang</th>
                <th>Tanggal Masuk</th>

            </tr>

        </thead>

        <tbody>

            @forelse($animalsIn as $animal)

                <tr>

                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $animal->animal_code }}
                    </td>

                    <td>
                        {{ $animal->name }}
                    </td>

                    <td>
                        {{ $animal->category->name ?? '-' }}
                    </td>

                    <td>
                        {{ $animal->grade->name ?? '-' }}
                    </td>

                    <td>
                        {{ $animal->cage->name ?? '-' }}
                    </td>

                    <td>
                        {{ $animal->entry_date?->format('d-m-Y') }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">
                        Tidak ada data hewan masuk.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    {{-- DATA HEWAN KELUAR --}}

    <div class="section-title">
        Data Hewan Keluar
    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Kode Hewan</th>
                <th>Nama</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Alasan</th>

            </tr>

        </thead>

        <tbody>

            @forelse($animalsOut as $animal)

                <tr>

                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $animal->animal_code }}
                    </td>

                    <td>
                        {{ $animal->name }}
                    </td>

                    <td>
                        {{ $animal->entry_date
                            ? \Carbon\Carbon::parse($animal->entry_date)->format('d-m-Y')
                            : '-' }}
                    </td>

                    <td>
                        {{ $animal->exit_date
                            ? \Carbon\Carbon::parse($animal->exit_date)->format('d-m-Y')
                            : '-' }}
                    </td>

                    <td>
                        {{ $animal->reason }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">
                        Tidak ada data hewan keluar.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <p style="margin-top: 30px;">
        Dicetak pada:
        {{ now()->format('d-m-Y H:i') }}
        WIB
    </p>

</body>
</html>