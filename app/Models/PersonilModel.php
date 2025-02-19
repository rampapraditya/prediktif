<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonilModel extends Model {

    protected $table      = 'personil';
    protected $primaryKey = 'idpersonil';

    protected $useAutoIncrement = true;
    protected $allowedFields    = ['idpersonil', 'nrp', 'nama', 'idkorps', 'idpangkat', 'idsatker'];
    protected $returnType = 'object';

    // Opsional: Gunakan timestamps jika ingin mencatat waktu pembuatan/perubahan
    protected $useTimestamps = false;
    
    public function tampilData()
    {
        return $this->select('personil.*, korps.namakorps, pengkat.namapangkat, satker.namasatker')
                    ->join('korps', 'personil.idkorps = korps.idkorps', 'left')
                    ->join('pengkat', 'pengkat.idpangkat = personil.idpangkat', 'left')
                    ->join('satker', 'satker.idsatker = personil.idsatker', 'left')
                    ->findAll();
    }
}
