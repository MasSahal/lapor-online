<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table      = 'masyarakat';
    protected $primaryKey = 'nik';

    protected $skipValidations = false;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'nik',
        'nama',
        'username',
        'password',
        'telp'
    ];
}
