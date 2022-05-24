<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    // ...
    protected $table      = 'vendor';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode_vendor', 'nama_vendor','harga_vendor','kode_pasangan','jenis_vendor'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getvendor($id = false){

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