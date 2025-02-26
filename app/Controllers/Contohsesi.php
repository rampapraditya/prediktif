<?php

namespace App\Controllers;

use App\Libraries\Modul;

class Contohsesi extends BaseController
{
    private $modul;

    public function __construct() {
        $this->modul = new Modul();
    }

    public function index() {
        return view('login');
    }

    public function home() {
        if(session()->get('logged')){
            // menampilkan data sesi
            $data['username'] = session()->get('nama');

            return view('home', $data);
        }else{
            $this->modul->halaman('contohsesi');
        }
    }

    public function ceklogin(){
        // simpan data sesi
        session()->set([
            'nama' => $this->request->getPost('username'),
            'logged' => true
        ]);
        $this->modul->halaman('contohsesi/home');
    }

    public function hapussesi(){
        // menghapus data sesi
        session()->destroy();
        $this->modul->halaman('contohsesi');
    }

}
