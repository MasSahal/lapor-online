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
            text-align: left;
        }

        table {
            border-collapse: collapse;
        }

        tr,
        td {
            padding: 5px 10px;
        }

        .text-center {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .mt-5 {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="mt-5">
        <table class="table">
            <tr>
                <th>Pelapor</th>
                <td>:</td>
                <td>
                    <?= $pengaduan->nama; ?>
                </td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>:</td>
                <td>
                    <?= $pengaduan->nik; ?>
                </td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>:</td>
                <td>
                    <?= $pengaduan->kategori; ?>
                </td>
            </tr>
            <tr class="py-4">
                <th>Status</th>
                <td>:</td>
                <td>
                    <?php if ($pengaduan->status == 'terkirim') { ?>
                        <span class="text-info">Terkirim</span>

                        <!-- // -->
                    <?php  } elseif ($pengaduan->status == 'terverifikasi') { ?>
                        <span class="text-warning">Terverifikasi</span>

                        <!-- // -->
                    <?php  } elseif ($pengaduan->status == 'diproses') { ?>
                        <span class="text-primary">Sedang Diproses</span>

                        <!-- // -->
                    <?php  } elseif ($pengaduan->status == 'selesai') { ?>
                        <span class="text-success">Selesai</span>

                        <!-- // -->
                    <?php  } elseif ($pengaduan->status == 'ditolak') { ?>
                        <span class="text-danger">Pengaduan Ditolak</span>

                        <!-- // -->
                    <?php  } ?>
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