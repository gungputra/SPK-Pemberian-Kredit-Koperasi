<?php
  $id='id_'.$tabel;
  $opsi='opsi_'.$tabel;
  $nilai='nilai_'.$tabel;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Manage Kriteria - SISEM PENDUKUNG KEPUTUSAN</title>

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
  <div class="card" style=" margin-bottom:100px">
    <div class="card-header success-color white-text">
      <h5>Kelola Kriteria <?php echo $kriteria_pilihan ?></h5>
    </div>
    <div class="card-body" style="margin-left:30px; margin-right:30px; margin-top:9px;">
      <a title="Tambah kriteria" id="btn_add_kriteria" class="btn btn-success btn-sm text-white pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Tambah</a>
      <h4 class="card-title text-center" style="margin-bottom:30px;">Kelola Kriteria <?php echo $kriteria_pilihan ?> pada Menu Ini</h4>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo $kriteria_pilihan ?></th>
            <th>Bobot</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php $no=0 ?>
        <?php foreach ($detail_kriteria as  $key => $row)
        {?>
          <tr>
            <td><?php echo $row->$id ?></td>
            <td><?php echo $row->$opsi ?></td>
            <td><?php echo $row->$nilai ?></td>
            <td>
              <?php $id_ku=$row->$id ?>
              <a href="javascript:void(0)" title="Edit kriteria" id="" class="btn btn-warning btn-md text-white btn_edit" onclick="show_edit_kriteria(<?php echo $row->$id ?>)"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</a>
              <a href="<?php echo base_url("Kriteria/delete/".$tabel."/".$id."/".$id_ku."")?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-md"><i class="fa fa-trash" aria-hidden="true"></i>   Hapus</a>
            </td>
          </tr>
          <?php $no++; ?>
        <?php
        }?>

      </table>
    </div>
  </div>

  <div class="modal fade" id="modal_add_kriteria" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-notify modal-success modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header text-center">
                  <h4 id="header" class="modal-title white-text w-100 font-bold py-2">TAMBAH OPSI KRITERIA</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
              </div>

              <!--Body-->
              <div class="modal-body">
                <form id="" class="" action="<?php echo base_url('Kriteria/add_kriteria/'.$tabel.'') ?>" method="post">
                  <div class="md-form">
                    <input type="text" id="id" name="id" required>
                    <label for="id">ID</label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="opsi" name="opsi" required>
                    <label for="opsi"><?php echo $kriteria_pilihan ?></label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="bobot" name="bobot" required>
                    <label for="bobot">Bobot</label>
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

  <div class="modal fade" id="modal_edit_kriteria" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-notify modal-success modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
              <!--Header-->
              <div class="modal-header text-center">
                  <h4 id="header" class="modal-title white-text w-100 font-bold py-2">EDIT OPSI KRITERIA</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
              </div>

              <!--Body-->
              <div class="modal-body">
                <form id="" class="" action="<?php echo base_url('Kriteria/edit_opsi_kriteria/'.$tabel.'') ?>" method="post">
                  <div class="md-form">
                    <input type="text" id="edit_id" name="edit_id" required readonly value=" ">
                    <label for="edit_id">ID</label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="edit_opsi" name="edit_opsi" required value=" ">
                    <label for="edit_opsi"><?php echo $kriteria_pilihan ?></label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="edit_bobot" name="edit_bobot" required value=" ">
                    <label for="edit_bobot">Bobot</label>
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
    $('#manage_kriteria').addClass('active');
    $(".button-collapse").sideNav();

  });

  $('#btn_add_kriteria').click(function(e) {
    e.preventDefault();
    $('#modal_add_kriteria').modal('show');
  });

  function show_edit_kriteria(id){
    $.ajax({
      url: '<?php echo base_url('Kriteria/ajax_get_opsi/'.$tabel.'') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        id: id,
      },
      success:function(data){              
        $('#edit_id').val(data.id);
        $('#edit_opsi').val(data.opsi);
        $('#edit_bobot').val(data.bobot);
      },
      error:function(){
        alert('error get kriteria');
      }
    });
    $('#modal_edit_kriteria').modal('show');
  }

</script>
</body>
</html>
