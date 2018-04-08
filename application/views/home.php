<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>HOME - SISEM PENDUKUNG KEPUTUSAN</title>

    <!-- Font Awesome -->
    <!--<link rel="icon" href="'/images/telkom.png') ?>">-->
    <link href='<?php echo base_url('assets/css/font-awesome.min.css') ?>' rel="stylesheet" >
    <link href='<?php echo base_url('assets/css/bootstrap.min.css') ?>' rel="stylesheet">
    <link href='<?php echo base_url('assets/css/compiled.min.css') ?>' rel="stylesheet">
    <link href='<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>' rel="stylesheet">
    <link href='<?php echo base_url('assets/css/dataTables.bootstrap.min.css') ?>' rel="stylesheet">
    <link href='<?php echo base_url('assets/css/style.css') ?>' rel="stylesheet">
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        html,
        body,
        .view {
            height: 96.45%;
        }
        /* Navigation*/

        .navbar {
            background-color: #cc0000;
        }

        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }

        .top-nav-collapse {
            background-color: #1C2331;
        }

        footer.page-footer {
            background-color: #1C2331;
            margin-top: -1px;
        }

        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #1C2331;
            }
        }
        /*Call to action*/

        .flex-center {
            color: #fff;
        }

        .view {
            background: url(<?= base_url() ?>assets/img/home.jpg)no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body class="">

<nav class="navbar navbar-toggleable-md navbar-dark bg-success fixed-top ">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapseEx12" aria-controls="collapseEx2" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">SPK</a>
    <div class="collapse navbar-collapse" id="collapseEx12">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item" id="home">
            <a class="nav-link" href="<?php echo base_url('Home/') ?>">Home <span class="sr-only"></span></a>
          </li>
          <li class="nav-item" id="manage_kriteria">
            <a class="nav-link" href="<?php echo base_url('Kriteria/') ?>">Manage Kriteria</a>
          </li>
          <li class="nav-item" id="manage_nasabah">
            <a class="nav-link" href="<?php echo base_url('Nasabah/') ?>">Manage Nasabah</a>
          </li>
          <li class="nav-item" id="summary">
            <a class="nav-link" href="<?php echo base_url('Rangking/') ?>">Hasil Rangking</a>
          </li>
          <li class="nav-item" id="manage_user">
            <a class="nav-link" href="<?php echo base_url('User/') ?>" >Manage User</a>
          </li>
        </ul>
        <form class="form-inline text-white">
          <a class="waves-effect waves-light" style="padding-right:1em"><i class="fa fa-user mr-1"></i>  <?php echo $this->session->userdata('name') ?>  (<?php echo $this->session->userdata('role') ?>)</a>
          <a class="" href="<?php echo base_url('User/logout') ?>" onclick="return confirm('Yakin ingin log out?')"><i class="fa fa-power-off mr-1 text-white waves-effect waves-light"></i></a>
        </form>
    </div>
  </div>
</nav>
<div class="view ">
    <div class="full-bg-img flex-center">
        <ul class="">
            <br><br><br><br><br><br>
            <li>
                <h1 class="h1-responsive">SISTEM PENDUKUNG KEPUTUSAN </h1>
            </li>
            <li>
                <h1 class="h1-responsive">PEMBERIAN KREDIT KOPERASI HARTA BHUANA SARI</h1>
            </li>
            <li>
                <p>_____________________________________________________________________________________________________</p>
            </li>
        </ul>
    </div>
</div>
<footer id='footer' class="page-footer center-on-small-only success-color fixed-bottom">


  <!--Copyright-->
  <div class="footer-copyright">
    <div class="container-static">
      © 2018 Copyright : STIKOM BALI
    </div>
  </div>
  <!--/.Copyright-->
</footer>

<!-- SCRIPTS -->
<script type="text/javascript" src='<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/js/tether.min.js') ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/js/bootstrap.min.js') ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/js/compiled.min.js') ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>'></script>

<script type="text/javascript" src='<?php echo base_url('assets/js/ajaxfileupload.js') ?>'></script>
<script type="text/javascript">
  $(document).ready(function(){
    if ("<?php echo $this->session->userdata('role_id')?>"!="ADMIN") {
      $('#manage_user').hide();
    }
    $('#home').addClass('active');
    $(".button-collapse").sideNav();
  });
</script>
</body>
</html>
