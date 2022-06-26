<?php

namespace App\Controllers\Api; //Nama Folder

use App\Controllers\BaseController;
use App\Models\UndanganModel;
use App\Models\VendorModel;

class Undangan extends BaseController
{
    protected $VendorModel;
    public function __construct(){
        $this->VendorModel = new UndanganModel();
    }
    
    public function setting_undangan(){
        // echo json_encode($this->request->getVar());

        $kode_pasangan = $this->session->get('kode_pasangan');

        $mode   = $this->request->getVar('mode');
        $id     = $this->request->getVar('id');

        if ($mode=='update') {
            $datanya = [
                'slug'              => $this->request->getVar('slug'),
                'nama_lengkap_pw'   => $this->request->getVar('nama_lengkap_pw'),
                'nama_lengkap_pp'   => $this->request->getVar('nama_lengkap_pp'),
                
                'nama_ayah_pp'      => $this->request->getVar('nama_ayah_pp'),
                'nama_ibu_pp'       => $this->request->getVar('nama_ibu_pp'),
                'nama_ayah_pw'      => $this->request->getVar('nama_ayah_pw'),
                'nama_ibu_pw'       => $this->request->getVar('nama_ibu_pw'),
                'kata_pembukaan'    => $this->request->getVar('kata_pembukaan'),
                'tgl_akad'          => $this->request->getVar('tgl_akad'),
                'tempat_akad'       => $this->request->getVar('tempat_akad'),
                'alamat_akad'       => $this->request->getVar('alamat_akad'),
                'waktu_akad'        => $this->request->getVar('waktu_akad'),
                'tgl_resepsi'       => $this->request->getVar('tgl_resepsi'),
                'waktu_resepsi'     => $this->request->getVar('waktu_resepsi'),
                'tempat_resepsi'    => $this->request->getVar('tempat_resepsi'),
                'alamat_resepsi'    => $this->request->getVar('alamat_resepsi'),
                'nama_map'          => $this->request->getVar('nama_map'),
                'alamat_map'        => $this->request->getVar('alamat_map'),
                'link_map'          => $this->request->getVar('link_map'),
                'ucapan_kado'       => $this->request->getVar('ucapan_kado'),
                'no_rek_1'          => $this->request->getVar('no_rek_1'),
                'type_rekening_1'   => $this->request->getVar('type_rekening_1'),
                'nama_rek_1'        => $this->request->getVar('nama_rek_1'),
                'no_rek_2'          => $this->request->getVar('no_rek_2'),
                'type_rekening_2'   => $this->request->getVar('type_rekening_2'),
                'nama_rek_2'        => $this->request->getVar('nama_rek_2'),
                'pesan_cerita'      => $this->request->getVar('pesan_cerita'),
            ];

            $simpan = $this->VendorModel->where('kode_pasangan', $kode_pasangan)
            ->where('id', $id)
            ->set($datanya)
            ->update();
            
        }else{
            $saiki          = date('Y-m-d H:i:s');

            $simpan = $this->VendorModel->save([
                'kode_pasangan'     => $kode_pasangan,
                'slug'              => $this->request->getVar('slug'),
                'nama_lengkap_pw'   => $this->request->getVar('nama_lengkap_pw'),
                'nama_lengkap_pp'   => $this->request->getVar('nama_lengkap_pp'),
                
                'nama_ayah_pp'      => $this->request->getVar('nama_ayah_pp'),
                'nama_ibu_pp'       => $this->request->getVar('nama_ibu_pp'),
                'nama_ayah_pw'      => $this->request->getVar('nama_ayah_pw'),
                'nama_ibu_pw'       => $this->request->getVar('nama_ibu_pw'),
                'kata_pembukaan'    => $this->request->getVar('kata_pembukaan'),
                'tgl_akad'          => $this->request->getVar('tgl_akad'),
                'tempat_akad'       => $this->request->getVar('tempat_akad'),
                'alamat_akad'       => $this->request->getVar('alamat_akad'),
                'waktu_akad'        => $this->request->getVar('waktu_akad'),
                'tgl_resepsi'       => $this->request->getVar('tgl_resepsi'),
                'waktu_resepsi'     => $this->request->getVar('waktu_resepsi'),
                'tempat_resepsi'    => $this->request->getVar('tempat_resepsi'),
                'alamat_resepsi'    => $this->request->getVar('alamat_resepsi'),
                'nama_map'          => $this->request->getVar('nama_map'),
                'alamat_map'        => $this->request->getVar('alamat_map'),
                'link_map'          => $this->request->getVar('link_map'),
                'ucapan_kado'       => $this->request->getVar('ucapan_kado'),
                'no_rek_1'          => $this->request->getVar('no_rek_1'),
                'type_rekening_1'   => $this->request->getVar('type_rekening_1'),
                'nama_rek_1'        => $this->request->getVar('nama_rek_1'),
                'no_rek_2'          => $this->request->getVar('no_rek_2'),
                'type_rekening_2'   => $this->request->getVar('type_rekening_2'),
                'nama_rek_2'        => $this->request->getVar('nama_rek_2'),
                'pesan_cerita'      => $this->request->getVar('pesan_cerita'),
                
                
            ]);
        }

        if ($simpan ==1) {
            $response = array(
                'status'    => 200, 
                'pesan'     => 'Berhasil menyimpan data Undangan !', 
            );
        }else{
            $response = array(
                'status'    => 201, 
                'pesan'     => 'Gagal menyimpan data Undangan !', 
            );
        }

        return json_encode($response);
    }
}
