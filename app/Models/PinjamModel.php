<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table = "peminjaman";
    protected $useTimestamps = true;
    protected $allowedFields = ['kodebuku', 'slug', 'namapeminjam', 'tanggalpeminjaman', 'lamapeminjaman'];


    public function getPinjam($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
