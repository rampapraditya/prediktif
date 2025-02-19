<?php

namespace App\Models;

use CodeIgniter\Model;

class KorpsModel extends Model {

    protected $table      = 'korps';
    protected $primaryKey = 'idkorps';

    protected $useAutoIncrement = true;
    protected $allowedFields    = ['idkorps', 'namakorps'];
    protected $returnType = 'object';

    // Opsional: Gunakan timestamps jika ingin mencatat waktu pembuatan/perubahan
    protected $useTimestamps = false;
    
    public function contohJoin()
    {
        return $this->select('posts.*, users.name, users.email')
                    ->join('users', 'users.id = posts.user_id', 'left')
                    ->findAll();
    }
}
