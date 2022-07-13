<?php

namespace App\Models;

use CodeIgniter\Model;

class UndanganDesainModel extends Model
{
    // ...
    protected $table      = 'undangan_desain';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'kode_pasangan',
        'cover_depan',
        'hiasan_depan',
        'cover_dalam',
        'logo_depan',
        'hiasan_atas',
        'hiasan_bawah',
        'pengantin_p',
        'pengantin_w',
        'background_musik',
        
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function get_undangan_desain_model($id = false){

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