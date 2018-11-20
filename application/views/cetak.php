<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <link href='<?php echo base_url('assets/css/bootstrap.min.css') ?>' rel="stylesheet">
  </head>
  <body>
    <p style="text-align:center">HASIL PERANGKINGAN SISTEM PENDUKUNG KEPUTUSAN PEMBERIAN KREDIT KOPERASI HARTA BHUANA SARI</p>
    <br>
    <div class="container">
        <table class="table table-striped table-hover table-sm">
          <thead>
            <tr>
              <th>Peringkat</th>
              <th>NIK</th>
              <th>Nama Nasabah</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Jumlah Pinjaman</th>
              <th>Jaminan</th>
              <th>Jumlah Tanggungan</th>
              <th>Pekerjaan</th>
              <th>Penghasilan</th>
              <th>Status Rumah</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <?php $no=1 ?>
          <?php foreach ($rangking as  $key => $row)
          {?>
            <tr>
              <td><?php echo $no?></td>
              <td><?php echo $row->nik ?></td>
              <td><?php echo $row->nama ?></td>
              <td><?php echo $row->jenis_kelamin ?></td>
              <td><?php echo $row->tanggal_lahir ?></td>
              <td><?php echo $row->alamat ?></td>
              <td>Rp.<?php echo $row->jumlah_pinjaman ?></td>
              <td><?php echo $row->opsi_kriteria_jaminan ?></td>
              <td><?php echo $row->opsi_kriteria_jumlah_tanggungan ?></td>
              <td><?php echo $row->opsi_kriteria_pekerjaan ?></td>
              <td><?php echo $row->opsi_kriteria_penghasilan ?></td>
              <td><?php echo $row->opsi_kriteria_status_rumah ?></td>
              <td><?php echo $row->nilai_akhir ?></td>
              <td><?php echo $row->status ?></td>
            </tr>
            <?php $no++; ?>
          <?php
          }?>

        </table>

    </div>

  </body>
</html>
