<?php include '../config/url.php'; ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= $actual_link ?>assets/assets/images/favicon.png"> -->
  <title>Media Erendi Digital Labs</title>
  <!-- This page plugin CSS -->
  <link href="<?= $actual_link ?>assets/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?= $actual_link ?>assets/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
  <link href="<?= $actual_link ?>assets/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="<?= $actual_link ?>assets/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="<?= $actual_link ?>assets/dist/css/style.min.css" rel="stylesheet">

  


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!-- select2 -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css"></script> -->


  <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
  <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
  
  <script type="text/javascript" src="https://visjs.github.io/vis-network/standalone/umd/vis-network.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



  <style type="text/css">
    #ontology {
      width: 100%;
      height: 800px;
      /* border: 1px solid lightgray; */
      background-color:#F9FBFD;
    }
  </style>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<script>
  $(document).ready(function () {

    if (localStorage.getItem('status_login') != 'login') {
        window.location.href = '<?= $actual_link ?>';
    }

    $(".logout").on('click',(function(e) {
      localStorage.clear();
      window.location.href = '<?= $actual_link ?>';
    }));

    $('.select2').select2({
      placeholder: 'Cari',
      allowClear: true,
      width:'100%',
    });

    $('.select3').select2({
      placeholder: 'Pilih opsi',
      allowClear: true,
      width:'100%',
    });

    $('.select4').select2({
      placeholder: 'Pilih opsi',
      // allowClear: true,
      tags:true,
      tokenSeparators: [','],
      width:'100%',
    });

    $('.select5').select2({
      placeholder: 'Pilih opsi',
      allowClear: true,
      width:'100%',
    });
    
    $.ajax({
      url: '<?= $link_api ?>getuser/'+localStorage.getItem('id'),
      type: "GET",
      dataType: "JSON",
      success: function(response) {
        $('.username').html(response.data.username)
      },
      error: function(e) {
        console.log(e);
      }
    });
    




  });
</script>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
      <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
              class="ti-menu ti-close"></i></a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <div class="navbar-brand">
            <!-- Logo icon -->
            <!-- <a href="index.html" class="d-flex justify-content-center"> -->
            <center>Media Erendi</center>
            <!-- <b class="logo-icon">
                                <img src="<?= $actual_link ?>assets/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <img src="<?= $actual_link ?>assets/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <span class="logo-text">
                                <img src="<?= $actual_link ?>assets/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <img src="<?= $actual_link ?>assets/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span> -->
            <!-- </a> -->
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
            data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
            <!-- Notification -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span><i data-feather="bell" class="svg-icon"></i></span>
                <span class="badge badge-primary notify-no rounded-circle">5</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                <ul class="list-style-none">
                  <li>
                    <div class="message-center notifications position-relative">
                      <a href="javascript:void(0)"
                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay"
                            class="text-white"></i></div>
                        <div class="w-75 d-inline-block v-middle pl-2">
                          <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                          <span class="font-12 text-nowrap d-block text-muted">Just see
                            the my new
                            admin!</span>
                          <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                        </div>
                      </a>
                      <a href="javascript:void(0)"
                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="btn btn-success text-white rounded-circle btn-circle"><i data-feather="calendar"
                            class="text-white"></i></span>
                        <div class="w-75 d-inline-block v-middle pl-2">
                          <h6 class="message-title mb-0 mt-1">Event today</h6>
                          <span class="font-12 text-nowrap d-block text-muted text-truncate">Just
                            a reminder that you have event</span>
                          <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                        </div>
                      </a>
                      <a href="javascript:void(0)"
                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="btn btn-info rounded-circle btn-circle"><i data-feather="settings"
                            class="text-white"></i></span>
                        <div class="w-75 d-inline-block v-middle pl-2">
                          <h6 class="message-title mb-0 mt-1">Settings</h6>
                          <span class="font-12 text-nowrap d-block text-muted text-truncate">You
                            can customize this template
                            as you want</span>
                          <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                        </div>
                      </a>
                      <a href="javascript:void(0)"
                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="btn btn-primary rounded-circle btn-circle"><i data-feather="box"
                            class="text-white"></i></span>
                        <div class="w-75 d-inline-block v-middle pl-2">
                          <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                            class="font-12 text-nowrap d-block text-muted">Just
                            see the my admin!</span>
                          <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li>
                    <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                      <strong>Check all notifications</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </li> -->
            <!-- End Notification -->
            <!-- ============================================================== -->
            <!-- create new -->
            <!-- ============================================================== -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i data-feather="settings" class="svg-icon"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item d-none d-md-block">
              <a class="nav-link" href="javascript:void(0)">
                <div class="customize-input">
                  <select class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                    <option selected>EN</option>
                    <option value="1">AB</option>
                    <option value="2">AK</option>
                    <option value="3">BE</option>
                  </select>
                </div>
              </a>
            </li> -->
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            
            <li class="nav-item d-none d-md-block">
                <a class="nav-link" href="javascript:void(0)">
                    <div class="customize-input">
                        <select class="custom-select form-control bg-white custom-radius custom-shadow border-0 pilihan" name="id_pilihan" id="id_pilihan">
                            <option selected="true" disabled="disabled">Pilih</option>
                            <option value="katadasar">Kata Dasar</option>
                            <option value="kategori">Kategori</option>
                            <option value="prefik">Prefik</option>
                            <option value="suffik">Sufik</option>
                            <option value="kataganti">Kata Ganti</option>
                            <option value="bahasa">Bahasa</option>
                            <option value="negara">Negara</option>
                            <option value="provinsi">Provinsi</option>
                            <option value="kabupaten">Kabupaten</option>
                            <option value="kecamatan">Kecamatan</option>
                            <option value="desa">Desa</option>
                        </select>
                    </div>
                </a>
            </li>

            <li class="nav-item d-none d-md-block">
                <a class="nav-link" href="javascript:void(0)">
                    <div class="customize-input">
                      <form id="form_submit">
                        <select class="custom-select form-control bg-white custom-radius custom-shadow border-0 select2 search" name="id_search" id="id_search"></select>
                      </form>
                    </div>
                </a>
            </li>
            
            <!-- <li class="nav-item d-none d-md-block">
              <div class="nav-link">
                <form>
                  <div class="customize-input">
                    <input class="form-control custom-shadow custom-radius border-0 bg-white" id="search"
                      placeholder="Cari" aria-label="Search">
                    <i class="form-control-icon" data-feather="search"></i>
                  </div>
                </form>
              </div>
            </li> -->
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img src="<?= $actual_link ?>assets/assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="40">
                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark username"></span>
                  <i data-feather="chevron-down" class="svg-icon"></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                <!-- <div class="dropdown-divider"></div> -->
                <a class="dropdown-item logout" href="javascript:void(0)"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                  Logout
                </a>
                <!-- <div class="dropdown-divider"></div> -->
              </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php include 'menu.php'; ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->