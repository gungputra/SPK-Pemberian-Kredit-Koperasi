<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>MANAGE KRITERIA - SISEM PENDUKUNG KEPUTUSAN</title>

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
  <div class="" style="width:100%">
    <h5 class="badge badge-danger" style="margin-bottom:15px;width:100%; height:200%; font-size:25px"><?php echo $this->session->flashdata('error') ?></h5>
  </div>
  <div class="" style="width:100%;">
    <h5 class="badge badge-info" style="margin-bottom:15px;width:100%; height:200%; font-size:25px"><?php echo $this->session->flashdata('info') ?></h5>
  </div>
  <div class="" style="width:100%;">
    <h5 class="badge badge-success" style="margin-bottom:15px;width:100%; height:200%; font-size:25px"><?php echo $this->session->flashdata('success') ?></h5>
  </div>
  <div class="card" style="">
    <div class="card-header success-color white-text">
      <h5>Persentase Bobot Kriteria</h5>
    </div>
    <div class="card-body" style="margin-left:30px; margin-right:30px; margin-top:9px;">
      <h4 class="card-title text-center" style="margin-bottom:30px;">Atur Persentase Bobot Kriteria pada Menu Ini</h4>
      <div class="row text-center">
        <div class="col">
          Jaminan
        </div>
        <div class="col">
          Jumlah Tanggungan
        </div>
        <div class="col">
          Pekerjaan
        </div>
        <div class="col">
          Penghasilan
        </div>
        <div class="col">
          Status Rumah
        </div>
      </div>
      <form class="" action="<?php echo base_url('Kriteria/edit_kriteria') ?>" method="post">
        <div class="row text-center">
          <div class="col">
            <input type="text" id="jaminan" name="jaminan" class="form-control input_bobot" required readonly value="<?php echo $data[0]->bobot*100 ?>">
          </div>
          <div class="col">
            <input type="text" id="jumlah_tanggungan" name="jumlah_tanggungan" class="form-control input_bobot" required readonly value="<?php echo $data[1]->bobot*100 ?>">
          </div>
          <div class="col">
            <input type="text" id="pekerjaan" name="pekerjaan" class="form-control input_bobot" required readonly value="<?php echo $data[2]->bobot*100 ?>">
          </div>
          <div class="col">
            <input type="text" id="penghasilan" name="penghasilan" class="form-control input_bobot" required readonly value="<?php echo $data[3]->bobot*100 ?>">
          </div>
          <div class="col">
            <input type="text" id="status_rumah" name="status_rumah" class="form-control input_bobot" required readonly value="<?php echo $data[4]->bobot*100 ?>">
          </div>
        </div>
        <div class="pull-right">
          <button type="submit" class="btn btn-primary white-text btn-md" hidden id="btn_submit"><i class="fa fa-save"></i>       Save</button>
        </div>
      </form>
      <button type="" class="pull-right btn btn-warning white-text btn-md" id="btn_edit"><i class="fa fa-pencil"></i>       Edit</button>
      <button type="" class="pull-right btn btn-warning white-text btn-md" id="btn_cancel" hidden>Cancel</button>
    </div>
  </div>

  <div class="card" style="margin-top:20px; margin-bottom:100px">
    <div class="card-header success-color white-text">
      <h5>List Kriteria</h5>
    </div>
    <div class="card-body" style="margin-left:30px; margin-right:30px; margin-top:9px;">
      <h4 class="card-title text-center" style="margin-bottom:30px;">Atur Masing-masing Kriteria dengan Klik Salah Satu Tombol</h4>
      <div class="row text-center" style="margin-bottom:20px">
        <div class="col">
          <a class="btn btn-info btn-md" href="<?php echo base_url('Kriteria/kelola/1') ?>">Jaminan</a>
        </div>
        <div class="col">
          <a class="btn btn-info btn-md" href="<?php echo base_url('Kriteria/kelola/2') ?>">Jumlah Tanggungan</a>
        </div>
        <div class="col">
          <a class="btn btn-info btn-md" href="<?php echo base_url('Kriteria/kelola/3') ?>">Pekerjaan</a>
        </div>
        <div class="col">
          <a class="btn btn-info btn-md" href="<?php echo base_url('Kriteria/kelola/4') ?>">Penghasilan</a>
        </div>
        <div class="col">
          <a class="btn btn-info btn-md" href="<?php echo base_url('Kriteria/kelola/5') ?>">Status Rumah</a>
        </div>
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
    $('#manage_kriteria').addClass('active');
    $(".button-collapse").sideNav();

    $('#btn_edit').click(function(){
      $('#btn_edit').prop('hidden', true);
      $('#btn_cancel').prop('hidden', false);
      $('#btn_submit').prop('hidden', false);
      $('.input_bobot').prop('readonly', false);
    });
    $('#btn_cancel').click(function(){
      $('#btn_edit').prop('hidden', false);
      $('#btn_cancel').prop('hidden', true);
      $('#btn_submit').prop('hidden', true);
      $('.input_bobot').prop('readonly', true);
      $("#jaminan").val("<?php echo $data[0]->bobot*100 ?>");
      $("#jumlah_tanggungan").val("<?php echo $data[1]->bobot*100 ?>");
      $("#pekerjaan").val("<?php echo $data[2]->bobot*100 ?>");
      $("#penghasilan").val("<?php echo $data[3]->bobot*100 ?>");
      $("#status_rumah").val("<?php echo $data[4]->bobot*100 ?>");
    });
  });
</script>
</body>
</html>
