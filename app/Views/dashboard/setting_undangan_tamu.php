        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ file-upload ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>File Upload Tamu Undangan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2" style="max-width:max-content;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahsatu" >Tambah 1 Tamu</button>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahbanyak">Upload Banyak Tamu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ file-upload ] end -->
        </div>
        <div class="row">
            <!-- [ file-upload ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>LIST Tamu Undangan</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive listtamu">
                            <table id="table-style-hover" data-show-export="true"  class="table table-striped table-hover table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>AKSI</th>
                                        <th>NO</th>
                                        <th>Nama </th>
                                        <th>Alamat</th>
                                        <th>No WA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ file-upload ] end -->
        </div>
        <!-- [ Main Content ] end -->
    
<!-- [ Main Content ] end -->

<div class="modal fade" id="tambahbanyak" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahbanyakLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahbanyakLabel">Upload Tamu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post" id="uploadtamu">
            <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <div class="modal-body">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="file_tamu" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
                </div>
                <a href="template_upload_tamu.xlsx" target="_blank" rel="noopener noreferrer"><i class="fa fa-cloud-download" aria-hidden="true"></i> Silahkan Unduh <b>TEMPLATE EXEL</b> ini untuk Upload Data Tamu <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahsatu" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahsatuLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahsatuLabel">Tambah Tamu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post" id="tambahtamu">
            <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_tamu">Nama Tamu</label>
                    <input type="text" class="form-control" id="nama_tamu" name="nama_tamu">
                </div>
                <div class="form-group">
                    <label for="alamat_tamu">Alamat Tamu</label>
                    <input type="text" class="form-control" id="alamat_tamu" name="alamat_tamu">
                </div>
                <div class="form-group">
                    <label for="no_wa">No WA Tamu</label>
                    <input type="text" class="form-control" id="no_wa" name="no_wa">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- <script src="<?=base_url()?>/assets/js/vendor-all.min.js"></script>
<script src="<?=base_url()?>/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?=base_url()?>/assets/js/ripple.js"></script>
<script src="<?=base_url()?>/assets/js/pcoded.min.js"></script>
<script src="<?=base_url()?>/assets/js/menu-setting.min.js"></script> -->

<script>
    function gettamu() {
        var kunciku = $("#kunciku").val();
        $.ajax({
            type: "POST",
            url: "api/undangan/listtamu",
            data: "kunciku="+kunciku,
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
                // $("#debug").html(hasil)
                // Remove current toasts using animation
                toastr.remove()
                toastr.clear()

                $(".listtamu").html(hasil)
                
                // $('#table-style-hover').DataTable({
                //     dom: 'Bfrtip',
                //     buttons: [
                //         'copy', 'csv', 'excel', 'pdf', 'print'
                //     ]
                // });
            },
            error: function(xhr) { // if error occured
                $("#debug").html(xhr)
                // alert("statusText : \n"+xhr.statusText+"\n\n responseText: \n"+xhr.responseText);
                // $(placeholder).append(xhr.statusText + xhr.responseText);
                // $(placeholder).removeClass('loading');
            },
        });
    }

    $(document).ready(function () {

        gettamu()

        $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
    });

    function hapus_tamu(id) {
        var kunciku = $("#kunciku").val();
        swal({
            title: "Apakah Anda Yakin?",
            text: "Data tidak dapat dikembalikan jika berhasil hapus !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "api/undangan/hapus_tamu",
                    data: "kunciku="+kunciku+"&id="+id,
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
                        // $("#debug").html(hasil)
                        // Remove current toasts using animation
                        toastr.remove()
                        toastr.clear()

                        const obj = JSON.parse(hasil);
                        var status = obj.status
                        var pesan = obj.pesan
            
                        if (status == 200) {
                            swal({
                                    title: "Sukses",
                                    text: "Berhasil Hapus Tamu",
                                    icon: "success",
                                    buttons: [false, 'OKE'],
                                    dangerMode: false,
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        $("#tambahbanyak").modal('hide');
                                        gettamu()
                                    }
                                });
                        }else{
                            swal("ERROR", "ERROR HAPUS TAMU", "error");
                        }
                    },
                    error: function(xhr) { // if error occured
                        // $("#debug").html(xhr)
                        alert("statusText : \n"+xhr.statusText+"\n\n responseText: \n"+xhr.responseText);
                    },
                });
            } 
        });

    }

    $("#uploadtamu").submit(function (e) { 
        e.preventDefault();
        var data = new FormData(this);
        
        $.ajax({
            type: "POST",
            url: "api/undangan/upload-tamu",
            data:data,
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
                var jumlah = obj.jumlah
    
                if (status == 200) {
                    swal({
                            title: "Sukses",
                            text: pesan+"\n Sebanyak : "+jumlah+" Data Tamu",
                            icon: "success",
                            buttons: [false, 'OKE'],
                            dangerMode: false,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $("#tambahbanyak").modal('hide');
                                gettamu()
                            }
                        });
                }else{
                    swal("ERROR", "ERROR UPLOAD", "error");
                }
            },
            error: function(xhr) { // if error occured
                alert("statusText : \n" + xhr.statusText + "\n\n responseText: \n" + xhr.responseText);
                // $(placeholder).append(xhr.statusText + xhr.responseText);
                // $(placeholder).removeClass('loading');
            },
        });
    });

    $("#tambahtamu").submit(function (e) { 
        e.preventDefault();
        var data = new FormData(this);
        
        $.ajax({
            type: "POST",
            url: "api/undangan/tambah-tamu",
            data:data,
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
                var jumlah = obj.jumlah
    
                if (status == 200) {
                    swal({
                            title: "Sukses",
                            text: pesan+"\n Sebanyak : "+jumlah+" Data Tamu",
                            icon: "success",
                            buttons: [false, 'OKE'],
                            dangerMode: false,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $("#tambahsatu").modal('hide');
                                // menu('Wish List Seserahan')
                                gettamu()
                            }
                        });
                }else{
                    swal("ERROR", "ERROR UPLOAD", "error");
                }
            },
            error: function(xhr) { // if error occured
                alert("statusText : \n" + xhr.statusText + "\n\n responseText: \n" + xhr.responseText);
                // $(placeholder).append(xhr.statusText + xhr.responseText);
                // $(placeholder).removeClass('loading');
            },
        });
    });


</script>