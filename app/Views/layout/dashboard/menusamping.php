<?php 
	$session = session();
	// dd(session()->get());

	if($session->get('logged_in')!=true){
		// dd("NO SESI");
		header("Location: /login"); /* Redirect browser */
		exit();
	}
	?>
    
<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="assets/user.png" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details"><?= $session->get('nama_user'); ?><i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" onclick="menu('Profil')" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="/logout" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar " style="display: block;">
                <li class="nav-item pcoded-menu-caption">
                    <label>Kelola Vendor</label>
                </li>

                <li class="nav-item">
                    <a class="nav-link " onclick="menu('Vendor')"><span class="pcoded-micon"><i class="fa fa-users"></i></span><span class="pcoded-mtext">Kelola Vendor</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " onclick="menu('Pembayaran')"><span class="pcoded-micon"><i class="fa fa-cutlery"></i></span><span class="pcoded-mtext">Pembayaran Vendor</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " onclick="menu('Laporan')"><span class="pcoded-micon"><i class="fa fa-book"></i></span><span class="pcoded-mtext">Laporan Transaksi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " onclick="menu('Wish List Seserahan')"><span class="pcoded-micon"><i class="fa fa-shopping-cart"></i></span><span class="pcoded-mtext">Wish List Seserahan</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Undangan</label>
                </li>
                <li class="nav-item">
                    <a class="nav-link " onclick="menu('Setting Undangan')"><span class="pcoded-micon"><i class="fa fa-cogs"></i></span><span class="pcoded-mtext">Setting Undangan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " onclick="menu('Desain Undangan')"><span class="pcoded-micon"><i class="fa fa-cogs"></i></span><span class="pcoded-mtext">Desain Undangan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " onclick="menu('Galeri Undangan')"><span class="pcoded-micon"><i class="fa fa-cogs"></i></span><span class="pcoded-mtext">Galeri Undangan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " onclick="menu('Tamu Undangan')"><span class="pcoded-micon"><i class="fa fa-cogs"></i></span><span class="pcoded-mtext">Tamu Undangan</span></a>
                </li>
            </ul>
            
            <ul class="nav pcoded-inner-navbar " style="display: none;">
                
                <li class="nav-item pcoded-menu-caption">
                    <label>Data SIBANTER</label>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link " onclick="menu('WARGA')"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Bantuan</span></a>
                </li>
                

            </ul>
            
            <div class="card text-center" style="display: block;">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fab fa-whatsapp f-40"></i>
                    <h6 class="mt-3">Help?</h6>
                    <p>Jika Data tidak tepat. Untuk Menghubungi Admin Via Whatsapp</p>
                    <a href="https://api.whatsapp.com/send?phone=08&text=pesan" target="_blank" class="btn btn-primary btn-sm text-white m-0"><i class="fab fa-whatsapp"></i> Hubungi Admin</a>
                </div>
            </div>
            
        </div>
    </div>
</nav>