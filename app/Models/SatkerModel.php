<?php
namespace App\Models;

use CodeIgniter\Model;

class SatkerModel extends Model {

    protected $table      = 'satker';
    protected $primaryKey = 'idsatker';

    protected $useAutoIncrement = true;
    protected $allowedFields    = ['idsatker', 'namasatker'];
    protected $returnType = 'object';

    // Opsional: Gunakan timestamps jika ingin mencatat waktu pembuatan/perubahan
    protected $useTimestamps = false;
}