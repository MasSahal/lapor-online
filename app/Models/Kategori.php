<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori extends Model
{
    protected $table      = 'kategori_pengaduan';
    protected $primaryKey = 'id_kategori';

    protected $returnType     = 'object';

    protected $allowedFields = [
        'kategori'
    ];
}
