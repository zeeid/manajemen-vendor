<?php

namespace App\Models;

use CodeIgniter\Model;

class UndanganTamuModel extends Model
{
    // ...
    protected $table      = 'undangan_tamu';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode_pasangan', 'nama_tamu','alamat_tamu','no_wa'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function get_list_undangan($id = false){

        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(
            [
                'kode_pasangan'=>$id
            ]
        )
        ->orderBy('id', 'DESC')
        ->findAll();
        // ->first();
    }
}