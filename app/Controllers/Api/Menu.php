<?php

namespace App\Controllers\Api; //Nama Folder

use App\Controllers\BaseController;

class Menu extends BaseController
{
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
            $data = [
                'judul' => $menunya
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
