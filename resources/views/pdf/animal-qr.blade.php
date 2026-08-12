<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>QR Hewan</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            text-align:center;
            padding:40px;
        }

        .card{
            border:2px solid #0FA958;
            padding:30px;
            border-radius:15px;
        }

        h1{
            color:#0FA958;
            margin-bottom:10px;
        }

        table{
            width:100%;
            margin-top:20px;
        }

        td{
            padding:6px;
            text-align:left;
        }

    </style>
</head>

<body>

<div class="card">

    <h1>TEMAN AQIQAH</h1>

    <h3>LABEL IDENTITAS HEWAN</h3>

    <hr>

    <table>

        <tr>
            <td><strong>Kode</strong></td>
            <td>{{ $animal->animal_code }}</td>
        </tr>

        <tr>
            <td><strong>Nama</strong></td>
            <td>{{ $animal->name }}</td>
        </tr>

        <tr>
            <td><strong>Kategori</strong></td>
            <td>{{ $animal->category->name }}</td>
        </tr>

        <tr>
            <td><strong>Grade</strong></td>
            <td>{{ $animal->grade->name }}</td>
        </tr>

        <tr>
            <td><strong>Berat</strong></td>
            <td>{{ $animal->weight }} Kg</td>
        </tr>

    </table>

    <br><br>

    {{-- QR Code akan kita isi pada tahap berikutnya --}}

    <p>
        Scan QR Code untuk melihat profil hewan.
    </p>

</div>

</body>
</html>