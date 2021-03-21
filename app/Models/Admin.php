<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table      = 'petugas';
    protected $primaryKey = 'id_petugas';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'nama_petugas',
        'username',
        'email',
        'password',
        'telp',
        'level'
    ];

    protected $skipValidation     = true;
}
