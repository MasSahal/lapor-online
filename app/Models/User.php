<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table      = 'masyarakat';
    protected $primaryKey = 'nik';

    protected $returnType     = 'object';

    protected $allowedFields = [
        'nik',
        'nama',
        'email',
        'username',
        'password',
        'telp'
    ];
}
