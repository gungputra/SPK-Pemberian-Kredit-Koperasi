<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_kriteria');
    //Codeigniter : Write Less Do More
  }

  function index(){
    if ($this->session->userdata('is_login')==TRUE) {
      $data['data'] = $this->M_kriteria->get_bobot_kriteria();
      //var_dump($data);
      $this->load->view('kriteria',$data);
    }
    else {
      $this->load->view('login');
    }
  }

  function kelola($kriteria){
    $hasil = $this->M_kriteria->get_tabel_kriteria($kriteria);
    $tabel = $hasil->tabel;

    $kriteria_pilihan = $hasil->kriteria;
    $detail_kriteria = $this->M_kriteria->get_kriteria($tabel);
    $data=array(
      'tabel' => $tabel,
      'kriteria_pilihan' => $kriteria_pilihan,
      'detail_kriteria' => $detail_kriteria
    );
    return $this->load->view('edit_kriteria',$data);
  }

  function edit_kriteria(){
    $data = $this->M_kriteria->edit_kriteria();
    if($data==6){
      $this->session->set_flashdata('error', 'Gagal mengedit bobot, harap memasukkan angka yang valid dan memiliki jumlah 100!');
    }
    else if($data==0){
      $this->session->set_flashdata('info', 'Tidak ada bobot yang diedit!');
    }
    else $this->session->set_flashdata('success', 'Bobot berhasil diedit!');
    redirect('Kriteria');
  }

  function delete($tabel,$id,$id_ku){
    $hasil = $this->M_kriteria->delete_kriteria($tabel,$id,$id_ku);
    if($hasil){
      $this->session->set_flashdata('success', 'Opsi kriteria berhasil dihapus!');
    }
    else $this->session->set_flashdata('error', 'Gagal menghapus opsi kriteria!');
    redirect('Kriteria');
  }

  function add_kriteria($tabel){
    $hasil = $this->M_kriteria->add_kriteria($tabel);
    if($hasil){
      $this->session->set_flashdata('success', 'Opsi kriteria berhasil ditambah!');
    }
    else $this->session->set_flashdata('error', 'Gagal menambah opsi kriteria!');
    redirect('Kriteria');
  }

  function ajax_get_opsi($tabel){
    $col_id = 'id_'.$tabel;
    $col_opsi = 'opsi_'.$tabel;
    $col_bobot = 'nilai_'.$tabel;
    $hasil = $this->M_kriteria->ajax_get_opsi($tabel);
    $data = array(
      'id' => $hasil[0]->$col_id,
      'opsi' => $hasil[0]->$col_opsi,
      'bobot' => $hasil[0]->$col_bobot,
    );
    echo json_encode($data);
  }

  function edit_opsi_kriteria($tabel){
    $hasil = $this->M_kriteria->edit_opsi_kriteria($tabel);
    if ($hasil) {
      $this->session->set_flashdata('success', 'Opsi Kriteria berhasil diedit!');
    }
    else {
      $this->session->set_flashdata('error', 'Gagal mengedit opsi kriteria!');
    }
    redirect('Kriteria');
  }

}
