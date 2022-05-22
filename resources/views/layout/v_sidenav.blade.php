<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-fw fa-envelopes-bulk"></i>
                </div>
                <div class="sidebar-brand-text mx-3">INFLASARU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/Dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->


            <!-- Nav Item - Data Administrator -->
            <li class="nav-item" id="datauser">
                <a class="nav-link" href="/User/data_user">
                    <i class="fa-solid fa-fw fa-user"></i>
                    <span>Data User</span></a>
            </li>


            <!-- Nav Item - Data Master -->
            <li class="nav-item" id="suratnav">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesurat"
                    aria-expanded="true" aria-controls="collapsesurat">
                    <i class="fa-solid fa-fw fa-envelope"></i>
                    <span>Data Surat</span>
                </a>
                <div id="collapsesurat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/Surat/surat_masuk" id="listsm">Surat Masuk</a>
                        <a class="collapse-item" href="/Surat/surat_keluar" id="listsk">Surat Keluar</a>
                    </div>
                </div>
            </li>



            <!-- Nav Item - Data Transaksi -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-fw fa-folder-open"></i>
                    <span>Data Arsip</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/Arsip/no_arsip">Nomor Arsip</a>
                        <a class="collapse-item" href="/Arsip/arsip_surat_masuk">Arsip Surat Masuk</a>
                        <a class="collapse-item" href="/Arsip/arsip_surat_keluar">Arsip Surat Keluar</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Data Transaksi -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-fw fa-file"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/Laporan/laporan_surat_masuk">Laporan Surat Masuk</a>
                        <a class="collapse-item" href="/Laporan/laporan_surat_keluar">Laporan Surat Keluar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Data Administrator -->
            <li class="nav-item" id="datasistem">
                <a class="nav-link" href="/DataSistem/backuprestore">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Sistem</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block mb-0 mt-3">

            <!-- Nav Item - Data Administrator -->
            <li class="nav-item">
                <a class="nav-link" href="/Auth/logout">
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
                    and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
                    Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">