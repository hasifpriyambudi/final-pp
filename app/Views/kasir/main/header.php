<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #00CC88;" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-circle-user"></i> <!-- or fa-seedling-->
        </div>
        <div class="sidebar-brand-text mx-3">User <sup><?= session('nama'); ?></sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="linkMenuUtama">
        <a class="nav-link" href="/kasir/menu_utama">
            <i class="fas fa-fw fa-salad"></i>
            <span>Menu Utama</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" id="linkMenuUtama" href="/kasir"><i class="fas fa-fw fa-salad"></i>Menu</a>
    </li> -->
    <!-- Nav Item - Tables -->
    <li class="nav-item" id="linkPembayaran">
        <a class="nav-link" href="/kasir/pembayaran">
            <i class="fas fa-sharp fa-fw fa-cart-shopping"></i>
            <span>Pembayaran</span></a>
    </li>

    <li class="nav-item" id="linkKomplain">
        <a class="nav-link" href="/kasir/komplain">
            <i class="fa-regular fa-brake-warning"></i>
            <span>Komplain</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item" id="logout">
		<a class="nav-link" href="#">
			<i class="fa-solid fa-right-from-bracket"></i>
			<span>Logout</span></a>
	</li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>