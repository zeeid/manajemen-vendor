<?php 
// dd($listtamu);
?>
<table id="table-style-hover" data-show-export="true" class="table table-striped table-hover table-bordered nowrap">
    <thead>
        <tr>
            <th>NO</th>
            <th>AKSI</th>
            <th>Nama Tamu</th>
            <th>Alamat Tamu</th>
            <th>No WA</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no =1;
            foreach ($listtamu as $key) {
                ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus_tamu('<?=$key['id']?>')">Hapus</button>
                </td>
                <td><?= $key['nama_tamu'] ?></td>
                <td><?= $key['alamat_tamu'] ?></td>
                <td><?= $key['no_wa'] ?></td>
            </tr>
        <?php
            }
        ?>

    </tbody>

</table>