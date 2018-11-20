<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nasabah extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_nasabah_all(){
    $this->db->join('kriteria_jaminan', 'kriteria_jaminan.id_kriteria_jaminan = nasabah.id_kriteria_jaminan');
    $this->db->join('kriteria_jumlah_tanggungan', 'kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan = nasabah.id_kriteria_jumlah_tanggungan');
    $this->db->join('kriteria_pekerjaan', 'kriteria_pekerjaan.id_kriteria_pekerjaan = nasabah.id_kriteria_pekerjaan');
    $this->db->join('kriteria_penghasilan', 'kriteria_penghasilan.id_kriteria_penghasilan = nasabah.id_kriteria_penghasilan');
    $this->db->join('kriteria_status_rumah', 'kriteria_status_rumah.id_kriteria_status_rumah = nasabah.id_kriteria_status_rumah');
    return $this->db->get('nasabah')->result();
  }

  function get_nasabah($number,$offset){
    $this->db->join('kriteria_jaminan', 'kriteria_jaminan.id_kriteria_jaminan = nasabah.id_kriteria_jaminan');
    $this->db->join('kriteria_jumlah_tanggungan', 'kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan = nasabah.id_kriteria_jumlah_tanggungan');
    $this->db->join('kriteria_pekerjaan', 'kriteria_pekerjaan.id_kriteria_pekerjaan = nasabah.id_kriteria_pekerjaan');
    $this->db->join('kriteria_penghasilan', 'kriteria_penghasilan.id_kriteria_penghasilan = nasabah.id_kriteria_penghasilan');
    $this->db->join('kriteria_status_rumah', 'kriteria_status_rumah.id_kriteria_status_rumah = nasabah.id_kriteria_status_rumah');
    return $this->db->get('nasabah',$number,$offset)->result();
  }

  function jumlah_nasabah(){
    return $this->db->get('nasabah')->num_rows();
  }

  function add_nasabah(){
    $this->db->where('nik', $this->input->post('nik'));
    $cek = $this->db->get('nasabah')->num_rows();
    if ($cek>0) {
      return false;
    }
    else {
      $data=array(
        'nik' => $this->input->post('nik'),
        'nama' => $this->input->post('nama'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat' => $this->input->post('alamat'),
        'jumlah_pinjaman' => $this->input->post('jumlah_pinjaman'),
        'id_kriteria_jaminan' => $this->input->post('id_kriteria_jaminan'),
        'id_kriteria_jumlah_tanggungan' => $this->input->post('id_kriteria_jumlah_tanggungan'),
        'id_kriteria_pekerjaan' => $this->input->post('id_kriteria_pekerjaan'),
        'id_kriteria_penghasilan' => $this->input->post('id_kriteria_penghasilan'),
        'id_kriteria_status_rumah' => $this->input->post('id_kriteria_status_rumah')
      );
      return $this->db->insert('nasabah',$data);
    }
  }

  function delete_nasabah($nik){
    $this->db->where('nik', $nik);
    return $this->db->delete('nasabah');
  }

  function edit_nasabah(){
    $nik_lama = $this->input->post('nik_lama');
    $nik_baru = $this->input->post('edit_nik');

    $data=array(
      'nama' => $this->input->post('edit_nama'),
      'nik' => $nik_baru,
      'tanggal_lahir' => $this->input->post('edit_tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('edit_jenis_kelamin'),
      'alamat' => $this->input->post('edit_alamat'),
      'jumlah_pinjaman' => $this->input->post('edit_jumlah_pinjaman'),
      'id_kriteria_jaminan' => $this->input->post('id_kriteria_jaminan'),
      'id_kriteria_jumlah_tanggungan' => $this->input->post('id_kriteria_jumlah_tanggungan'),
      'id_kriteria_pekerjaan' => $this->input->post('id_kriteria_pekerjaan'),
      'id_kriteria_penghasilan' => $this->input->post('id_kriteria_penghasilan'),
      'id_kriteria_status_rumah' => $this->input->post('id_kriteria_status_rumah')
    );

    $this->db->where('nik', $nik_baru);
    $cari = $this->db->get('nasabah')->num_rows();
    if ($cari>0) {
      if ($nik_lama==$nik_baru) {
        $this->db->where('nik', $nik_lama);
        $this->db->delete('nasabah');
        $this->db->reset_query();
        if($this->db->insert('nasabah', $data)) return 'berhasil';
      }
      else {
        return 'tersedia';
      }
    }
    else {
      $this->db->where('nik', $nik_lama);
      $this->db->delete('nasabah');
      $this->db->reset_query();
      if($this->db->insert('nasabah', $data)) return 'berhasil';
    }
  }

  function ajax_get_nasabah(){
    $nik=$this->input->post('nik');
    $this->db->where('nik',$nik);
    $hasil = $this->db->get('nasabah')->result();
    return $hasil[0];
  }
}
