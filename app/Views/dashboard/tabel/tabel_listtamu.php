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
                $pesan = "Bismillahirrahmanirrahim
                Assalamu'alaikum Warohmatullahi Wabarakatuh.
                
                Kepada Yth : $key[nama_tamu]
                
                Puji Syukur atas kehadirat Allah SWT yang telah menciptakan makhluknya berpasang-pasangan. Tanpa mengurangi rasa hormat, maka izinkan kami mengundang sekaligus meminta doa restu dari Bapak/ibu/saudara/i dalam acara pernikahan kami:
                
                     Tiara Rohma Dewi Fortuna
                                      
                                             &
                
                              Piove Wiraguna
                
                
                Yang insyaallah akan di selenggarakan pada:
                
                Hari   : Minggu,03 Juli 2022
                Pukul : 08.30 WIB s/d selesai
                Tempat : Majasto RT 02 RW 08 Tawangsari, Sukoharjo, Jawa Tengah
                
                Berikut kami sertakan link undangan  : https://haribahagiatp.wedew.id/
                
                Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila bapak/ibu, saudara/i berkenan hadir dan memberikan doa restu. Kami ucapkan terimakasih. 
                
                Wassalamu'alaikum warahmatullahi Wabarakatuh 
                
                Kami yang berbahagia
                Tiara & Piove
                ";

                $link = "https://api.whatsapp.com/send/?phone=$key[no_wa]&text=$pesan&type=phone_number&app_absent=0"
                ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus_tamu('<?=$key['id']?>')">Hapus</button>
                    <a href="<?=$link?>" class="btn btn-success" target="_blank" rel="noopener noreferrer">Kirim WA</a>
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