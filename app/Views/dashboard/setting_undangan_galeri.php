    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="<?=base_url();?>/assets/css/plugins/dropzone.min.css">
    
    <!-- Required Js -->
    <!-- <script src="<?=base_url()?>/assets/js/vendor-all.min.js"></script> -->
    <!-- file-upload Js -->
    <script src="<?=base_url()?>/assets/js/plugins/dropzone-amd-module.min.js"></script>

    <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->


        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ file-upload ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>File Upload ddd</h5>
                    </div>
                    <div class="card-body">
                        <center><h3>Tarik / Klik Pada Kotak dibawah ini untuk Pilih Foto</h3></center>
                        <form action="/api/undangan/dropzone" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone">
                            <input type="hidden" id="<?= csrf_token() ?>" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </form>
                        <!-- <div class="text-center m-t-20">
                            <button type="submit" class="btn btn-primary">Upload Now</button>
                        </div> -->
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
                        <h5>LIST GALERI</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive listgaleri">
                            <table id="table-style-hover" data-show-export="true"  class="table table-striped table-hover table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama File</th>
                                        <th>Preview</th>
                                        <th>AKSI</th>
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

<script>
    function getgaleri() {
        var kunciku = $("#kunciku").val();
        $.ajax({
            type: "POST",
            url: "api/undangan/listgaleri",
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

                $(".listgaleri").html(hasil)
                
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
        getgaleri();
        // $("#dropzone").dropzone({ url: "/api/undangan/dropzone" });
        // Dropzone.autoDiscover = false;
        $("#dropzone").dropzone({
            url: "/api/undangan/dropzone",
            addRemoveLinks: true,
            
            success: function (file, response) {
                var imgName = response;
                // file.previewElement.classList.add("dz-success");
                // console.log("Successfully uploaded \n-----------------\n" + imgName+" \n====================\n "+file);

                const obj = JSON.parse(imgName);
                var status = obj.status;
                if (status == 200) {
                    swal("Sukses", "Berhasil Upload Galeri", "success");
                    getgaleri();
                }else{
                    swal("Error", "You clicked the button!", "error");
                }
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            }
        });
    });

    function hapus_galeri(id) {
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
                    url: "api/undangan/hapusgaleri",
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
                        getgaleri();
                    },
                    error: function(xhr) { // if error occured
                        // $("#debug").html(xhr)
                        alert("statusText : \n"+xhr.statusText+"\n\n responseText: \n"+xhr.responseText);
                    },
                });
            } 
        });

    }
</script>