<?php 
// dd($listseserahan);

?>
<table id="table-style-hover" data-show-export="true" class="table table-striped table-hover table-bordered nowrap">
    <thead>
        <tr>
            <th>NO</th>
            <th>AKSI</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Beli dimana ?</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no =1;
            foreach ($listseserahan as $key) {
                ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus_seserahan('<?=$key['id']?>')">Hapus</button>
                    <button type="button" class="btn btn-warning btn-sm" onclick="fmenu('Tambah Wish List Seserahan','<?=$key['id']?>')">Edit</button>
                </td>
                <td><?= $key['nama_barang'] ?></td>
                <td style="text-align: right;"><?= number_format($key['harga_barang']) ?></td>
                <td><?= $key['beli_dimana'] ?></td>
            </tr>
        <?php
            }
        ?>

    </tbody>

</table>