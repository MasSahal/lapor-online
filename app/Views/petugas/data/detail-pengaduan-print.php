<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
    <title>Laporan Pengaduan <?= $pengaduan->nama ?></title>
    <style>
        * {
            font-family: Helvetica, Arial, Segoe UI, Segoe UI Emoji;

        }

        table {
            background: #fafafa;
            position: center;
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .mr-5 {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="mr-5">
        <table class="table">
            <tr>
                <th>Subjek</th>
                <td>:</td>
                <td>
                    <?= $pengaduan->subjek_pengaduan; ?>
                </td>
            </tr>
            <tr>
                <th>Dari</th>
                <td>:</td>
                <td>
                    <?= $pengaduan->nama; ?>
                </td>
            </tr>
        </table>
        <hr>
        <h4><?= $pengaduan->subjek_pengaduan; ?></h4>
        <p><?= str_break($pengaduan->isi_laporan) ?></p>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>