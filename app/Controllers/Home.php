<?php

namespace App\Controllers;

use App\Libraries\Modul;

class Home extends BaseController
{
    private $modul;
    
    public function __construct() {
        $this->modul = new Modul();
    }

    public function index(){
        if(session()->get('logged')){
            return view('content/index');
        }else{
            $this->modul->halaman('login');
        }
        
    }
}
