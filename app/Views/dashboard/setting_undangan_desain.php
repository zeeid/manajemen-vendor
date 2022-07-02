<style>
.huruf_besar {
    text-transform: capitalize;
}
</style>

<?php 
    // dd($undangan_desain['cover_depan']);
    $default_img = 'https://i.pinimg.com/originals/55/64/58/5564585aeac66ac1373cc7181703ba9a.jpg';
?>

<div class="row" style="margin-top: -25px!important;">
    <!-- [ Form Validation ] start -->

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Desain Undangan</h5>
            </div>
            <div class="card-body">
                <div class="bt-wizard" id="progresswizard">
                    <ul class="nav nav-pills nav-fill mb-3">
                        <li class="nav-item"><a href="#progress-t-tab1" class="nav-link has-ripple active"
                                data-toggle="tab">Cover Depan<span class="ripple ripple-animate"
                                    style="height: 142.283px; width: 142.283px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -44.0415px; left: 51.8585px;"></span></a>
                        </li>
                        <li class="nav-item"><a href="#progress-t-tab2" class="nav-link has-ripple"
                                data-toggle="tab">Hiasan Depan<span class="ripple ripple-animate"
                                    style="height: 153px; width: 153px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -58.4px; left: -13.7833px;"></span></a>
                        </li>
                        <li class="nav-item"><a href="#progress-t-tab3" class="nav-link has-ripple"
                                data-toggle="tab">Cover Dalam<span class="ripple ripple-animate"
                                    style="height: 130.717px; width: 130.717px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -42.2585px; left: -49.6418px;"></span></a>
                        </li>
                        <li class="nav-item"><a href="#progress-t-tab4" class="nav-link has-ripple"
                                data-toggle="tab">Logo Depan<span class="ripple ripple-animate"
                                    style="height: 130.717px; width: 130.717px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -42.2585px; left: -49.6418px;"></span></a>
                        </li>
                        <li class="nav-item"><a href="#progress-t-tab5" class="nav-link has-ripple"
                                data-toggle="tab">Hiasan Atas<span class="ripple ripple-animate"
                                    style="height: 130.717px; width: 130.717px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -42.2585px; left: -49.6418px;"></span></a>
                        </li>
                        <li class="nav-item"><a href="#progress-t-tab6" class="nav-link has-ripple"
                                data-toggle="tab">Hiasan Bawah<span class="ripple ripple-animate"
                                    style="height: 130.717px; width: 130.717px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -42.2585px; left: -49.6418px;"></span></a>
                        </li>
                        <li class="nav-item"><a href="#progress-t-tab7" class="nav-link has-ripple"
                                data-toggle="tab">Pengantin Pria<span class="ripple ripple-animate"
                                    style="height: 130.717px; width: 130.717px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -42.2585px; left: -49.6418px;"></span></a>
                        </li>
                        <li class="nav-item"><a href="#progress-t-tab8" class="nav-link has-ripple"
                                data-toggle="tab">Pengantin Wanita<span class="ripple ripple-animate"
                                    style="height: 130.717px; width: 130.717px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -42.2585px; left: -49.6418px;"></span></a>
                        </li>
                    </ul>
                    <div id="bar" class="bt-wizard progress mb-3" style="height:6px">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" style="width: 33.3333%;"></div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="progress-t-tab1">
                            <form id="cover_depan" enctype="multipart/form-data" method="post">
                                <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <input type="hidden" name="mode" value="cover_depan">
                                <div class="form-group row">
                                    <label for="progress-t-email" class="col-sm-3 col-form-label">Tersimpan Cover Depan</label>
                                    <div class="col-sm-9">
                                        <img src="<?= isset($undangan_desain['cover_depan']) ? "desain/".$undangan_desain['cover_depan'] : $default_img?>"  style="height: 300px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                        <label for="progress-t-name" class="col-sm-3 col-form-label">Upload</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="file" required name="cover_depan" id="cover_depan">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <button type="button" onclick="simpan_desain('cover_depan')" class="btn btn-success">Simpan</button>
                                        </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab2">
                            <form id="hiasan_depan" method="post">
                                <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <input type="hidden" name="mode" value="hiasan_depan">
                                <div class="form-group row">
                                    <label for="progress-t-email" class="col-sm-3 col-form-label">Tersimpan Hiasan Depan</label>
                                    <div class="col-sm-9">
                                        <img src="<?=isset($undangan_desain['hiasan_depan']) ? "desain/".$undangan_desain['hiasan_depan'] : $default_img;?>" alt="Cover Depan" style="height: 300px;background-color: #0e0e68;border-radius: 13px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="progress-t-name" class="col-sm-3 col-form-label">Upload</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="file" required name="hiasan_depan" id="hiasan_depan">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <button type="button" onclick="simpan_desain('hiasan_depan')" class="btn btn-success">Simpan</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab3">
                            <form id="cover_dalam" method="post">
                                <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <input type="hidden" name="mode" value="cover_dalam">
                                <div class="form-group row">
                                    <label for="progress-t-email" class="col-sm-3 col-form-label">Tersimpan Cover Dalam</label>
                                    <div class="col-sm-9">
                                        <img src="<?=isset($undangan_desain['cover_dalam']) ? "desain/".$undangan_desain['cover_dalam'] : $default_img;?>" alt="Cover Depan" style="height: 300px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="progress-t-name" class="col-sm-3 col-form-label">Upload</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="file" required name="cover_dalam" id="cover_dalam">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <button type="button" onclick="simpan_desain('cover_dalam')" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab4">
                            <form id="logo_depan" method="post">
                                <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <input type="hidden" name="mode" value="logo_depan">
                                <div class="form-group row">
                                    <label for="progress-t-email" class="col-sm-3 col-form-label">Tersimpan Logo Depan</label>
                                    <div class="col-sm-9">
                                        <img src="<?=isset($undangan_desain['logo_depan']) ? "desain/".$undangan_desain['logo_depan'] : $default_img;?>" alt="Cover Depan" style="height: 300px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                        <label for="progress-t-name" class="col-sm-3 col-form-label">Upload</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="file" required name="logo_depan" id="logo_depan">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <button type="button" onclick="simpan_desain('logo_depan')" class="btn btn-success">Simpan</button>
                                        </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab5">
                            <form id="hiasan_atas" method="post">
                                <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <input type="hidden" name="mode" value="hiasan_atas">
                                <div class="form-group row">
                                    <label for="progress-t-email" class="col-sm-3 col-form-label">Tersimpan Hiasan Atas</label>
                                    <div class="col-sm-9">
                                        <img src="<?=isset($undangan_desain['hiasan_atas']) ? "desain/".$undangan_desain['hiasan_atas'] : $default_img;?>" alt="Cover Depan" style="height: 300px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                        <label for="progress-t-name" class="col-sm-3 col-form-label">Upload</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="file" required name="hiasan_atas" id="hiasan_atas">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <button type="button" onclick="simpan_desain('hiasan_atas')" class="btn btn-success">Simpan</button>
                                        </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab6">
                            <form id="hiasan_bawah" method="post">
                                <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <input type="hidden" name="mode" value="hiasan_bawah">
                                <div class="form-group row">
                                    <label for="progress-t-email" class="col-sm-3 col-form-label">Tersimpan Hiasan Bawah</label>
                                    <div class="col-sm-9">
                                        <img src="<?=isset($undangan_desain['hiasan_bawah']) ? "desain/".$undangan_desain['hiasan_bawah'] : $default_img;?>" alt="Cover Depan" style="height: 300px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                        <label for="progress-t-name" class="col-sm-3 col-form-label">Upload</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="file" required name="hiasan_bawah" id="hiasan_bawah">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <button type="button" onclick="simpan_desain('hiasan_bawah')" class="btn btn-success">Simpan</button>
                                        </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab7">
                            <form form id="pengantin_p" method="post">
                                <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <input type="hidden" name="mode" value="pengantin_p">
                                <div class="form-group row">
                                    <label for="progress-t-email" class="col-sm-3 col-form-label">Tersimpan Pengantin Pria</label>
                                    <div class="col-sm-9">
                                        <img src="<?=isset($undangan_desain['pengantin_p']) ? "desain/".$undangan_desain['pengantin_p'] : $default_img;?>" alt="Cover Depan" style="height: 300px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                        <label for="progress-t-name" class="col-sm-3 col-form-label">Upload</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="file" required name="pengantin_p" id="pengantin_p">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <button type="button" onclick="simpan_desain('pengantin_p')" class="btn btn-success">Simpan</button>
                                        </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab8">
                            <form id="pengantin_w" method="post">
                                <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                <input type="hidden" name="mode" value="pengantin_w">
                                <div class="form-group row">
                                    <label for="progress-t-email" class="col-sm-3 col-form-label">Tersimpan Pengantin Wanita</label>
                                    <div class="col-sm-9">
                                        <img src="<?=isset($undangan_desain['pengantin_w']) ? "desain/".$undangan_desain['pengantin_w'] : $default_img;?>" alt="Cover Depan" style="height: 300px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                        <label for="progress-t-name" class="col-sm-3 col-form-label">Upload</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="file" required name="pengantin_w" id="pengantin_w">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <button type="button" onclick="simpan_desain('pengantin_w')" class="btn btn-success">Simpan</button>
                                        </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="row justify-content-between btn-page">
                            <div class="col-sm-6">
                                <a href="#!" class="btn btn-primary button-previous disabled">Previous</a>
                            </div>
                            <div class="col-sm-6 text-md-right">
                                <a href="#!" class="btn btn-primary button-next">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Form <?= $judul ?></h5>
            </div>
            <div class="card-body">
                <form id="form_seserahan">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="nama_barang"
                                        class="form-control readonlyc huruf_besar" name="nama_barang"
                                        value="<?php if(isset($listseserahan['nama_barang'])){echo $listseserahan['nama_barang'];} ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input required type="text" placeholder="Contoh: 15000 [Hanya Angka]"
                                        id="harga_barang" class="form-control readonlyc" name="harga_barang"
                                        value="<?php if(isset($listseserahan['harga_barang'])){echo $listseserahan['harga_barang'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Beli dimana ?</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="beli_dimana" class="form-control readonlyc"
                                        name="beli_dimana"
                                        value="<?php if(isset($listseserahan['beli_dimana'])){echo $listseserahan['beli_dimana'];} ?>">
                                    <small class='text-muted'>Alamat Beli Barangnya / Link Beli (Bisa dari IG /
                                        OLSHOP)</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit"
                        class="btn btn-primary btn-sm rounded"><?php if(isset($listseserahan['id'])){echo 'Update';}else{echo 'Simpan';} ?></button>
                    <button type="button" class="btn btn-info btn-sm rounded" onclick="menu('Vendor')"> Kembali</button>
                    <input type="hidden" readonly name="mode"
                        value="<?php if(isset($listseserahan['id'])){echo 'update';}else{echo 'simpan';} ?>">
                    <input type="hidden" readonly name="id"
                        value="<?php if(isset($listseserahan['id'])){echo $listseserahan['id'];}else{echo '';} ?>">
                    <input type="hidden" id="is_new" name="is_new" value="" readonly>

                </form>
            </div>
        </div>
    </div> -->
    <!-- [ Form Validation ] end -->
    <div id='debug'></div>
</div>
<!-- notification Js -->
<script src="assets/js/plugins/bootstrap-notify.min.js"></script>
<script src="assets/js/pages/ac-notification.js"></script>

<script>
    $(document).ready(function () {
        $('#progresswizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last',
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#progresswizard .progress-bar').css({
                    width: $percent + '%'
                });
            }
        });
    });
</script>

<script>
    var kunciku = $("#kunciku").val();

    function simpan_desain(idnya) {
        
        // e.preventDefault();
        // var formData = new FormData(this);
        var formData = new FormData($('#'+idnya)[0]);
    
        $.ajax({
            type: "POST",
            url: "api/undangan/desain_undangan",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
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
            success: function(hasil) {
                toastr.remove()
                toastr.clear()
    
                $("#debug").html(hasil)
                const obj = JSON.parse(hasil);
                var status = obj.status
                var pesan = obj.pesan
                var e_gambar = obj.e_gambar
    
                if (status == 200) {
                    swal({
                            title: "Sukses",
                            text: pesan,
                            icon: "success",
                            buttons: [false, 'OKE'],
                            dangerMode: false,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                // menu('Wish List Seserahan')
                            }
                        });
                }else{
                    swal("ERROR", pesan+' | '+e_gambar, "error");
                }
            },
            error: function(xhr) { // if error occured
                alert("statusText : \n" + xhr.statusText + "\n\n responseText: \n" + xhr.responseText);
                // $(placeholder).append(xhr.statusText + xhr.responseText);
                // $(placeholder).removeClass('loading');
            },
        });
    }
    
</script>