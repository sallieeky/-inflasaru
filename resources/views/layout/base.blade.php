<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>INFLASARU</title>

  <!-- Custom fonts for this template -->
  <link href="{{ asset("template") }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset("template") }}/css/sb-admin-2.min.css" rel="stylesheet">


  <!-- Custom styles for this page -->
  <link href="{{ asset("template") }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
              <div class="sidebar-brand-icon">
                  <i class="fa-solid fa-fw fa-envelopes-bulk"></i>
              </div>
              <div class="sidebar-brand-text mx-3">INFLASARU</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
              <a class="nav-link" href="/">
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
          @if(Auth::user()->role == "admin")
          <li class="nav-item" id="datauser">
              <a class="nav-link" href="/data-user">
                  <i class="fa-solid fa-fw fa-user"></i>
                  <span>Data User</span></a>
          </li>
          @endif


          <!-- Nav Item - Data Master -->
          <li class="nav-item" id="suratnav">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesurat"
                  aria-expanded="true" aria-controls="collapsesurat">
                  <i class="fa-solid fa-fw fa-envelope"></i>
                  <span>Data Surat</span>
              </a>
              <div id="collapsesurat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item" href="/surat/surat-masuk" id="listsm">Surat Masuk</a>
                      <a class="collapse-item" href="/surat/surat-keluar" id="listsk">Surat Keluar</a>
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
                      <a class="collapse-item" href="/arsip/no-arsip">Nomor Arsip</a>
                      <a class="collapse-item" href="/arsip/surat-masuk">Arsip Surat Masuk</a>
                      <a class="collapse-item" href="/arsip/surat-keluar">Arsip Surat Keluar</a>
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
                      <a class="collapse-item" href="/laporan/surat-masuk">Laporan Surat Masuk</a>
                      <a class="collapse-item" href="/laporan/surat-keluar">Laporan Surat Keluar</a>
                  </div>
              </div>
          </li>

          @if(Auth::user()->role == "admin")
          <!-- Nav Item - Data Administrator -->
          <li class="nav-item" id="datasistem">
              <a class="nav-link" href="/data-sistem">
                  <i class="fas fa-fw fa-database"></i>
                  <span>Data Sistem</span></a>
          </li>
          @endif

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block mb-0 mt-3">

          <!-- Nav Item - Data Administrator -->
          <li class="nav-item">
              <a class="nav-link" href="/logout">
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

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nama }}</span>
                          <img class="img-profile rounded-circle" style="width: 50px; height: 50px"
                              src="{{ asset("storage/foto/" . Auth::user()->foto) }}">
                      </a>
                      <!-- Dropdown - User Information -->
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="/profil">
                              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Profil
                          </a>
                          <a class="dropdown-item" href="/logout">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Logout
                          </a>
                      </div>
                  </li>
              </ul>
            </nav>
            <!-- End of Topbar -->

            @yield("content")

          {{-- </div> <!-- End of Main Content --> --}}

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; INFLASARU 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Bootstrap core JavaScript-->
<script src="{{ asset("template") }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset("template") }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset("template") }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset("template") }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset("template") }}/js/demo/datatables-demo.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset("template") }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset("template") }}/js/sb-admin-2.min.js"></script>


<!-- Page level custom scripts -->
<script src="{{ asset("template") }}/js/demo/chart-area-demo.js"></script>
<script src="{{ asset("template") }}/js/demo/chart-pie-demo.js"></script>

</body>

</html>