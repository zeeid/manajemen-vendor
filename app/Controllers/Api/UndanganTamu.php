<?php

namespace App\Controllers\Api; //Nama Folder

use App\Controllers\BaseController;
use App\Models\UndanganTamuModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// use PhpOffice\PhpSpreadsheet\Reader\Xls;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class UndanganTamu extends BaseController
{
    protected $UndanganTamuModel;
    // protected $Spreadsheet;
    public function __construct(){
        $this->UndanganTamuModel = new UndanganTamuModel();
        // $this->Spreadsheet = new Spreadsheet();
    }
    

    public function export(){
        $users = $this->UndanganTamuModel->findAll();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama')
            ->setCellValue('B1', 'Email')
            ->setCellValue('C1', 'Tanggal dibuat');

        $column = 2;

        foreach ($users as $user) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $user['name'])
                ->setCellValue('B' . $column, $user['email'])
                ->setCellValue('C' . $column, $user['created_at']);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His'). '-Data-User';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function simpanExcel(){
        $kode_pasangan  = $this->session->get('kode_pasangan');

        // dd($kode_pasangan);

        $file_excel = $this->request->getFile('file_tamu');
        $ext = $file_excel->getClientExtension();
        if($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();

        $no = 0;
        foreach($data as $x => $row) {
            if ($x == 0) {
                continue;
            }
            
            $nama_tamu      = $row[0];
            $alamat_tamu    = $row[1];
            $no_wa          = $row[2];

            $datax = [
                'kode_pasangan' => $kode_pasangan,
                'nama_tamu'     => $nama_tamu,
                'alamat_tamu'   => $alamat_tamu,
                'no_wa'         => $no_wa,
            ];

            $simpan = $this->UndanganTamuModel->save($datax);
            $no = $no+$simpan;
        }

        $dataz = array(
            'status' => 200, 
            'jumlah' => $no, 
            'pesan'  => 'Berhasil Upload Tamu Undangan', 
        );
        
        return json_encode($dataz);
    }

    public function tambah_tamu(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        $nama_tamu      = $this->request->getVar('nama_tamu');
        $alamat_tamu    = $this->request->getVar('alamat_tamu');
        $no_wa          = $this->request->getVar('no_wa');

        $datax = [
            'kode_pasangan' => $kode_pasangan,
            'nama_tamu'     => $nama_tamu,
            'alamat_tamu'   => $alamat_tamu,
            'no_wa'         => $no_wa,
        ];

        $simpan = $this->UndanganTamuModel->save($datax);

        if ($simpan) {
            $dataz = array(
                'status' => 200, 
                'jumlah' => 1, 
                'pesan'  => 'Berhasil Tambah Tamu Undangan', 
            );
        }else{
            $dataz = array(
                'status' => 400, 
                'jumlah' => 0, 
                'pesan'  => 'GAGAL Tambah Tamu Undangan', 
            );
        }

        return json_encode($dataz);
    }

    public function listtamu(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        
        if ($kode_pasangan != '' || $kode_pasangan != null) {
            $get_tamu   = $this->UndanganTamuModel->get_list_undangan($kode_pasangan);
    
            $data = [
                'listtamu' => $get_tamu,
            ];
    
            return view('dashboard/tabel/tabel_listtamu',$data);
        }

    }

    public function hapus_tamu(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        $id             = $this->request->getVar('id');

        if ($kode_pasangan != '' || $kode_pasangan != null) {
            $cek = $this->db->query("SELECT * from undangan_tamu WHERE kode_pasangan='$kode_pasangan' AND id='$id'")->getNumRows();

            if ($cek > 0) {
                $hapus = $this->UndanganTamuModel
                ->where('kode_pasangan', $kode_pasangan)
                ->where('id', $id)
                ->delete();

                if ($hapus == 1) {
                    $response = array(
                        'status'    => 200, 
                        'pesan'     => 'Berhasil menghapus Galeri', 
                    );
                }else{
                    $response = array(
                        'status'    => 201, 
                        'pesan'     => 'Gagal menghapus Galeri', 
                    );
                    
                }
            }else{
                $response = array(
                    'status'    => 201, 
                    'pesan'     => 'Galeri Tidak ditemukan untuk dihapus', 
                );

            }

            return json_encode($response);
        }
    }

}