<?php

namespace App\Controllers;

use App\Models\Mcustom;

class Pangkat extends BaseController
{
    private $mcustom;
    
    public function __construct() {
        $this->mcustom = new Mcustom();
    }
    
    public function index() {
        $data['list'] = $this->mcustom->getAll("pengkat");
        return view('pangkat/index', $data);
    }
}
