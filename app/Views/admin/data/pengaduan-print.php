<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
    <title><?= $title; ?></title>
    <style>
        table,
        tr,
        td,
        th {
            border: 1px solid black;
        }

        * {
            font-family: Helvetica, Arial, Segoe UI, Segoe UI Emoji;

        }

        table {
            background: #fafafa;
            position: center;
            border-collapse: collapse;
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        th {
            background: #bbbbbb;
            padding: 10px;
        }

        td {
            padding: 5px
        }

        .text-center {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h4 class="text-center"><?= $title; ?></h4>
    <table width="100%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Isi Pengaduan</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
        <?php $no = 0; ?>
        <?php foreach ($pengaduan as $p) {; ?>
            <tr>
                <td><?= $no += 1; ?></td>
                <td><?= $p->nama; ?></td>
                <td><?= $p->subjek_pengaduan; ?></td>
                <td><?= $p->tgl_pengaduan; ?></td>
                <td><?= $p->status; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <small><?= $tanggal; ?></small>
    <script>
        window.print();
    </script>
</body>

</html>