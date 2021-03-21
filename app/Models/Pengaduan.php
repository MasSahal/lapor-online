<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan extends Model
{
    protected $table      = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_kategori',
        'subjek_pengaduan',
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status'
    ];





    public function getPengaduan()
    {
        // $this->db      = \Config\Database::connect();
        // $builder = $db->table($this->table);
        $this->db->table($this->table);
        $this->select('*');
        $this->join('masyarakat', 'pengaduan.nik = masyarakat.nik');
        $hasil = $this->get();
        return $hasil->getResultObject();
    }

    // public function getPengaduan1()
    // {
    //     $query = "SELECT pengaduan.nik, nama, username, password, telp FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik";
    //     $query2 = "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik";
    //     // $builder = $db->table($this->table);
    //     $hasil = $this->db->query($query2);
    //     dd($hasil->getResultObject());
    // }
}
