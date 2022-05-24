<style>
    .huruf_besar {
        text-transform: capitalize;
    }
</style>

<?php 
    // dd($listvendor);
?>

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
                                    <select required name="jenis_vendor" id="jenis_vendor" class="form-control">
                                        <option value="" selected disabled>--Pilih salah satu--</option>
                                        <option <?php if(isset($listvendor['jenis_vendor'])){if($listvendor['jenis_vendor']=='Dekorasi'){echo "selected";}} ?> >Dekorasi</option>
                                        <option <?php if(isset($listvendor['jenis_vendor'])){if($listvendor['jenis_vendor']=='Fotografer'){echo "selected";}} ?> >Fotografer</option>
                                        <option <?php if(isset($listvendor['jenis_vendor'])){if($listvendor['jenis_vendor']=='Gedung'){echo "selected";}} ?> >Gedung</option>
                                        <option <?php if(isset($listvendor['jenis_vendor'])){if($listvendor['jenis_vendor']=='Katring Makan'){echo "selected";}} ?> >Katring Makan</option>
                                        <option <?php if(isset($listvendor['jenis_vendor'])){if($listvendor['jenis_vendor']=='MUA'){echo "selected";}} ?> >MUA</option>
                                        <option <?php if(isset($listvendor['jenis_vendor'])){if($listvendor['jenis_vendor']=='PreWeeding'){echo "selected";}} ?> >PreWeeding</option>
                                        <option <?php if(isset($listvendor['jenis_vendor'])){if($listvendor['jenis_vendor']=='Lain-lain'){echo "selected";}} ?> >Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Vendor</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="nama_vendor" class="form-control readonlyc huruf_besar" name="nama_vendor" value="<?php if(isset($listvendor['nama_vendor'])){echo $listvendor['nama_vendor'];} ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Biaya</label>
                                <div class="col-sm-10">
                                    <input required type="text" placeholder="Contoh: 15000 [Hanya Angka]" id="harga_vendor" class="form-control readonlyc" name="harga_vendor" value="<?php if(isset($listvendor['harga_vendor'])){echo $listvendor['harga_vendor'];} ?>">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded"><?php if(isset($listvendor['id'])){echo 'Update';}else{echo 'Simpan';} ?></button>
                    <button type="button" class="btn btn-info btn-sm rounded" onclick="menu('Vendor')"> Kembali</button>
                    <input type="hidden" readonly name="mode" value="<?php if(isset($listvendor['id'])){echo 'update';}else{echo 'simpan';} ?>">
                    <input type="hidden" readonly name="id" value="<?php if(isset($listvendor['id'])){echo $listvendor['id'];}else{echo '';} ?>">
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

    $("#form_vendor").submit(function (e) { 
        e.preventDefault();
        var data = $("#form_vendor").serialize();
        $.ajax({
            type: "POST",
            url: "api/vendor/simpan",
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
                            menu('Vendor')
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