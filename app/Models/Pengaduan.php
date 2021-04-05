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

    public function getPengaduan($id = false)
    {
        if ($id == false) {
            $this->db->table($this->table);
            $this->select('*');
            $this->join('masyarakat', 'pengaduan.nik = masyarakat.nik');
            $hasil = $this->get();
            return $hasil->getResultObject();
        } else {
            $this->db->table($this->table);
            $this->select('*');
            $this->join('masyarakat', 'pengaduan.nik = masyarakat.nik');
            $this->where($this->table . '.id_pengaduan', $id);
            $hasil = $this->get();
            return $hasil->getRowObject();
        }
    }

    public function countData($nik, $status = false)
    {
        if ($status == false) {
            return $this->query("SELECT COUNT(id_pengaduan) as total FROM pengaduan WHERE nik='$nik'")->getRowObject()->total;
        } else {
            return $this->query("SELECT COUNT(id_pengaduan) as total FROM pengaduan WHERE status='$status' && nik=$nik")->getRowObject()->total;
        }
    }

    public function Jumlah($nik, $status)
    {
        $this->db->table($this->table);
        $this->where('nik', $nik);
        $this->where('status', $status);
        $data = $this->get()->getRowObject();
        return $data;
    }

    public function getPengaduanNik($nik, $status = false)
    {
        if ($status == false) {
            $this->db->table($this->table);
            $this->select('*');
            $this->join('masyarakat', 'pengaduan.nik = masyarakat.nik');
            $this->where($this->table . '.nik', $nik);
            $hasil = $this->get();
            return $hasil->getResultObject();
        } else {
            $this->db->table($this->table);
            $this->select('*');
            $this->where($this->table . '.nik', $nik);
            $this->join('masyarakat', 'pengaduan.nik = masyarakat.nik');
            $this->where($this->table . '.status', $status);
            $hasil = $this->get();
            return $hasil->getResultObject();
        }
    }

    public function getDataByDateStatus($awal, $akhir, $status)
    {
        $this->db->table($this->table);
        $this->select('*');
        $this->join('masyarakat', 'pengaduan.nik = masyarakat.nik');
        $this->where($this->table . '.tgl_pengaduan >=', $awal);
        $this->where($this->table . '.tgl_pengaduan <=', $akhir);
        $this->where($this->table . '.status', $status);
        $hasil = $this->get();
        return $hasil->getResultObject();
    }

    public function getDataByDate($awal, $akhir)
    {
        $this->db->table($this->table);
        $this->select('*');
        $this->join('masyarakat', 'pengaduan.nik = masyarakat.nik');
        $this->where($this->table . '.tgl_pengaduan >=', $awal);
        $this->where($this->table . '.tgl_pengaduan <=', $akhir);
        $hasil = $this->get();
        return $hasil->getResultObject();
    }

    public function getDataByStatus($status)
    {
        $this->db->table($this->table);
        $this->select('*');
        $this->join('masyarakat', 'pengaduan.nik = masyarakat.nik');
        $this->where($this->table . '.status', $status);
        $hasil = $this->get();
        return $hasil->getResultObject();
    }
}
