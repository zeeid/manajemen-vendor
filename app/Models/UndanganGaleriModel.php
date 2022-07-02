<?php

namespace App\Models;

use CodeIgniter\Model;

class UndanganGaleriModel extends Model
{
    // ...
    protected $table      = 'undangan_galeri';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'kode_pasangan',
        'gambarnya',
        
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function get_undangan_galeri_model($id = false){

        // if ($id == false) {
        //     return $this->findAll();
        // }

        return $this->where(
            [
                'id'=>$id
            ]
        )->findAll();
    }
}