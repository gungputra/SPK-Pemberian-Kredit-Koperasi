<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rangking extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all(){
    $this->db->join('kriteria_jaminan', 'kriteria_jaminan.id_kriteria_jaminan = nasabah.id_kriteria_jaminan');
    $this->db->join('kriteria_jumlah_tanggungan', 'kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan = nasabah.id_kriteria_jumlah_tanggungan');
    $this->db->join('kriteria_pekerjaan', 'kriteria_pekerjaan.id_kriteria_pekerjaan = nasabah.id_kriteria_pekerjaan');
    $this->db->join('kriteria_penghasilan', 'kriteria_penghasilan.id_kriteria_penghasilan = nasabah.id_kriteria_penghasilan');
    $this->db->join('kriteria_status_rumah', 'kriteria_status_rumah.id_kriteria_status_rumah = nasabah.id_kriteria_status_rumah');

    $this->db->join('hasil_akhir','hasil_akhir.nik = nasabah.nik');
    $this->db->order_by('hasil_akhir.nilai_akhir','DESC');
    return $this->db->get('nasabah')->result();
  }

}
