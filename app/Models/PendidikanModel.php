<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model {

    protected $table      = 'pendidikan_formal';
    protected $primaryKey = 'idpendformal';

    protected $useAutoIncrement = true;
    protected $allowedFields    = ['idpendformal', 'idpersonil', 'namasekolah', 'tahun'];
    protected $returnType = 'object';

    // Opsional: Gunakan timestamps jika ingin mencatat waktu pembuatan/perubahan
    protected $useTimestamps = false;
    
    
}
