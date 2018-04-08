<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>HASIL RANGKING - SISEM PENDUKUNG KEPUTUSAN</title>

    <!--<link rel="icon" href="'/images/telkom.png') ?>">-->
    <link href='<?php echo base_url('assets/css/font-awesome.min.css') ?>' rel="stylesheet" >
    <link href='<?php echo base_url('assets/css/bootstrap.min.css') ?>' rel="stylesheet">
    <link href='<?php echo base_url('assets/css/compiled.min.css') ?>' rel="stylesheet">
    <link href='<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>' rel="stylesheet">
    <link href='<?php echo base_url('assets/css/dataTables.bootstrap.min.css') ?>' rel="stylesheet">
    <link href='<?php echo base_url('assets/css/style.css') ?>' rel="stylesheet">

</head>
<body class="">

<nav class="navbar navbar-toggleable-md navbar-dark bg-success fixed-top " style="margin-bottom:30px;">
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
<div class="" style="margin-left:30px; margin-right:30px; margin-top:80px;">
  <div class="card" style=" margin-bottom:100px">
    <div class="card-header success-color white-text">
      <h5>Hasil Rangking</h5>
    </div>
    <div class="card-body" style="margin-left:30px; margin-right:30px; margin-top:9px;">
      <h4 class="card-title text-center" style="margin-bottom:30px;">Berikut Hasil dari Perangkingan</h4>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jaminan</th>
            <th>Tanggungan</th>
            <th>Pekerjaan</th>
            <th>Penghasilan</th>
            <th>Status Rumah</th>
            <th>Total</th>
          </tr>
        </thead>
        <?php $no=1 ?>
        <?php foreach ($rangking as  $key => $row)
        {?>
          <tr>
            <td><?php echo $no?></td>
            <td><?php echo $row->nik ?></td>
            <td><?php echo $row->nama ?></td>
            <td><?php echo $row->kriteria_jaminan ?></td>
            <td><?php echo $row->kriteria_jumlah_tanggungan ?></td>
            <td><?php echo $row->kriteria_pekerjaan ?></td>
            <td><?php echo $row->kriteria_penghasilan ?></td>
            <td><?php echo $row->kriteria_status_rumah ?></td>
            <td><?php echo $row->nilai_akhir ?></td>
          </tr>
          <?php $no++; ?>
        <?php
        }?>

      </table>
      <div class="" style="margin-bottom:20px;">
        <?php echo $this->pagination->create_links() ?>
      </div>
    </div>
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
    $('#summary').addClass('active');
    $(".button-collapse").sideNav();
  });
</script>
</body>
</html>
