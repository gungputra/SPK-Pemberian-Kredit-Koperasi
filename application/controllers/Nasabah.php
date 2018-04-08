<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_nasabah','M_kriteria'));
    //Codeigniter : Write Less Do More
  }

  function index(){
    if ($this->session->userdata('is_login')==TRUE) {
      $jumlah_nasabah = $this->M_nasabah->jumlah_nasabah();
      $config['base_url'] = base_url('Nasabah/index');
      $config['total_rows'] = $jumlah_nasabah;
      $config['per_page'] = 5;
      $this->pagination->initialize($config);
      $from = $this->uri->segment(3);
      $nasabah = $this->M_nasabah->get_nasabah($config['per_page'],$from);
      //var_dump($data);
      $jaminan = $this->M_kriteria->get_jaminan();
      $jumlah_tanggungan = $this->M_kriteria->get_jumlah_tanggungan();
      $pekerjaan = $this->M_kriteria->get_pekerjaan();
      $penghasilan = $this->M_kriteria->get_penghasilan();
      $status_rumah = $this->M_kriteria->get_status_rumah();
      $data=array(
        'nasabah' => $nasabah,
        'jaminan' => $jaminan,
        'jumlah_tanggungan' => $jumlah_tanggungan,
        'pekerjaan' => $pekerjaan,
        'penghasilan' => $penghasilan,
        'status_rumah' => $status_rumah
      );
      $this->load->view('nasabah',$data);
    }
    else {
      $this->load->view('login');
    }
  }

  function add_nasabah(){
    $data = $this->M_nasabah->add_nasabah();
    if ($data) {
      $this->session->set_flashdata('success', 'Nasabah baru terlah ditambahkan!');
    }
    else {
      $this->session->set_flashdata('error', 'NIK yang dimasukkan telah terdaftar sebelumnya!');
    }
    redirect('Nasabah');
  }

  function delete_nasabah($nik){
    $hasil = $this->M_nasabah->delete_nasabah($nik);
    //var_dump($hasil);
    if ($hasil) {
      $this->session->set_flashdata('success', 'Nasabah berhasil dihapus!');
    }
    else {
      $this->session->set_flashdata('error', 'Gagal menghapus nasabah!');
    }
    redirect('Nasabah');
  }

  function edit_nasabah(){
    $hasil = $this->M_nasabah->edit_nasabah();
    if ($hasil) {
      $this->session->set_flashdata('success', 'Nasabah berhasil diedit!');
    }
    else {
      $this->session->set_flashdata('error', 'Gagal mengedit nasabah!');
    }
    redirect('Nasabah');
  }

  function ajax_get_nasabah(){
    $data = $this->M_nasabah->ajax_get_nasabah();
    echo json_encode($data);
  }
}
