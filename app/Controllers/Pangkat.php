<?php

namespace App\Controllers;

use App\Models\PangkatModel;
use App\Libraries\Modul;

class Pangkat extends BaseController
{
    private $model;
    private $modul;

    public function __construct() {
        $this->model = new PangkatModel();
        $this->modul = new Modul();
    }
    
    public function index() {
        $data['list'] = $this->model->findAll();
        return view('pangkat/index', $data);
    }

    public function tambah() {
        $data = array();
        return view('pangkat/tambah', $data);
    }

    public function create(){
        // inisialisasi data
        $data = array(
            'namapangkat' => $this->request->getPost('nama_pangkat')
        );
        // masukkan data ke dalam database
        if ($this->model->insert($data)) {
            $this->modul->pesan_halaman("Data tersimpan", "pangkat");
        }else{
            $this->modul->pesan_halaman("Data gagal tersimpan", "pangkat");
        }
    }

    public function ganti($id) {
        $data['list'] = $this->model->find($id);
        return view('pangkat/ganti', $data);
    }

    public function update() {
        $data = array(
            'namapangkat' => $this->request->getPost('nama_pangkat')
        );
        $idpangkat = $this->request->getPost('id');
        if ($this->model->update($idpangkat, $data)) {
            $this->modul->pesan_halaman("Data tersimpan", "pangkat");
        }else{
            $this->modul->pesan_halaman("Data gagal tersimpan", "pangkat");
        }
    }

    public function hapus($id = null){
        $data = $this->model->find($id);
        if (!$data) {
            $this->modul->pesan_halaman("Data tidak ditemukan", "pangkat");
        }else{
            if ($this->model->delete($id)) {
                $this->modul->pesan_halaman("Data terhapus", "pangkat");
            } else {
                $this->modul->pesan_halaman("Data gagal terhapus", "pangkat");
            }
        }
        
    }

}
