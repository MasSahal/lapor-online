<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $allowedFields = [
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'id_petugas'
    ];
    protected $returnType = 'object';

    public function getTanggapanWithPetugas($id)
    {
        $this->db->table($this->table);
        $this->select('*');
        $this->join('petugas', 'tanggapan.id_petugas = petugas.id_petugas');
        $this->join('pengaduan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan');
        $this->where('tanggapan.id_pengaduan', $id);
        return $this->get()->getRowObject();
    }
}
