<?php

namespace App\Controllers;

use App\Models\PersonilModel;
use App\Models\KorpsModel;
use App\Models\SatkerModel;
use App\Models\PangkatModel;
use App\Libraries\Modul;

class Personil extends BaseController
{
    
    private $model;
    private $mKorps;
    private $mSatker;
    private $mpangkat;
    private $modul;
    
    public function __construct() {
        $this->model = new PersonilModel();
        $this->mKorps = new KorpsModel();
        $this->mSatker = new SatkerModel();
        $this->mpangkat = new PangkatModel();

        $this->modul = new Modul();
    }
    
    public function index() {
        $data['list'] = $this->model->tampilData();
        return view('personil/index', $data);
    }

    public function tambah() {
        $data['korps'] = $this->mKorps->findAll();
        $data['satker'] = $this->mSatker->findAll();
        $data['pangkat'] = $this->mpangkat->findAll();

        return view('personil/tambah', $data);
    }

    public function create() {
        $data = array(
            'nrp' => $this->request->getPost('nrp'),
            'nama' => $this->request->getPost('nama'),
            'idkorps' => $this->request->getPost('korps'),
            'idpangkat' => $this->request->getPost('pangkat'),
            'idsatker' => $this->request->getPost('satker'),
        );
        if ($this->model->insert($data)) {
            $this->modul->pesan_halaman("Data tersimpan", "personil");
        }else{
            $this->modul->pesan_halaman("Data gagal tersimpan", "personil");
        }
    }

    public function ganti($id) {
        $data['list'] = $this->model->find($id);
        return view('personil/ganti', $data);
    }

    public function update() {
        $data = array(
            'nrp' => $this->request->getPost('nrp'),
            'nama' => $this->request->getPost('nama'),
            'idkorps' => $this->request->getPost('korps'),
            'idpangkat' => $this->request->getPost('pangkat'),
            'idsatker' => $this->request->getPost('satker'),
        );
        $idpersonil = $this->request->getPost('id');
        if ($this->model->update($idpersonil, $data)) {
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
