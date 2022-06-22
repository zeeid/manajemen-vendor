<?php

namespace App\Models;

use CodeIgniter\Model;

class SeserahanModel extends Model
{
    // ...
    protected $table      = 'seserahan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_barang', 'harga_barang','beli_dimana','kode_pasangan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getseserahan($id = false){

        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(
            [
                'id'=>$id
            ]
        )->first();
    }
}