<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Database;

class PembayaranModel extends Model
{
    // ...
    protected $table      = 'pembayaran_vendor';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['kode_vendor', 'kode_pasangan','jml_bayar','tgl_bayar','di_input_oleh'];

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

    public function getTotalBayar($kode_vendor){

        // return $kode_vendor;
        $session = session();

        $kode_pasangan  = $session->get('kode_pasangan');
        // $kode_vendor    = '1653443629';

        $db      = \Config\Database::connect();
        $builder = $db->table('pembayaran_vendor')
        ->selectSum('jml_bayar')
        ->where('kode_pasangan', $kode_pasangan)
        ->where('kode_vendor', $kode_vendor)
        ->get()
        ->getResultArray();

        $jml_bayar = $builder[0]['jml_bayar'];

        return $jml_bayar;
    }
}