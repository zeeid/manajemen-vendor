<?php

namespace App\Controllers\Api; //Nama Folder

use App\Controllers\BaseController;
use App\Models\SeserahanModel;

class Seserahan extends BaseController
{
    protected $SeserahanModel;
    public function __construct(){
        $this->SeserahanModel = new SeserahanModel();
    }
    public function index()
    {
        
    }

    public function simpan(){
        // dd("API SIMPAN VENDOR");
        $kode_pasangan = $this->session->get('kode_pasangan');

        $mode   = $this->request->getVar('mode');
        $id     = $this->request->getVar('id');
        
        // dd($this->request->getVar());

        if ($mode=='update') {
            $datanya = [
                'nama_barang'       => $this->request->getVar('nama_barang'),
                'harga_barang'      => $this->request->getVar('harga_barang'),
                'beli_dimana'       => $this->request->getVar('beli_dimana'),
            ];

            $simpan = $this->SeserahanModel->where('kode_pasangan', $kode_pasangan)
            ->where('id', $id)
            ->set($datanya)
            ->update();
            
        }else{
            $saiki          = date('Y-m-d H:i:s');
            $kode_vendor    = strtotime($saiki);

            $simpan = $this->SeserahanModel->save([
                'nama_barang'       => $this->request->getVar('nama_barang'),
                'harga_barang'      => $this->request->getVar('harga_barang'),
                'beli_dimana'       => $this->request->getVar('beli_dimana'),
                'kode_pasangan'     => $kode_pasangan,
            ]);
        }


        if ($simpan ==1) {
            $response = array(
                'status'    => 200, 
                'pesan'     => 'Berhasil menyimpan data Vendor !', 
            );
        }else{
            $response = array(
                'status'    => 201, 
                'pesan'     => 'Gagal menyimpan data Vendor !', 
            );
        }

        return json_encode($response);
    }

    public function listseserahan(){
        $kode_pasangan = $this->session->get('kode_pasangan');
        if ($kode_pasangan != '' || $kode_pasangan != null) {
            $listseserahan = $this->SeserahanModel->where('kode_pasangan', $kode_pasangan)->findAll();
    
            $data = [
                'listseserahan' => $listseserahan,
            ];
    
            return view('dashboard/tabel/tabel_seserahan',$data);
        }
    }

    public function hapusseserahan(){
        $kode_pasangan = $this->session->get('kode_pasangan');
        $id = $this->request->getVar('id');

        if ($kode_pasangan != '' || $kode_pasangan != null) {
            // cek dulu ada ngk
            $cek = $this->db->query("SELECT * from seserahan WHERE kode_pasangan='$kode_pasangan' AND id='$id'")->getNumRows();

            if ($cek > 0) {
                $hapus = $this->SeserahanModel
                ->where('kode_pasangan', $kode_pasangan)
                ->where('id', $id)
                ->delete();

                if ($hapus == 1) {
                    $response = array(
                        'status'    => 200, 
                        'pesan'     => 'Berhasil menghapus Seserahan', 
                    );
                }else{
                    $response = array(
                        'status'    => 201, 
                        'pesan'     => 'Gagal menghapus Seserahan', 
                    );
                    
                }
            }else{
                $response = array(
                    'status'    => 201, 
                    'pesan'     => 'Seserahan Tidak ditemukan untuk dihapus', 
                );

            }

            return json_encode($response);
        }
    }
}
