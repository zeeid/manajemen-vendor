<?php 
// dd($listbayar);

?>
<table id="table-style-hover" data-show-export="true" class="table table-striped table-hover table-bordered nowrap">
    <thead>
        <tr>
            <th>No</th>
            <th>AKSI</th>
            <th>Nama Vendor</th>
            <th>Jumlah Bayar</th>
            <th>Tanggal Bayar</th>
            <th>diInput Oleh</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no =1;
            foreach ($listbayar as $key) {
                ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm rounded" onclick="hapus_pembayaranx('<?=$key['id_pembayaran']?>')">Hapus</button>
                    <!-- <button type="button" class="btn btn-warning btn-sm" onclick="fmenu('Tambah Pembayaran Vendor','<?=$key['id']?>')">Edit</button> -->
                </td>
                <td><?= $key['nama_vendor']?></td>
                <td style="text-align: right;"><?= number_format($key['jml_bayar']) ?></td>
                <td><?= $key['tgl_bayar'] ?></td>
                <td><?= $key['di_input_oleh'] ?></td>
            </tr>
        <?php
            }
        ?>

    </tbody>

</table>