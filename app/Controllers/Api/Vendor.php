<?php

namespace App\Controllers\Api; //Nama Folder

use App\Controllers\BaseController;
use App\Models\VendorModel;

class Vendor extends BaseController
{
    protected $VendorModel;
    public function __construct(){
        $this->VendorModel = new VendorModel();
    }
    public function index()
    {
        
    }

    public function simpan(){
        // dd("API SIMPAN VENDOR");
        $kode_pasangan = $this->session->get('kode_pasangan');

        $mode   = $this->request->getVar('mode');
        $id     = $this->request->getVar('id');

        if ($mode=='update') {
            $datanya = [
                'jenis_vendor'      => $this->request->getVar('jenis_vendor'),
                'nama_vendor'       => $this->request->getVar('nama_vendor'),
                'harga_vendor'      => $this->request->getVar('harga_vendor'),
            ];

            $simpan = $this->VendorModel->where('kode_pasangan', $kode_pasangan)
            ->where('id', $id)
            ->set($datanya)
            ->update();
            
        }else{

            $simpan = $this->VendorModel->save([
                'jenis_vendor'      => $this->request->getVar('jenis_vendor'),
                'nama_vendor'       => $this->request->getVar('nama_vendor'),
                'harga_vendor'      => $this->request->getVar('harga_vendor'),
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

    public function listvendor(){
        $kode_pasangan = $this->session->get('kode_pasangan');
        if ($kode_pasangan != '' || $kode_pasangan != null) {
            $listvendor = $this->VendorModel->where('kode_pasangan', $kode_pasangan)->findAll();
    
            $data = [
                'listvendor' => $listvendor,
            ];
    
            return view('dashboard/tabel/tabel_vendor',$data);
        }
    }

    public function hapusvendor(){
        $kode_pasangan = $this->session->get('kode_pasangan');
        $id = $this->request->getVar('id');

        if ($kode_pasangan != '' || $kode_pasangan != null) {
            // cek dulu ada ngk
            $cek = $this->db->query("SELECT * from vendor WHERE kode_pasangan='$kode_pasangan' AND id='$id'")->getNumRows();

            if ($cek > 0) {
                $hapus = $this->VendorModel
                ->where('kode_pasangan', $kode_pasangan)
                ->where('id', $id)
                ->delete();

                if ($hapus == 1) {
                    $response = array(
                        'status'    => 200, 
                        'pesan'     => 'Berhasil menghapus vendor', 
                    );
                }else{
                    $response = array(
                        'status'    => 201, 
                        'pesan'     => 'Gagal menghapus vendor', 
                    );
                    
                }
            }else{
                $response = array(
                    'status'    => 201, 
                    'pesan'     => 'Vendor Tidak ditemukan untuk dihapus', 
                );

            }

            return json_encode($response);
        }
    }
}
