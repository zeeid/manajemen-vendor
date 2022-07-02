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
                        <div class="text-center m-t-20">
                            <button type="submit" class="btn btn-primary">Upload Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ file-upload ] end -->
        </div>
        <!-- [ Main Content ] end -->
    
<!-- [ Main Content ] end -->

<script>
    $(document).ready(function () {
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
                }else{
                    swal("Error", "You clicked the button!", "error");
                }
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            }
        });
    });
</script>