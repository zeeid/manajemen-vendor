<?php 
// dd($listvendor)jenis_vendor;

?>
<table id="table-style-hover" data-show-export="true" class="table table-striped table-hover table-bordered nowrap">
    <thead>
        <tr>
            <th>NO</th>
            <th>AKSI</th>
            <th>Nama</th>
            <th>Jenis Vendor</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no =1;
            foreach ($listvendor as $key) {
                ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus_vendor('<?=$key['id']?>')">Hapus</button>
                    <button type="button" class="btn btn-warning btn-sm" onclick="fmenu('Tambah Vendor','<?=$key['id']?>')">Edit</button>
                </td>
                <td><?= $key['nama_vendor'] ?></td>
                <td><?= $key['jenis_vendor'] ?></td>
                <td><?= $key['harga_vendor'] ?></td>
            </tr>
        <?php
            }
        ?>

    </tbody>

</table>