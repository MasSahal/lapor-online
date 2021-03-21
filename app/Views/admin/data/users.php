<?php $i = 0; ?>
<?php foreach ($users as $u) { ?>
    <tr>
        <td><?= $i += 1; ?></td>
        <td>
            <?= $u->nik ?>
            </tdid=>
        <td><?= $u->nama ?></td>
        <td><?= $u->email ?></td>
        <td><?= $u->telp ?></td>
        <td>
            <a href="#" class="badge badge-warning" id="edit" data-nik="<?= $u->nik; ?>">Edit</a>
            <a href="#" class="badge badge-danger" id="hapus" data-nik="<?= $u->nik; ?>">Hapus</a>
        </td>
    </tr>
<?php }; ?>