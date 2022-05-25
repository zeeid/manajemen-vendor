<?php

namespace App\Controllers\Api; //Nama Folder

use App\Models\VendorModel;
use App\Models\PembayaranModel;
use App\Controllers\BaseController;

class Pembayaran extends BaseController
{
    protected $PembayaranModel;
    public function __construct(){
        $this->PembayaranModel = new PembayaranModel();
    }
    public function index()
    {
        
    }

    public function cekterbayar(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        $kode_vendor    = $this->request->getVar('kode_vendor');

        $builder = $this->db->table('pembayaran_vendor');
        $cek = $builder->selectSum('jml_bayar')
        ->where('kode_pasangan', $kode_pasangan)
        ->where('kode_vendor', $kode_vendor)
        ->get()->getResultArray();
        

        // $cek = $this->db->query("SELECT SUM(jml_bayar) as jml_bayar from pembayaran_vendor WHERE kode_pasangan='MASTER911' AND kode_vendor='1653443629' ")->getResultArray();;

        $jml_bayar = $cek[0]['jml_bayar'];
        if ($jml_bayar == NULL) {
            $jml_bayar = 0;
        }
        
        $data = [
            'jml_bayar'     => $jml_bayar,
        ];
        
        return json_encode($data);
    }

    public function bayarvendor(){
        $validation =  \Config\Services::validation();

        $kode_pasangan  = $this->session->get('kode_pasangan');
        $kode_vendor    = $this->request->getVar('kode_vendor');
        $jml_bayar      = $this->request->getVar('jml_bayar');
        $tgl_bayar      = $this->request->getVar('tgl_bayar');

        if (!$this->validate([
            'jml_bayar'     => 'required|numeric',
            'kode_vendor'   => 'required',
        ])) {
            $errors = $validation->getErrors();

            $response = array(
                'status'    => 500, 
                'Pesan'     => 'Silahkan Cek Inputan Kembali', 
                'data'      => $errors
            );
        }else{
            $data =[
                'kode_pasangan' => $kode_pasangan,
                'kode_vendor'   => $kode_vendor,
                'jml_bayar'     => $jml_bayar,
                'tgl_bayar'     => $tgl_bayar,
            ];
            $simpan = $this->PembayaranModel->save($data);

            if ($simpan ==1) {
                $response = array(
                    'status'    => 200, 
                    'pesan'     => 'Berhasil menyimpan data Pembayaran !', 
                    'data'      => '-'

                );
            }else{
                $response = array(
                    'status'    => 201, 
                    'pesan'     => 'Berhasil menyimpan data Pembayaran !', 
                    'data'      => '-'
                );
            }
    
        }
        return json_encode($response);
    }

    public function listbayar(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        
        $select = $this->PembayaranModel->where('kode_pasangan', $kode_pasangan)->findAll();

        $data = [
            'listbayar' => $select,
        ];

        return view('dashboard/tabel/tabel_pembayaran',$data);
    }

}
