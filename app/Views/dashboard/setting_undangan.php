<style>
    .huruf_besar {
        text-transform: capitalize;
    }
</style>

<?php 
    // dd($data_setting_undangan);
?>

<div class="row" style="margin-top: -25px!important;">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Form <?= $judul ?></h5>
            </div>
            <div class="card-body">
                <form id="form_setting_undangan" >
                    <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <h5><u>Setting Nama Pengantin</u></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Nama Pengantin Wanita</label>
                                <input required type="text" placeholder="Nama Pengantin Wanita" id="nama_lengkap_pw" class="form-control huruf_besar" name="nama_lengkap_pw" value="<?php if(isset($data_setting_undangan['nama_lengkap_pw'])){echo $data_setting_undangan['nama_lengkap_pw'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Nama Ayah Pw</label>
                                <input required type="text" placeholder="Nama Ayah Pw" id="nama_ayah_pw" class="form-control huruf_besar" name="nama_ayah_pw" value="<?php if(isset($data_setting_undangan['nama_ayah_pw'])){echo $data_setting_undangan['nama_ayah_pw'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Nama Ibu Pw</label>
                                <input required type="text" placeholder="Nama Ibu Pw" id="nama_ibu_pw" class="form-control huruf_besar" name="nama_ibu_pw" value="<?php if(isset($data_setting_undangan['nama_ibu_pw'])){echo $data_setting_undangan['nama_ibu_pw'];} ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Nama Pengantin Pria</label>
                                <input required type="text" placeholder="Nama Pengantin Pria" id="nama_lengkap_pp" class="form-control huruf_besar" name="nama_lengkap_pp" value="<?php if(isset($data_setting_undangan['nama_lengkap_pp'])){echo $data_setting_undangan['nama_lengkap_pp'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Nama Ayah PP</label>
                                <input required type="text" placeholder="Nama Ayah PP" id="nama_ayah_pp" class="form-control huruf_besar" name="nama_ayah_pp" value="<?php if(isset($data_setting_undangan['nama_ayah_pp'])){echo $data_setting_undangan['nama_ayah_pp'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Nama Ibu PP</label>
                                <input required type="text" placeholder="Nama Ibu PP" id="nama_ibu_pp" class="form-control huruf_besar" name="nama_ibu_pp" value="<?php if(isset($data_setting_undangan['nama_ibu_pp'])){echo $data_setting_undangan['nama_ibu_pp'];} ?>">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Slug / Url</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="slug" class="form-control" placeholder="habibi - ainun" name="slug" value="<?php if(isset($data_setting_undangan['slug'])){echo $data_setting_undangan['slug'];} ?>">
                                    <small id="emailHelp" ><?= base_url(); ?>/ <b>habibi-ainun</b> / $nama-tamu</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Kata Pembukaan</label>
                                <div class="col-sm-10">
                                    <textarea required type="text" placeholder="Contoh: Puji Syukur atas karunia .............." id="kata_pembukaan" class="form-control readonlyc" name="kata_pembukaan" rows="2"><?php if(isset($data_setting_undangan['kata_pembukaan'])){echo $data_setting_undangan['kata_pembukaan'];} ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <h5><u>Settting Tanggal Pernikahan</u></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Tanggal Akad</label>
                                <input required type="date" id="tgl_akad" class="form-control" name="tgl_akad" value="<?php if(isset($data_setting_undangan['tgl_akad'])){echo $data_setting_undangan['tgl_akad'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Waktu Akad</label>
                                <input required type="text" id="waktu_akad" class="form-control" name="waktu_akad" value="<?php if(isset($data_setting_undangan['waktu_akad'])){echo $data_setting_undangan['waktu_akad'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Tempat Akad</label>
                                <input required type="text" id="tempat_akad" class="form-control" name="tempat_akad" value="<?php if(isset($data_setting_undangan['tempat_akad'])){echo $data_setting_undangan['tempat_akad'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Alamat Akad</label>
                                <input required type="text" id="alamat_akad" class="form-control" name="alamat_akad" value="<?php if(isset($data_setting_undangan['alamat_akad'])){echo $data_setting_undangan['alamat_akad'];} ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Tanggal Resepsi</label>
                                <input required type="date" id="tgl_resepsi" class="form-control" name="tgl_resepsi" value="<?php if(isset($data_setting_undangan['tgl_resepsi'])){echo $data_setting_undangan['tgl_resepsi'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Waktu Resepsi</label>
                                <input required type="text" id="waktu_resepsi" class="form-control" name="waktu_resepsi" value="<?php if(isset($data_setting_undangan['waktu_resepsi'])){echo $data_setting_undangan['waktu_resepsi'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Tempat Resepsi</label>
                                <input required type="text" id="tempat_resepsi" class="form-control" name="tempat_resepsi" value="<?php if(isset($data_setting_undangan['tempat_resepsi'])){echo $data_setting_undangan['tempat_resepsi'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Alamat Resepsi</label>
                                <input required type="text" id="alamat_resepsi" class="form-control" name="alamat_resepsi" value="<?php if(isset($data_setting_undangan['alamat_resepsi'])){echo $data_setting_undangan['alamat_resepsi'];} ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h5 style="margin-left: 15px;"><u>Setting MAP LOCATION</u></h5>
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Lokasi di G-MAP</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="nama_map" class="form-control" name="nama_map" value="<?php if(isset($data_setting_undangan['nama_map'])){echo $data_setting_undangan['nama_map'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Lokasi di G-MAP</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="alamat_map" class="form-control" name="alamat_map" value="<?php if(isset($data_setting_undangan['alamat_map'])){echo $data_setting_undangan['alamat_map'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">LINK Lokasi G-MAP</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="link_map" class="form-control" name="link_map" value="<?php if(isset($data_setting_undangan['link_map'])){echo $data_setting_undangan['link_map'];} ?>">
                                    <small>Buka Google Map > Cari Lokasi > Tekan Bagikan dan Copy Url / Link Lokasi dan Paste disini</small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <hr>
                    <h5 ><u>Setting GIFT</u></h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Kata Pembukaan</label>
                                <div class="col-sm-10">
                                    <textarea required type="text" id="ucapan_kado" class="form-control readonlyc" name="ucapan_kado" rows="2"><?php if(isset($data_setting_undangan['ucapan_kado'])){echo $data_setting_undangan['ucapan_kado'];}else{echo "Tanpa mengurangi rasa hormat, untuk melengkapi kebahagiaan pengantin Anda dapat memberikan tanda kasih melalui nomor rekening berikut ini:";} ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Jenis Rekening 1</label>
                                <select name="type_rekening_1" id="type_rekening_1" class="form-control">
                                    <option disabled selected>PILIH SALAH SATU</option>
                                    <option disabled>----- BANK ----</option>
                                    <option >Mandiri</option>
                                    <option >BCA</option>
                                    <option >BRI</option>
                                    <option >BNI</option>
                                    <option >BPTN</option>
                                    <option disabled>---- E-MONEY ------</option>
                                    <option >OVO</option>
                                    <option >LinkAja</option>
                                    <option >DANA</option>
                                    <option >ShopeePay</option>
                                </select>
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Nomor</label>
                                <input required type="text" id="no_rek_1" class="form-control" name="no_rek_1" value="<?php if(isset($data_setting_undangan['no_rek_1'])){echo $data_setting_undangan['no_rek_1'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Atas Nama</label>
                                <input required type="text" id="nama_rek_1" class="form-control" name="nama_rek_1" value="<?php if(isset($data_setting_undangan['nama_rek_1'])){echo $data_setting_undangan['nama_rek_1'];} ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Jenis Rekening 2</label>
                                <select name="type_rekening_2" id="type_rekening_2" class="form-control">
                                    <option disabled selected>PILIH SALAH SATU</option>
                                    <option disabled>----- BANK ----</option>
                                    <option >Mandiri</option>
                                    <option >BCA</option>
                                    <option >BRI</option>
                                    <option >BNI</option>
                                    <option >BPTN</option>
                                    <option disabled>---- E-MONEY ------</option>
                                    <option >OVO</option>
                                    <option >LinkAja</option>
                                    <option >DANA</option>
                                    <option >ShopeePay</option>
                                </select>
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Nomor</label>
                                <input required type="text" id="no_rek_2" class="form-control" name="no_rek_2" value="<?php if(isset($data_setting_undangan['no_rek_2'])){echo $data_setting_undangan['no_rek_2'];} ?>">
                            </div>
                            <div class="form-group fill">
                                <label for="exampleInputEmail1">Atas Nama</label>
                                <input required type="text" id="nama_rek_2" class="form-control" name="nama_rek_2" value="<?php if(isset($data_setting_undangan['nama_rek_2'])){echo $data_setting_undangan['nama_rek_2'];} ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5><u>Setting Pesan/Kisah Cinta</u></h5>
                    <div class="row">                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Kisah Cinta</label>
                                <div class="col-sm-10">
                                    <textarea required type="text" placeholder="PESAN CERITA BAHAGIA PERJALANAN NYA" id="pesan_cerita" class="form-control readonlyc" name="pesan_cerita" rows="2"><?php if(isset($data_setting_undangan['pesan_cerita'])){echo $data_setting_undangan['pesan_cerita'];} ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded"><?php if(isset($data_setting_undangan['id'])){echo 'Update';}else{echo 'Simpan';} ?></button>
                    <!-- <button type="button" class="btn btn-info btn-sm rounded" onclick="menu('Vendor')"> Kembali</button> -->
                    <input type="hidden" readonly name="mode" value="<?php if(isset($data_setting_undangan['id'])){echo 'update';}else{echo 'simpan';} ?>">
                    <input type="hidden" readonly name="id" value="<?php if(isset($data_setting_undangan['id'])){echo $data_setting_undangan['id'];}else{echo '';} ?>">
                    <input type="hidden" id="is_new" name="is_new" value="" readonly>

                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- notification Js -->
<script src="assets/js/plugins/bootstrap-notify.min.js"></script>
<script src="assets/js/pages/ac-notification.js"></script>

<script>
    $(document).ready(function () {
        $("#jenis_vendor").select2({
            tags: true
        });
    });

    $("#form_setting_undangan").submit(function (e) { 
        e.preventDefault();
        var data = $("#form_setting_undangan").serialize();
        $.ajax({
            type: "POST",
            url: "api/undangan/setting_undangan",
            data: data,
            beforeSend: function() {
                toastr["info"]("Mohon Tunggu..", "Loading")
                toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "30011111",
                "hideDuration": "100011111",
                "timeOut": "500011111",
                "extendedTimeOut": "100011111",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
            },
            success: function (hasil) {
                const obj   = JSON.parse(hasil);
                var status  = obj.status
                var pesan   = obj.pesan

                if (status ==200) {
                    swal({
                        title: "Sukses",
                        text: pesan,
                        icon: "success",
                        buttons: [false,'OKE'],
                        dangerMode: false,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            menu('Setting Undangan')
                        } 
                    });
                }                
            },
            error: function(xhr) { // if error occured
                alert("statusText : \n"+xhr.statusText+"\n\n responseText: \n"+xhr.responseText);
                // $(placeholder).append(xhr.statusText + xhr.responseText);
                // $(placeholder).removeClass('loading');
            },
        });
    });
</script>