<?php

namespace App\Controllers;

use App\Models\KorpsModel;
use App\Libraries\Modul;

class Korps extends BaseController
{
    
    private $model;
    private $modul;
    
    public function __construct() {
        $this->model = new KorpsModel();
        $this->modul = new Modul();
    }
    
    public function index() {
        $data['list'] = $this->model->findAll();
        return view('korps/index', $data);
    }

    public function tambah() {
        $data = array();
        return view('korps/tambah', $data);
    }

    public function create() {
        $data = array(
            'namakorps' => $this->request->getPost('nama_korps')
        );
        if ($this->model->insert($data)) {
            $this->modul->pesan_halaman("Data tersimpan", "korps");
        }else{
            $this->modul->pesan_halaman("Data gagal tersimpan", "korps");
        }
    }

    public function ganti($id) {
        $data['list'] = $this->model->find($id);
        return view('korps/ganti', $data);
    }

    public function update() {
        $data = array(
            'namakorps' => $this->request->getPost('nama_korps')
        );
        $idkorps = $this->request->getPost('id');
        if ($this->model->update($idkorps, $data)) {
            $this->modul->pesan_halaman("Data tersimpan", "korps");
        }else{
            $this->modul->pesan_halaman("Data gagal tersimpan", "korps");
        }
    }

    public function hapus($id = null){
        $data = $this->model->find($id);
        if (!$data) {
            $this->modul->pesan_halaman("Data tidak ditemukan", "korps");
        }else{
            if ($this->model->delete($id)) {
                $this->modul->pesan_halaman("Data terhapus", "korps");
            } else {
                $this->modul->pesan_halaman("Data gagal terhapus", "korps");
            }
        }
        
    }

}
