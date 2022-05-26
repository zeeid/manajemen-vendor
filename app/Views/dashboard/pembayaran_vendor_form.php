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
                <form id="form_pembayaran_vendor" >
                    <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Vendor </label>
                                <div class="col-sm-10">
                                    <select required onchange="getvendorxx()" name="kode_vendor" id="kode_vendor" class="form-control">
                                        <option value="" selected disabled>--Pilih salah satu--</option>
                                        <?php 
                                            foreach ($listvendor as $key) {
                                                ?>
                                                    <option data-harga_vendor="<?=$key['harga_vendor']?>" value="<?=$key['kode_vendor']?>"><?=strtoupper($key['nama_vendor'])?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Harga Vendor</label>
                                <div class="col-sm-10">
                                    
                                    <input readonly type="text" id="harga_vendor_x" class="form-control readonlyc huruf_besar" name="harga_vendor_x">
                                    <input readonly type="hidden" id="harga_vendor" class="form-control readonlyc huruf_besar" name="harga_vendor" >
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">DP Terbayar</label>
                                <div class="col-sm-10">
                                    <input readonly type="text" id="terbayar_x" class="form-control readonlyc huruf_besar" name="terbayar_x" >
                                    <input readonly type="hidden" id="terbayar" class="form-control readonlyc huruf_besar" name="terbayar" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                                <div class="col-sm-10">
                                    <input required type="text" onkeyup="hitung_dp()" placeholder="Contoh: 15000 [Hanya Angka]" id="jml_bayar" class="form-control readonlyc" name="jml_bayar" >
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                                <div class="col-sm-10">
                                    <input required type="date" id="tgl_bayar" class="form-control readonlyc" name="tgl_bayar" value="<?=date('Y-m-d')?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Sisa DP</label>
                                <div class="col-sm-10">
                                    <input readonly type="text" id="sisa_bayar_x" class="form-control readonlyc" name="sisa_bayar_x" >
                                    <input readonly type="hidden" id="sisa_bayar" class="form-control readonlyc" name="sisa_bayar" >
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded"><?php if(isset($listvendor['id'])){echo 'Update';}else{echo 'Simpan';} ?></button>
                    <button type="button" class="btn btn-info btn-sm rounded" onclick="menu('Pembayaran')"> Kembali</button>
                    <input type="hidden" readonly name="mode" value="<?php if(isset($listvendor['id'])){echo 'update';}else{echo 'simpan';} ?>">
                    <input type="hidden" readonly name="id" value="<?php if(isset($listvendor['id'])){echo $listvendor['id'];}else{echo '';} ?>">
                    <input type="hidden" id="is_new" name="is_new" value="" readonly>

                </form>
            </div>
        </div>
    </div>
    <div id="debug"></div>
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

    function rupiah(angkanya) {
        const numb = angkanya;
        const format = numb.toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        const rupiah = convert.join('.').split('').reverse().join('')

        return rupiah
    }

    var kunciku = $("#kunciku").val()

    function getvendorxx() {
        var kode_vendor = $('#kode_vendor').find(":selected").val();
        var harga_vendor = $('#kode_vendor').find(":selected").data('harga_vendor');


        $("#harga_vendor_x").val(rupiah(harga_vendor))
        $("#harga_vendor").val(harga_vendor)

        $.ajax({
            type: "POST",
            url: "api/pembayaran/cek-terbayar",
            data: "kunciku="+kunciku+"&kode_vendor="+kode_vendor,
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

                $("#sisa_bayar").val('')
                $("#sisa_bayar_x").val('')
                $('#terbayar_x').val('')
                $('#terbayar').val('')
                $('#jml_bayar').val('')
            },
            success: function (hasil) {
                toastr.remove()
                toastr.clear()
                const obj       = JSON.parse(hasil);
                var jml_bayar  = obj.jml_bayar
                // var pesan   = obj.pesan
                $('#terbayar_x').val(rupiah(jml_bayar))
                $('#terbayar').val(jml_bayar)

                // $("#debug").html(hasil)

            },
            error: function(xhr) { // if error occured
                alert("statusText : \n"+xhr.statusText+"\n\n responseText: \n"+xhr.responseText);
                // $(placeholder).append(xhr.statusText + xhr.responseText);
                // $(placeholder).removeClass('loading');
            },
        });
    }

    function hitung_dp() {
        var harga_vendor    = parseInt($("#harga_vendor").val())
        var jml_bayar       = parseInt($('#jml_bayar').val())
        var terbayar        = parseInt($('#terbayar').val())
        var tot_bayar       = jml_bayar+terbayar;
        console.log("totbar: "+jml_bayar+" + "+terbayar+" = "+tot_bayar)
        
        var hitung          = harga_vendor-tot_bayar
        console.log(hitung)
        $("#sisa_bayar").val(hitung)
        $("#sisa_bayar_x").val(rupiah(hitung))
    }

    $("#form_pembayaran_vendor").submit(function (e) { 
        e.preventDefault();
        var data = $("#form_pembayaran_vendor").serialize();
        $.ajax({
            type: "POST",
            url: "api/pembayaran/bayarvendor",
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
                            menu('Pembayaran')
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