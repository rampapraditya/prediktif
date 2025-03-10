<?php

namespace App\Controllers;

use App\Models\KorpsModel;
use App\Libraries\Modul;

class Contohajax extends BaseController
{
    
    private $model;
    private $modul;
    
    public function __construct() {
        $this->model = new KorpsModel();
        $this->modul = new Modul();
    }
    
    public function index() {
        $data['hasil'] = 0;
        return view('contoh/index', $data);
    }

    public function jumlah() {
        $bil1 = $this->request->getPost('bil1_php');
        $bil2 = $this->request->getPost('bil2_php');
        $hasil = $bil1 + $bil2;
        
        $data['hasil'] = $hasil;
        return view('contoh/index', $data);
    }

    public function ajax_get() {
        $bil1 = (int)$this->request->getGet('bil1');
        $bil2 = (int)$this->request->getGet('bil2');
        $hasil = $bil1 + $bil2;
        echo $hasil;
    }

}
