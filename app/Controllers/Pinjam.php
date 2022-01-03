<?php

namespace App\Controllers;

use App\Models\PinjamModel;

class Pinjam extends BaseController
{
    protected $pinjam;
    function __construct()
    {
        $this->pinjam = new PinjamModel();
    }
    public function index()
    {
        $data['pageTitle'] = 'Penyewaan Buku';
        $data['Pinjamview'] = $this->pinjam->findAll();
        return view('pinjam/Pinjamview', $data);




        //$pinjamModel = new \App\Models\pinjamModel();
        // $pinjamModel = new pinjamModel();


    }

    public function create()
    {
        //session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        $data['pageTitle'] = 'Tambah Data Peminjam';
        return view('pinjam/create', $data);
    }

    public function save()
    {




        $slug = url_title($this->request->getVar('kodebuku'), '-', true);
        $this->pinjam->save([
            'kodebuku' => $this->request->getVar('kodebuku'),
            'slug' => $slug,
            'namapeminjam' => $this->request->getVar('namapeminjam'),
            'tanggalpeminjaman' => $this->request->getVar('tanggalpeminjaman'),
            'lamapeminjaman' => $this->request->getVar('lamapeminjaman'),

        ]);

        session()->setFlashdata('pesan', 'Peminjam Berhasil Ditambahkan :D');

        return redirect()->to('/pinjam');
    }

    public function delete($id)
    {

        $this->pinjam->delete($id);
        session()->setFlashdata('pesan', 'Buku Sudah Dikembalikan :D');
        return redirect()->to('/Pinjam');
    }

    public function edit($slug)
    {
        $data = [

            'validation' => \Config\Services::validation(),
            'pinjam' => $this->pinjam->getPinjam($slug)
        ];
        $data['pageTitle'] = 'Ganti Data Peminjam';
        return view('Pinjam/edit', $data);
    }

    public function update($id)
    {
        //Cek judul
        $pinjamLama = $this->pinjam->getPinjam($this->request->getVar('slug'));
        if ($pinjamLama['kodebuku'] == $this->request->getVar('kodebuku')) {
            $rule_kodebuku = 'required';
        } else {
            $rule_kodebuku = 'required|is_unique[peminjaman.kodebuku]';
        }


        if (!$this->validate([
            'kodebuku' => [
                'rules' => $rule_kodebuku,
                'errors' => [
                    'required' => '{field} Kode Buku harus diisi',
                ]
            ]
        ])) {
            return redirect()->to('/Pinjam/edit/' . $this->request->getVar('slug'))->withInput();
        }




        $slug = url_title($this->request->getVar('kodebuku'), '-', true);
        $this->pinjam->save([
            'id' => $id,
            'kodebuku' => $this->request->getVar('kodebuku'),
            'slug' => $slug,
            'namapeminjam' => $this->request->getVar('namapeminjam'),
            'tanggalpeminjaman' => $this->request->getVar('tanggalpeminjaman'),
            'lamapeminjaman' => $this->request->getVar('lamapeminjaman'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah :)');

        return redirect()->to('/pinjam');
    }
}
