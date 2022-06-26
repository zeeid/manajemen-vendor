<?php

namespace App\Models;

use CodeIgniter\Model;

class UndanganModel extends Model
{
    // ...
    protected $table      = 'undangan_setting';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'kode_pasangan',
        'slug',
        'nama_lengkap_pp',
        'nama_lengkap_pw',
        'nama_ayah_pp',
        'nama_ibu_pp',
        'nama_ayah_pw',
        'nama_ibu_pw',
        'kata_pembukaan',
        'tgl_akad',
        'tempat_akad',
        'alamat_akad',
        'waktu_akad',
        'tgl_resepsi',
        'waktu_resepsi',
        'tempat_resepsi',
        'alamat_resepsi',
        'nama_map',
        'alamat_map',
        
        'link_map',
        'ucapan_kado',
        'no_rek_1',
        'type_rekening_1',
        'nama_rek_1',
        'no_rek_2',
        'type_rekening_2',
        'nama_rek_2',
        'pesan_cerita'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function get_undangan_model($id = false){

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