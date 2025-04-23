<?php

namespace App\Controllers;

use App\Models\PersonilModel;
use App\Models\KorpsModel;
use App\Models\SatkerModel;
use App\Models\PangkatModel;
use App\Libraries\Modul;

class Personilajax extends BaseController
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
        $data = array();
        return view('personil_ajax/index', $data);
    }

    public function ajaxlist() {
        $data = array();
        $no = 1;
        $list = $this->model->tampilData();
        foreach ($list as $row) {
            $val = array();
            $val[] = $no;
            $val[] = $row->nrp;
            $val[] = $row->nama;
            $val[] = $row->namakorps;
            $val[] = $row->namapangkat;
            $val[] = $row->namasatker;
            $val[] = '<div style="text-align:center; width:100%;"><div class="btn-group" role="group">'
                . '<button type="button" class="btn btn-sm btn-info" onclick="ganti(' . "'" . $row->nrp . "'" . ')">Ganti</button>'
                . '<button type="button" class="btn btn-sm btn-danger" onclick="hapus(' . "'" . $row->nrp . "'" . ',' . "'" . $row->nama . "'" . ')">Hapus</button>'
                . '</div></div>';
            
            $data[] = $val;

            $no++;
        }
        $output = array("data" => $data);
        echo json_encode($output);
        
    }

    public function ajax_add() {
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

    public function show($id) {
        $data['list'] = $this->model->find($id);
        return view('personil/ganti', $data);
    }

    public function ajax_edit() {
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
