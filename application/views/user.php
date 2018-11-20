<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>MANAGE USER - SISEM PENDUKUNG KEPUTUSAN</title>

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
      <h5>List User</h5>
    </div>
    <div class="card-body" style="margin-left:30px; margin-right:30px; margin-top:9px;">
      <a href="" title="Tambah nasabah" id="btn_add_user" class="btn btn-success btn-sm text-white pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Tambah</a>
      <table id="tb_list_user" class="table table-striped table-hover" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama User</th>
            <th>Role User</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php $no=1; ?>
        <?php foreach ($user as  $key => $row)
        {?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row->username ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->role ?></td>
            <td>
              <a href="javascript:void(0)" title="Edit user" id="" class="btn btn-warning btn-sm text-white btn_edit" onclick="edit_user('<?php echo $row->username ?>')"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</a>
              <a href="<?php echo base_url("User/delete_user/".$row->username."")?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>   Hapus</a>
            </td>
          </tr>
        <?php $no++;
        }?>
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
                  <h4 id="header" class="modal-title white-text w-100 font-bold py-2">TAMBAH USER</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
              </div>

              <!--Body-->
              <div class="modal-body">
                <form id="" class="" action="<?php echo base_url('User/add_user') ?>" method="post">
                  <div class="md-form">
                    <input type="text" id="username" name="username" required>
                    <label for="nik">Username User Baru</label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="name" name="name" required>
                    <label for="nama">Nama User Baru</label>
                  </div>
                  <div class="md-form">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                  </div>
                  <div class="md-form">
                    <input type="password" id="rpt_password" name="rpt_password" required>
                    <label for="password">Repeat Password</label>
                  </div>
                  <div class="md-form">
                    <select id="role_id" class="mdb-select colorful-select dropdown-success select_kriteria" name="role_id">
                      <option value="">Pilih Role</option>
                      <?php foreach ($role as $key)
                      {?>
                        <option value="<?php echo $key->role_id ?>"><?php echo $key->role ?></option>
                      <?php
                      }?>
                    </select>
                    <label for="select_sto">Role User</label>
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
  <div class="modal fade" id="modal_edit_user" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-notify modal-success modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header text-center">
                  <h4 id="header" class="modal-title white-text w-100 font-bold py-2">EDIT USER</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
              </div>

              <!--Body-->
              <div class="modal-body">
                <form id="" class="" action="<?php echo base_url('User/edit_user') ?>" method="post">
                  <input type="hidden" id="username_lama" name="username_lama" value=" " required>
                  <div class="md-form">
                    <input type="text" id="edit_username" name="edit_username" value=" " required>
                    <label for="nik">Username</label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="edit_nama" name="edit_name" value=" " required>
                    <label for="nama">Nama User</label>
                  </div>
                  <div class="md-form">
                    <input type="password" id="edit_password" name="edit_password" required>
                    <label for="edit_password">Password</label>
                  </div>
                  <div class="md-form">
                    <input type="password" id="edit_rpt_password" name="edit_rpt_password" required>
                    <label for="edit_rpt_password">Repeat Password</label>
                  </div>
                  <div class="md-form">
                    <select id="edit_role_id" class="mdb-select colorful-select dropdown-success select_kriteria" name="edit_role_id">
                      <option value="">Pilih Role</option>
                      <?php foreach ($role as $key)
                      {?>
                        <option value="<?php echo $key->role_id ?>"><?php echo $key->role ?></option>
                      <?php
                      }?>
                    </select>
                    <label for="select_sto">Role User</label>
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
    $('#tb_list_user').DataTable();
    if ("<?php echo $this->session->userdata('role_id')?>"!="ADMIN") {
      $('#manage_user').hide();
    }
    $('.select_kriteria').material_select();
    $('#manage_user').addClass('active');
    $(".button-collapse").sideNav();
  });

  $('#btn_add_user').click(function(e) {
    e.preventDefault();
    $('#modal_add_nasabah').modal('show');
  });

  function edit_user(username){
    $.ajax({
      url: '<?php echo base_url('User/ajax_get_user') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        username: username
      },
      success:function(data){
        console.log(data);
        $('#username_lama').val(data.username);
        $('#edit_username').val(data.username);
        $('#edit_nama').val(data.name);
      },
      error:function(){
        alert('error get user');
      }
    });
    $('#modal_edit_user').modal('show');
  }
</script>
</body>
</html>
