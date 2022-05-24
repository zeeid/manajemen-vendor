<style>
    .huruf_besar {
        text-transform: capitalize;
    }
</style>
<div class="row" style="margin-top: -25px!important;">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Form <?= $judul ?></h5>
            </div>
            <div class="card-body">
                <form id="form_vendor" >
                    <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Vendor </label>
                                <div class="col-sm-10">
                                    <select required name="jenis_produk" id="jenis_produk" class="form-control">
                                        <option value="" selected disabled>--Pilih salah satu--</option>
                                        <option <?php if(isset($_POST['id'])){if($data['jenis_produk']=='2'){echo "selected";}} ?> >Dekorasi</option>
                                        <option <?php if(isset($_POST['id'])){if($data['jenis_produk']=='1'){echo "selected";}} ?> >Fotografer</option>
                                        <option <?php if(isset($_POST['id'])){if($data['jenis_produk']=='2'){echo "selected";}} ?> >Gedung</option>
                                        <option <?php if(isset($_POST['id'])){if($data['jenis_produk']=='2'){echo "selected";}} ?> >Katring Makan</option>
                                        <option <?php if(isset($_POST['id'])){if($data['jenis_produk']=='2'){echo "selected";}} ?> >MUA</option>
                                        <option <?php if(isset($_POST['id'])){if($data['jenis_produk']=='2'){echo "selected";}} ?> >PreWeeding</option>
                                        <option <?php if(isset($_POST['id'])){if($data['jenis_produk']=='2'){echo "selected";}} ?> >Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Vendor</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="nama_vendor" class="form-control readonlyc huruf_besar" name="nama_vendor" value="<?php if(isset($_POST['id'])){echo $data['nama_produk'];} ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Biaya</label>
                                <div class="col-sm-10">
                                    <input required type="text" placeholder="Contoh: 15000 [Hanya Angka]" id="biaya_vendor" class="form-control readonlyc" name="biaya_vendor" value="<?php if(isset($_POST['id'])){echo $data['biaya_vendor'];} ?>">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded"><?php if(isset($_POST['id'])){echo 'Update';}else{echo 'Simpan';} ?></button>
                    <button type="button" class="btn btn-info btn-sm rounded" onclick="menu('Vendor')"> Kembali</button>
                    <input type="hidden" readonly name="mode" value="<?php if(isset($_POST['id'])){echo 'update';}else{echo 'simpan';} ?>">
                    <input type="hidden" readonly name="id" value="<?php if(isset($_POST['id'])){echo $data['id'];}else{echo '';} ?>">
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
        $("#jenis_produk").select2({
            tags: true
        });
    });

    $("#form_vendor").submit(function (e) { 
        e.preventDefault();
        var data = $("#form_vendor").serialize();
        $.ajax({
            type: "POST",
            url: "api/vendor/simpan",
            data: data,
            beforeSend: function() {
                // setting a timeout
				// $("#konten").html('')
                // $('#loading_konten').html('<i class="fas fa-spinner fa-spin"></i> Sedang Memuat Konten ...');
            },
            success: function (hasil) {
				// $(".pcoded-navbar").removeClass("mob-open")
                // $('#loading_konten').html('')
                // $("#item_b1").text(menu)
                // $("#item_b2").text('')
                // $("#konten").html(hasil)
                
            }
        });
    });
</script>