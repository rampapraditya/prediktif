<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\Modul;

class Login extends BaseController
{
    
    private $model;
    private $modul;
    
    public function __construct() {
        $this->model = new UserModel();
        $this->modul = new Modul();
    }
    
    public function index() {
        return view('index');
    }

    public function proses(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!$this->validate(['csrf_token_name' => 'required'])) {
            $this->modul->pesan_halaman('Akses key salah', 'login');
        }else{
            $user = $this->model->where('username', $username)->first();
            if ($user && password_verify($password, $user->password)) {
                session()->set([
                    'nama' => $username,
                    'logged' => true
                ]);
                $this->modul->pesan_halaman('Login Sukses', 'home');
            } else {
                $this->modul->pesan_halaman('Username atau password salah', 'login');
            }
        }
    }

}
