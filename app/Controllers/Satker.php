<?php

namespace App\Controllers;

use App\Models\SatkerModel;
use App\Libraries\Modul;

class Satker extends BaseController
{
    
    private $model;
    private $modul;
    
    public function __construct() {
        $this->model = new SatkerModel();
        $this->modul = new Modul();
    }
    
    public function index() {
        $data['list'] = $this->model->findAll();
        return view('satker/index', $data);
    }

    public function tambah() {
        $data = array();
        return view('satker/tambah', $data);
    }

    public function create() {
        $data = array(
            'namasatker' => $this->request->getPost('nama')
        );
        if ($this->model->insert($data)) {
            $this->modul->pesan_halaman("Data tersimpan", "satker");
        }else{
            $this->modul->pesan_halaman("Data gagal tersimpan", "satker");
        }
    }

    public function ganti($id) {
        $data['list'] = $this->model->find($id);
        return view('satker/ganti', $data);
    }

    public function update() {
        $data = array(
            'namasatker' => $this->request->getPost('nama')
        );
        $idsatker = $this->request->getPost('id');
        if ($this->model->update($idsatker, $data)) {
            $this->modul->pesan_halaman("Data tersimpan", "satker");
        }else{
            $this->modul->pesan_halaman("Data gagal tersimpan", "satker");
        }
    }

    public function hapus($id = null){
        $data = $this->model->find($id);
        if (!$data) {
            $this->modul->pesan_halaman("Data tidak ditemukan", "satker");
        }else{
            if ($this->model->delete($id)) {
                $this->modul->pesan_halaman("Data terhapus", "satker");
            } else {
                $this->modul->pesan_halaman("Data gagal terhapus", "satker");
            }
        }
        
    }

}
