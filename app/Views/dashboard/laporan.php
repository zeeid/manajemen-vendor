
<div class="row" style="margin-top: -25px!important;">
    <?php 
        // dd($datavendor);
        foreach ($datavendor as $key) {
            // echo $key['nama_vendor'];
            ?>
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-header" style="text-align:center;">
                            <h5 >Vendor <?= strtoupper($key['nama_vendor']) ?></h5>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Harga Vendor</td>
                                    <td>:</td>
                                    <td>Rp. <?= number_format($key['harga_vendor']); ?></td>
                                </tr>
                                <tr>
                                    <td>Terbayar</td>
                                    <td>:</td>
                                    <td>Rp. <?= number_format($key['totalbayar']); ?></td>
                                </tr>
                                <tr>
                                    <td>Sisa</td>
                                    <td>:</td>
                                    <td>Rp. <?= number_format($key['harga_vendor']-$key['totalbayar']); ?></td>
                                </tr>
                            </table>
                            <!-- <canvas id="chart-bar-1" style="width: 100%; height: 300px"></canvas> -->
                        </div>
                    </div>
                </div>
            <?php
        }
        // die();
    ?>
</div>

<div id="debug"></div>

<!-- datatable Js -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/pages/data-styling-custom.js"></script>

<!-- chartjs js -->
<script src="assets/js/plugins/Chart.min.js"></script>
<script src="assets/js/pages/chart-chart-custom.js"></script>

<script>
    

    var kunciku = $("#kunciku").val()

    function getPembayaran() {
        $.ajax({
            type: "POST",
            url: "api/pembayaran/listbayar",
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

                $(".listpembayaran").html(hasil)
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
        
    });
    
</script>