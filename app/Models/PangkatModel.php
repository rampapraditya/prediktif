<?php
namespace App\Models;

use CodeIgniter\Model;

class PangkatModel extends Model {

    protected $table      = 'pengkat';
    protected $primaryKey = 'idpangkat';

    protected $useAutoIncrement = true;
    protected $allowedFields    = ['idpangkat', 'namapangkat'];
    protected $returnType = 'object';

    // Opsional: Gunakan timestamps jika ingin mencatat waktu pembuatan/perubahan
    protected $useTimestamps = false;
}