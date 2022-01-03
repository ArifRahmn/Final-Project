<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $buku;
    function __construct()
    {
        $this->buku = new BukuModel();
    }
    public function index()
    {
        $data['pageTitle'] = 'Buku';
        $data['Bukuview'] = $this->buku->findAll();
        return view('buku/Bukuview', $data);




        //$bukuModel = new \App\Models\bukuModel();
        // $bukuModel = new bukuModel();


    }
    public function list()
    {
        $data['pageTitle'] = 'Daftar Buku';
        $data['daftarbuku'] = $this->buku->findAll();
        return view('buku/daftarbuku', $data);




        //$bukuModel = new \App\Models\bukuModel();
        // $bukuModel = new bukuModel();


    }

    public function detail($slug)
    {

        $data = [

            'buku' => $this->buku->getBuku($slug)
        ];
        $data['pageTitle'] = 'Informasi Buku';
        // Jika buku Tidak Ada di Label
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku' . $slug . ' tidak ditemukan.');
        }


        return view('buku/detail', $data);
    }

    public function create()
    {
        //session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        $data['pageTitle'] = 'Tambah Buku Baru';
        return view('buku/create', $data);
    }


    public function save()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[Buku.judul]',
                'errors' => [
                    'required' => '{field} Buku harus diisi',
                    'is_unique' => '{field} Buku sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jgp,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu gede',
                    'is_images' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Buku/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Buku/create')->withInput();
        }
        //ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        //apakah tidak ada gambar sampul
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {

            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->buku->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'kodebuku' => $this->request->getVar('kodebuku'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Buku Baru Berhasil Ditambahkan :D');

        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $buku = $this->buku->find($id);
        //cek jika file gambarnya default
        if ($buku['sampul'] != 'default.png') {

            //hapus gambar
            unlink('img/' . $buku['sampul']);
        }

        $this->buku->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus :)');
        return redirect()->to('/Buku');
    }

    public function edit($slug)
    {
        $data = [

            'validation' => \Config\Services::validation(),
            'buku' => $this->buku->getBuku($slug)
        ];
        $data['pageTitle'] = 'Ganti Data Buku';
        return view('Buku/edit', $data);
    }

    public function update($id)
    {
        //Cek judul
        $bukuLama = $this->buku->getBuku($this->request->getVar('slug'));
        if ($bukuLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[Buku.judul]';
        }


        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} Buku harus diisi',
                    'is_unique' => '{field} Buku sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jgp,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu gede',
                    'is_images' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/Buku/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $filesSampul = $this->request->getFile('sampul');

        //cek gambar,apakah tetap gambar lama
        if ($filesSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            //generate nama file random
            $namaSampul = $filesSampul->getRandomName();
            //pindahkan gambar
            $filesSampul->move('img', $namaSampul);
            //hapus file lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->buku->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'kodebuku' => $this->request->getVar('kodebuku'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah :)');

        return redirect()->to('/buku');
    }
}
