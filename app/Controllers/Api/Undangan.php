<?php

namespace App\Controllers\Api; //Nama Folder

use App\Models\VendorModel;
use App\Models\UndanganModel;
use CodeIgniter\Config\Services;
use App\Controllers\BaseController;
use App\Models\UndanganDesainModel;
use App\Models\UndanganGaleriModel;

class Undangan extends BaseController
{
    protected $VendorModel;
    protected $UndanganDesainModel;
    protected $UndanganGaleriModel;
    public function __construct(){
        $this->VendorModel = new UndanganModel();
        $this->UndanganDesainModel = new UndanganDesainModel();
        $this->UndanganGaleriModel = new UndanganGaleriModel();
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

    public function desain_undangan(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        $mode           = $this->request->getVar('mode');

        $validasi       = \Config\Services::validation();

        if ($mode=='background_musik') {
            $rulenya = [
                "kunciku" => "required",
                "mode" => "required",
                "$mode" => [
                    "rules"     => "max_size[$mode, 19024]|mime_in[$mode,audio/mpeg,audio/mpg,audio/mpeg3,audio/mp3]",
                    "errors"    => [
                        "max_size"  => "File Musik kebesaran",
                        "mime_in"   => "Bukan Musik MP3 Broo"
                    ]
                ],
            ];
        }else{
            $rulenya = [
                "kunciku" => "required",
                "mode" => "required",
                "$mode" => [
                    "rules"     => "max_size[$mode, 19024]|is_image[$mode]|mime_in[$mode,image/jpg,image/jpeg,image/png]",
                    "errors"    => [
                        "max_size"  => "Gambar kebesaran",
                        "is_image"  => "Bukan Gambar Broo",
                        "mime_in"   => "Bukan Gambar Broo"
                    ]
                ],
            ];
        }

        // dd($rulenya);

        if (!$this->validate($rulenya)) {
            // echo "TIDAK VALID";
            // dd("TDK VALIS");
            
            if(isset($validasi)){
                // $error_list = $validasi->listErrors();
                // $error_nama = ($validasi->hasError('nama')) ? 'is-invalid' : '';
                // $error_nama_detail = ($validasi->hasError('nama')) ? $validasi->getError('nama') : '';

                $error_kunciku = ($validasi->hasError('kunciku')) ? 'Token Habis Silahkan Reload Halaman' : '';
                $error_mode = ($validasi->hasError('mode')) ? 'Modenya apa ?' : '';
                $error_gambar = ($validasi->hasError($mode)) ? $validasi->getError($mode) : '';

                $data = array(
                    'status'    => 201,
                    'e_kunciku' => $error_kunciku, 
                    'e_mode'    => $error_mode, 
                    'e_gambar'  => $error_gambar, 
                    'pesan'     => 'ERROR UPLOAD FILE', 
                );
                return json_encode($data);
            }
            // return redirect()->to('/crud/tambah')->withInput();
        }

        // ============ SIMPAN FILE ===============
            $filenya    = $this->request->getFile($mode);

            // dd($filenya);
            // ==== CEK JIKA UPLOAD KOSONG ====
                if ($filenya->getError() == 4) {
                    // $namafile_random = 'default.jpg';
                    $data = array(
                        'status'    => 201,
                        'e_kunciku' => '-', 
                        'e_mode'    => '-', 
                        'e_gambar'  => '-', 
                        'pesan'     => 'FILE belum dipilih', 
                    );
                    return json_encode($data);
                }else{

                    // ==== generate Nama file random  ===
                    $namafile_random = $filenya->getRandomName();
                    // ==== PINDAH FILE KE FOLDER ===
                    $filenya->move('desain',$namafile_random);
        
                    // $filenya->move('img');
                    // ==== AMBIL NAMA FILE Kalau nama file seperti yg diupload ====
                    // $namafile   = $filenya->getName();
        
                    // dd($namafile);
                }
        // ============ SIMPAN FILE ===============

        $datanya = [
            $mode  => $namafile_random,
        ];

        // dd($datanya);

        $simpan = $this->UndanganDesainModel
        ->where('kode_pasangan', $kode_pasangan)
        ->set($datanya)
        ->update();

        if ($simpan) {
            $data = array(
                'status'    => 200,
                'e_kunciku' => '-', 
                'e_mode'    => '-', 
                'e_gambar'  => '-', 
                'pesan'     => 'BERHASIL UPDATE DATA', 
            );
            return json_encode($data);
        }else{
            $data = array(
                'status'    => 201,
                'e_kunciku' => '-', 
                'e_mode'    => '-', 
                'e_gambar'  => '-', 
                'pesan'     => 'GAGAL UPDATE DATA', 
            );
            return json_encode($data);
        }

    }

    public function UploadTest(){
        return view('dashboard/setting_undangan_galeri');
    }

    public function dropzone(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        // ============ SIMPAN FILE ===============
        $filenya    = $this->request->getFile('file');

        // dd($filenya);
        // ==== CEK JIKA UPLOAD KOSONG ====
            if ($filenya->getError() == 4) {
                // $namafile_random = 'default.jpg';
                $data = array(
                    'status'    => 400,
                    'e_kunciku' => '-', 
                    'e_mode'    => '-', 
                    'e_gambar'  => '-', 
                    'pesan'     => 'Gambar belum dipilih', 
                );
                echo json_encode($data);
            }else{
                
                // ==== generate Nama file random  ===
                $namafile_random = $filenya->getRandomName();
                // ==== PINDAH FILE KE FOLDER ===
                $filenya->move('galeri',$namafile_random);
                
                // $filenya->move('img');
                // ==== AMBIL NAMA FILE Kalau nama file seperti yg diupload ====
                // $namafile   = $filenya->getName();
                
                $datanya = [
                    'kode_pasangan' => $kode_pasangan,
                    'gambarnya'     => $namafile_random,
                ];
        
                // dd($datanya);
        
                // $simpan = $this->UndanganGaleriModel
                // ->where('kode_pasangan', $kode_pasangan)
                // ->set($datanya)
                // ->update();

                $simpan = $this->UndanganGaleriModel->save($datanya);
        
                if ($simpan) {
                    $data = array(
                        'status'    => 200,
                        'e_kunciku' => '-', 
                        'e_mode'    => '-', 
                        'e_gambar'  => '-', 
                        'pesan'     => 'BERHASIL Upload Galeri', 
                    );
                    return json_encode($data);
                }else{
                    $data = array(
                        'status'    => 400,
                        'e_kunciku' => '-', 
                        'e_mode'    => '-', 
                        'e_gambar'  => '-', 
                        'pesan'     => 'GAGAL Upload Galeri #DB', 
                    );
                    return json_encode($data);
                }
            }
    // ============ SIMPAN FILE ===============
    }

    public function listgaleri(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        if ($kode_pasangan != '' || $kode_pasangan != null) {
            $listgaleri = $this->UndanganGaleriModel->where('kode_pasangan', $kode_pasangan)->findAll();
    
            $data = [
                'listgaleri' => $listgaleri,
            ];
    
            return view('dashboard/tabel/tabel_galeri',$data);
        }
    }

    public function hapusgaleri(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        $id             = $this->request->getVar('id');

        if ($kode_pasangan != '' || $kode_pasangan != null) {
            $cek = $this->db->query("SELECT * from undangan_galeri WHERE kode_pasangan='$kode_pasangan' AND gambarnya='$id'")->getNumRows();

            if ($cek > 0) {
                $hapus = $this->UndanganGaleriModel
                ->where('kode_pasangan', $kode_pasangan)
                ->where('gambarnya', $id)
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

    public function upload_tamu(){
        $kode_pasangan  = $this->session->get('kode_pasangan');
        if ($kode_pasangan != '' || $kode_pasangan != null) {
            
        }
    }
}
