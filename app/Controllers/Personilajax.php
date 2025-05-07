<?php

namespace App\Controllers;

use App\Models\PersonilModel;
use App\Models\KorpsModel;
use App\Models\SatkerModel;
use App\Models\PangkatModel;
use App\Models\PendidikanModel;
use App\Libraries\Modul;

class Personilajax extends BaseController
{
    
    private $model;
    private $mKorps;
    private $mSatker;
    private $mpangkat;
    private $pendidikan;
    private $modul;
    
    public function __construct() {
        $this->model = new PersonilModel();
        $this->mKorps = new KorpsModel();
        $this->mSatker = new SatkerModel();
        $this->mpangkat = new PangkatModel();
        $this->pendidikan = new PendidikanModel();

        $this->modul = new Modul();
    }
    
    public function index() {
        $data['korps'] = $this->mKorps->findAll();
        $data['satker'] = $this->mSatker->findAll();
        $data['pangkat'] = $this->mpangkat->findAll();

        return view('personil_ajax/index', $data);
    }

    public function ajaxlist() {
        $data = array();
        $list = $this->model->tampilData();
        $no = 1;
        foreach ($list as $row) {
            $val = array();
            $val[] = $no;
            $val[] = $row->nrp;
            $val[] = $row->nama;
            $val[] = $row->namakorps;
            $val[] = $row->namapangkat;
            $val[] = $row->namasatker;
            $val[] = '<button type="button" class="btn btn-sm btn-primary" onclick="ganti(' . "'" . $row->idpersonil . "'" . ');">Ganti</button>
                      <button type="button" class="btn btn-sm btn-danger" onclick="hapus(' . "'" . $row->idpersonil . "'" . ',' . "'" . $row->nama . "'" . ');">Hapus</button>
                      <button type="button" class="btn btn-sm btn-info" onclick="pendformal(' . "'" . $row->idpersonil . "'" . ');">Pend Formal</button>';
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
            'idsatker' => $this->request->getPost('satker')
        );
        if ($this->model->insert($data)) {
            echo json_encode(array("status" => "Data tersimpan"));
        }else{
            echo json_encode(array("status" => "Data gagal tersimpan"));
        }
    }

    public function show($id) {
        $list = $this->model->find($id);
        echo json_encode($list);
    }

    public function ajax_edit() {
        $data = array(
            'nrp' => $this->request->getPost('nrp'),
            'nama' => $this->request->getPost('nama'),
            'idkorps' => $this->request->getPost('korps'),
            'idpangkat' => $this->request->getPost('pangkat'),
            'idsatker' => $this->request->getPost('satker'),
        );
        $idpersonil = $this->request->getPost('kode');
        if ($this->model->update($idpersonil, $data)) {
            echo json_encode(array("status" => "Data tersimpan"));
        }else{
            echo json_encode(array("status" => "Data gagal tersimpan"));
        }
    }

    public function hapus($id = null){
        if ($this->model->delete($id)) {
            echo json_encode(array("status" => "Data terhapus"));
        } else {
            echo json_encode(array("status" => "Data gagal terhapus"));
        }
    }

    public function detil($id = null) {
        $data['head'] = $this->model->find($id);
        return view('personil_ajax/detil', $data);
    }

    public function ajaxpendidikan($id = null) {
        $data = array();
        $list = $this->pendidikan->find($id);
        $no = 1;
        foreach ($list as $row) {
            $val = array();
            $val[] = $no;
            $val[] = $row->namasekolah;
            $val[] = $row->tahun;
            $val[] = '<button type="button" class="btn btn-sm btn-primary" onclick="ganti(' . "'" . $row->idpendformal . "'" . ');">Ganti</button>
                      <button type="button" class="btn btn-sm btn-danger" onclick="hapus(' . "'" . $row->idpendformal . "'" . ',' . "'" . $no . "'" . ');">Hapus</button>';
            $data[] = $val;
            $no++;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }
}
