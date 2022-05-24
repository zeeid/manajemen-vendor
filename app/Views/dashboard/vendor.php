<div class="row" style="margin-top: -25px!important;">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><?= $judul ?></h5>
            </div>
            <div class="card-body" style="padding-bottom: 10px;padding-top: 5px;">
                <button type="button" class="btn btn-primary btn-sm rounded" onclick="fmenu('Tambah Vendor')"> <i class="fa fa-plus-square-o" aria-hidden="true"></i> Tambah <?= $judul ?></button>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="cardx">
                        <div class="card-body" style="padding-top: 0px;">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" data-show-export="true"  class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>jenis</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END CARD -->
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>

<!-- datatable Js -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/pages/data-styling-custom.js"></script>
