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

    public function testmodel(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        $kode_vendor    = '1653443629';

        $db      = \Config\Database::connect();
        $builder = $db->table('pembayaran_vendor')
        // $query   = $builder->get()->getResultArray();
        ->selectSum('jml_bayar')
        ->where('kode_pasangan', $kode_pasangan)
        ->where('kode_vendor', $kode_vendor)
        ->get()
        ->getResultArray();
        
        echo $builder[0]['jml_bayar'];

        // dd($builder);
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
        $nama_user      = $this->session->get('nama_user');
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
                'di_input_oleh' => $nama_user,
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
        // $db      = \Config\Database::connect();
        $kode_pasangan  = $this->session->get('kode_pasangan');
        
        // $select = $this->PembayaranModel->where('kode_pasangan', $kode_pasangan)->findAll();
        $select  = $this->db->table('pembayaran_vendor')
        ->select('pembayaran_vendor.id AS id_pembayaran, pembayaran_vendor.*, vendor.*')
        ->where('pembayaran_vendor.kode_pasangan', $kode_pasangan)
        ->join('vendor', 'vendor.kode_vendor = pembayaran_vendor.kode_vendor')
        ->orderBy('pembayaran_vendor.created_at', 'DESC')
        ->get()
        ->getResultArray();

        // dd($select);

        $data = [
            'listbayar' => $select,
        ];

        // dd($data['listbayar']);

        return view('dashboard/tabel/tabel_pembayaran',$data);
    }

    public function hapusbayaran(){
        $kode_pasangan = $this->session->get('kode_pasangan');
        $id = $this->request->getVar('id');

        if ($kode_pasangan != '' || $kode_pasangan != null) {
            // cek dulu ada ngk
            $kuerinya = "SELECT * from pembayaran_vendor WHERE kode_pasangan='$kode_pasangan' AND id='$id'";
            $cek = $this->db->query($kuerinya)->getNumRows();

            if ($cek > 0) {
                $hapus = $this->PembayaranModel
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
                    'pesan'     => 'Pembayaran Vendor Tidak ditemukan untuk dihapus', 
                    'kueri'     => $kuerinya, 
                );

            }

            return json_encode($response);
        }
    }

}
