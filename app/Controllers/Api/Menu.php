<?php

namespace App\Controllers\Api; //Nama Folder

use App\Models\VendorModel;
use App\Models\PembayaranModel;
use App\Controllers\BaseController;

class Menu extends BaseController
{
    protected $VendorModel;
    protected $PembayaranModel;
    public function __construct(){
        $this->VendorModel = new VendorModel();
        $this->PembayaranModel = new PembayaranModel();
    }


    public function index()
    {
        $menunya    = $this->request->getVar('menu');

        if ($menunya == 'Vendor') {
            $data = [
                'judul' => $menunya
            ];
            return view('dashboard/vendor', $data);
        }
        elseif ($menunya == 'Tambah Vendor') {
            
            $kode_pasangan = $this->session->get('kode_pasangan');
            $id = $this->request->getVar('id');
            
            $listvendor = $this->VendorModel->where('kode_pasangan', $kode_pasangan)
            ->where('id', $id)
            ->first();;
            
            $data = [
                'judul'      => $menunya,
                'listvendor' => $listvendor,
            ];
            return view('dashboard/vendor_form', $data);
        }
        elseif ($menunya == 'Laporan') {
            // dd("LAPORAN");
            $kode_pasangan  = $this->session->get('kode_pasangan');

            $listvendor = $this->VendorModel->where('kode_pasangan', $kode_pasangan)->findAll();

            
            // dd($listvendor);
            $data_array = [];
            
            foreach ($listvendor as $key ) {
                $nama_vendor    = $key['nama_vendor'];
                $harga_vendor   = $key['harga_vendor'];
                $kode_vendor    = $key['kode_vendor'];
                
                $totalbayar     = $this->PembayaranModel->getTotalBayar($kode_vendor);
                
                $arrayName = array(
                    'nama_vendor'   => $nama_vendor, 
                    'harga_vendor'  => $harga_vendor, 
                    'totalbayar'    => $totalbayar, 
                );
                
                array_push($data_array,$arrayName);
            }

            // echo json_encode($data_array);


            $data = [
                'judul'         => $menunya,
                'datavendor'    => $data_array
            ];
            return view('dashboard/laporan', $data);
        }
        elseif ($menunya == 'Pembayaran') {
            
            $data = [
                'judul' => $menunya
            ];
            return view('dashboard/pembayaran_vendor', $data);
        }
        elseif ($menunya == 'Tambah Pembayaran Vendor') {
            
            $kode_pasangan = $this->session->get('kode_pasangan');
            // $id = $this->request->getVar('id');
            
            $listvendor = $this->VendorModel->where('kode_pasangan', $kode_pasangan)
            // ->where('id', $id)
            ->findAll();
            
            $data = [
                'judul'      => $menunya,
                'listvendor' => $listvendor,
            ];
            return view('dashboard/pembayaran_vendor_form', $data);
        }
        else{
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Menu tidak ditemukan !');
            $data = [
                'status'    => 201,
                'menu'      => $menunya,
                'pesan'     => 'Menu Tidak ditemukan !',
            ];

            dd($data);
        }
    }
}
