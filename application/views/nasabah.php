<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>MANAGE NASABAH - SISEM PENDUKUNG KEPUTUSAN</title>

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
    <h5 class="badge badge-success" style="margin-bottom:15px;width:100%; height:200%; font-size:25px"><?php echo $this->session->flashdata('success') ?></h5>
  </div>
  <div class="card" style=" margin-bottom:100px">
    <div class="card-header success-color white-text">
      <h5>List Nasabah</h5>
    </div>
    <div class="card-body" style="margin-left:30px; margin-right:30px; margin-top:9px;">
      <a href="" title="Tambah nasabah" id="btn_add_nasabah" class="btn btn-success btn-sm text-white pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Tambah</a>
      <table class="table table-striped table-hover table-responsive table-sm" style="margin-right:3px;">
        <thead>
          <tr>
            <th>NIK</th>
            <th>Nama Nasabah</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Jaminan</th>
            <th>Jumlah Tanggungan</th>
            <th>Pekerjaan</th>
            <th>Penghasilan</th>
            <th>Status Rumah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($nasabah as  $key => $row)
          {?>
            <tr>
              <td><?php echo $row->nik ?></td>
              <td><?php echo $row->nama ?></td>
              <td><?php echo $row->jenis_kelamin ?></td>
              <td><?php echo $row->tanggal_lahir ?></td>
              <td><?php echo $row->alamat ?></td>
              <td><?php echo $row->opsi_kriteria_jaminan ?></td>
              <td><?php echo $row->opsi_kriteria_jumlah_tanggungan ?></td>
              <td><?php echo $row->opsi_kriteria_pekerjaan ?></td>
              <td><?php echo $row->opsi_kriteria_penghasilan ?></td>
              <td><?php echo $row->opsi_kriteria_status_rumah ?></td>
              <td>
                <a href="javascript:void(0)" title="Edit nasabah" id="" class="btn btn-warning btn-sm text-white btn_edit" onclick="edit_nasabah(<?php echo $row->nik ?>)"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</a>
                <a href="<?php echo base_url("Nasabah/delete_nasabah/".$row->nik."")?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>   Hapus</a>
              </td>
            </tr>
            <?php
          }?>
        </tbody>
      </table>
      <div class="" style="margin-bottom:20px;">
        <?php echo $this->pagination->create_links() ?>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal_add_nasabah" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-notify modal-success modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header text-center">
                  <h4 id="header" class="modal-title white-text w-100 font-bold py-2">TAMBAH NASABAH</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
              </div>

              <!--Body-->
              <div class="modal-body">
                <form id="" class="" action="<?php echo base_url('Nasabah/add_nasabah') ?>" method="post">
                  <div class="row">
                    <div class="md-form col">
                      <input type="text" id="nik" name="nik" required>
                      <label for="nik">NIK</label>
                    </div>
                    <div class="md-form col">
                      <input type="text" id="nama" name="nama" required>
                      <label for="nama">Nama Nasabah Baru</label>
                    </div>
                  </div>
                  <div class="md-form">
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                    <label for="tanggal_lahir" class="active">Tanggal Lahir</label>
                  </div>
                  <div class="md-form">
                    <textarea type="text" required id="alamat" name="alamat" class="form-control md-textarea" value="" required></textarea>
                    <label for="alamat">Alamat</label>
                  </div>
                  <div class="row">
                    <div class="md-form col col-md-6">
                      <select id="jenis_kelamin" class="mdb-select colorful-select dropdown-success select_kriteria" name="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="md-form col col-md-6">
                      <select id="id_kriteria_jaminan" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_jaminan">
                        <option value="">Pilih Jenis Jaminan</option>
                        <?php foreach ($jaminan as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_jaminan ?>"><?php echo $key->opsi_kriteria_jaminan ?></option>
                        <?php
                        }?>
                      </select>
                      <label for="id_kriteria_jaminan">Jaminan</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="md-form col">
                      <select id="id_kriteria_jumlah_tanggungan" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_jumlah_tanggungan">
                        <option value="">Pilih Jumlah Tanggungan </option>
                        <?php foreach ($jumlah_tanggungan as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_jumlah_tanggungan ?>"><?php echo $key->opsi_kriteria_jumlah_tanggungan ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="id_kriteria_jumlah_tanggungan">Jumlah Tanggungan</label>
                    </div>
                    <div class="md-form col">
                      <select id="id_kriteria_pekerjaan" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_pekerjaan">
                        <option value="">Pilih Jenis Pekerjaan</option>
                        <?php foreach ($pekerjaan as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_pekerjaan ?>"><?php echo $key->opsi_kriteria_pekerjaan ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="select_sto">Jenis Pekerjaan</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="md-form col">
                      <select id="id_kriteria_penghasilan" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_penghasilan">
                        <option value="">Pilih Jumlah Penghasilan</option>
                        <?php foreach ($penghasilan as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_penghasilan ?>"><?php echo $key->opsi_kriteria_penghasilan ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="id_kriteria_penghasilan">Jumlah Penghasilan</label>
                    </div>
                    <div class="md-form col">
                      <select id="id_kriteria_status_rumah" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_status_rumah">
                        <option value="">Pilih Status Rumah</option>
                        <?php foreach ($status_rumah as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_status_rumah ?>"><?php echo $key->opsi_kriteria_status_rumah ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="select_sto">Status Rumah</label>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="submit" id=""class="btn btn-outline-secondary-modal waves-effect">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
                  </div>
                </form>
              </div>
              <!--Footer-->
          </div>
          <!--/.Content-->
      </div>
  </div>
  <div class="modal fade" id="modal_edit_nasabah" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-notify modal-success modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header text-center">
                  <h4 id="header" class="modal-title white-text w-100 font-bold py-2">EDIT NASABAH</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
              </div>

              <!--Body-->
              <div class="modal-body">
                <form id="" class="" action="<?php echo base_url('Nasabah/edit_nasabah') ?>" method="post">
                  <div class="row">
                    <div class="md-form col">
                      <input type="text" id="edit_nik" name="edit_nik" value=" " required readonly>
                      <label for="nik">NIK</label>
                    </div>
                    <div class="md-form col">
                      <input type="text" id="edit_nama" name="edit_nama" value=" " required>
                      <label for="nama">Nama Nasabah</label>
                    </div>
                  </div>
                  <div class="md-form">
                    <input type="date" id="edit_tanggal_lahir" name="edit_tanggal_lahir" required>
                    <label for="tanggal_lahir" class="active">Tanggal Lahir</label>
                  </div>
                  <div class="md-form">
                    <textarea type="text" required id="edit_alamat" name="edit_alamat" class="form-control md-textarea" value="" required> </textarea>
                    <label for="alamat">Alamat</label>
                  </div>
                  <div class="row">
                    <div class="md-form col col-md-6">
                      <select id="edit_jenis_kelamin" class="mdb-select colorful-select dropdown-success select_kriteria" name="edit_jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="md-form col">
                      <select id="id_kriteria_jaminan" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_jaminan" required>
                        <option value="">Pilih Jenis Jaminan</option>
                        <?php foreach ($jaminan as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_jaminan ?>"><?php echo $key->opsi_kriteria_jaminan ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="id_kriteria_jaminan">Jaminan</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="md-form col">
                      <select id="id_kriteria_jumlah_tanggungan" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_jumlah_tanggungan" required>
                        <option value="">Pilih Jumlah Tanggungan </option>
                        <?php foreach ($jumlah_tanggungan as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_jumlah_tanggungan ?>"><?php echo $key->opsi_kriteria_jumlah_tanggungan ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="id_kriteria_jumlah_tanggungan">Jumlah Tanggungan</label>
                    </div>
                    <div class="md-form col">
                      <select id="id_kriteria_pekerjaan" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_pekerjaan" required>
                        <option value="">Pilih Jenis Pekerjaan</option>
                        <?php foreach ($pekerjaan as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_pekerjaan ?>"><?php echo $key->opsi_kriteria_pekerjaan ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="select_sto">Jenis Pekerjaan</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="md-form col">
                      <select id="id_kriteria_penghasilan" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_penghasilan" required>
                        <option value="">Pilih Jumlah Penghasilan</option>
                        <?php foreach ($penghasilan as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_penghasilan ?>"><?php echo $key->opsi_kriteria_penghasilan ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="id_kriteria_penghasilan">Jumlah Penghasilan</label>
                    </div>
                    <div class="md-form col">
                      <select id="id_kriteria_status_rumah" class="mdb-select colorful-select dropdown-success select_kriteria" name="id_kriteria_status_rumah" required>
                        <option value="">Pilih Status Rumah</option>
                        <?php foreach ($status_rumah as $key)
                        {?>
                          <option value="<?php echo $key->id_kriteria_status_rumah ?>"><?php echo $key->opsi_kriteria_status_rumah ?></option>
                          <?php
                        }?>
                      </select>
                      <label for="select_sto">Status Rumah</label>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="submit" id=""class="btn btn-outline-secondary-modal waves-effect">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
                  </div>
                </form>
              </div>
              <!--Footer-->
          </div>
          <!--/.Content-->
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
    $('.select_kriteria').material_select();
    $('#manage_nasabah').addClass('active');
    $(".button-collapse").sideNav();
  });

  $('#btn_add_nasabah').click(function(e) {
    e.preventDefault();
    $('#modal_add_nasabah').modal('show');
  });

  function edit_nasabah(nik){
    $.ajax({
      url: '<?php echo base_url('Nasabah/ajax_get_nasabah') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        nik: nik
      },
      success:function(data){
        console.log(data);
        $('#edit_nik').val(data.nik);
        $('#edit_nama').val(data.nama);
        $('#edit_jenis_kelamin').val(data.jenis_kelamin);
        $('#edit_alamat').val(data.alamat);
      },
      error:function(){
        alert('error get nasabah');
      }
    });
    $('#modal_edit_nasabah').modal('show');
  }
</script>
</body>
</html>
