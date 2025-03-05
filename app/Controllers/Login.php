<?php

namespace App\Controllers;

use App\Libraries\Modul;
use App\Models\UserModel;

class Login extends BaseController
{
    
    private $modul;
    private $model;
    
    public function __construct() {
        $this->modul = new Modul();
        $this->model = new UserModel();
    }
    
    public function index() {
        $data = array();
        return view('index', $data);
    }

    public function proses()
    {
        // Validasi input
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek CSRF token
        if (!$this->validate(['csrf_token_name' => 'required'])) {
            //echo "CSRF Token tidak valid";
            return redirect()->back()->with('error', 'CSRF Token tidak valid');
        }else{
            // Cek user di database
            $user = $this->model->where('username', $username)->first();
            if ($user && password_verify($password, $user->password)) {
                session()->set([
                    'nama' => $username,
                    'logged' => true
                ]);
                return redirect()->to('/home')->with('success', 'Login berhasil');
            } else {
                return redirect()->back()->with('error', 'Username atau password salah');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logout berhasil');
    }

}
