<style>
    .huruf_besar {
        text-transform: capitalize;
    }
</style>

<?php 
    // dd($listseserahan);
?>

<div class="row" style="margin-top: -25px!important;">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Form <?= $judul ?></h5>
            </div>
            <div class="card-body">
                <form id="form_seserahan" >
                    <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <div class="row">
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input required type="text" id="nama_barang" class="form-control readonlyc huruf_besar" name="nama_barang" value="<?php if(isset($listseserahan['nama_barang'])){echo $listseserahan['nama_barang'];} ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input required type="text" placeholder="Contoh: 15000 [Hanya Angka]" id="harga_barang" class="form-control readonlyc" name="harga_barang" value="<?php if(isset($listseserahan['harga_barang'])){echo $listseserahan['harga_barang'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Beli dimana ?</label>
                                <div class="col-sm-10">
                                    <input required type="text"  id="beli_dimana" class="form-control readonlyc" name="beli_dimana" value="<?php if(isset($listseserahan['beli_dimana'])){echo $listseserahan['beli_dimana'];} ?>">
                                    <small class='text-muted'>Alamat Beli Barangnya / Link Beli (Bisa dari IG / OLSHOP)</small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded"><?php if(isset($listseserahan['id'])){echo 'Update';}else{echo 'Simpan';} ?></button>
                    <button type="button" class="btn btn-info btn-sm rounded" onclick="menu('Vendor')"> Kembali</button>
                    <input type="hidden" readonly name="mode" value="<?php if(isset($listseserahan['id'])){echo 'update';}else{echo 'simpan';} ?>">
                    <input type="hidden" readonly name="id" value="<?php if(isset($listseserahan['id'])){echo $listseserahan['id'];}else{echo '';} ?>">
                    <input type="hidden" id="is_new" name="is_new" value="" readonly>

                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
    <div id='debug'></div>
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

    $("#form_seserahan").submit(function (e) { 
        e.preventDefault();
        var data = $("#form_seserahan").serialize();
        $.ajax({
            type: "POST",
            url: "api/seserahan/simpan",
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
                
                //$("#debug").html(hasil)
                
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
                            menu('Wish List Seserahan')
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