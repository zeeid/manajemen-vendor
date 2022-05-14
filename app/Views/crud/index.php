<?= $this->extend('layout/template') ?>
<?= $this->section('konten') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Handle</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($komik as $data) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['creator'] ?></td>
                                    <td><?= $data['create_at'] ?></td>
                                    <td>
                                        <a href="/crud/detail/<?=$data['id']?>" class="btn btn-success btn-xs">Detail</a>
                                        <button type="button" class="btn btn-danger btn-xs">Hapus</button>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>