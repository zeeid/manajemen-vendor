<?php

namespace App\Controllers\Api; //Nama Folder

use App\Models\VendorModel;
use App\Controllers\BaseController;

class Menu extends BaseController
{
    protected $VendorModel;
    public function __construct(){
        $this->VendorModel = new VendorModel();
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
