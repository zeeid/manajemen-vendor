<?php 
// dd($listvendor)jenis_vendor;

?>
<table id="table-style-hover" data-show-export="true" class="table table-striped table-hover table-bordered nowrap">
    <thead>
        <tr>
            <th>AKSI</th>
            <th>NO</th>
            <th>Nama File</th>
            <th>Preview</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no =1;
            foreach ($listgaleri as $key) {
                ?>
            <tr>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus_galeri('<?=$key['gambarnya']?>')">Hapus</button>
                </td>
                <td><?= $no++; ?></td>
                <td><?= $key['gambarnya'] ?></td>
                <td>
                    <img src="<?=base_url()?>/galeri/<?=$key['gambarnya']?>" style="height: 200px;">
                </td>
            </tr>
        <?php
            }
        ?>

    </tbody>

</table>