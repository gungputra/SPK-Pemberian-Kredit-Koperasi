<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_bobot_kriteria(){
    return $this->db->get('bobot_kriteria')->result();
  }

  function edit_kriteria(){
    $kriteria=array('jaminan','jumlah_tanggungan','pekerjaan','penghasilan','status_rumah');
    $bobot=array();
    $total=0;
    for ($i=0; $i < 5; $i++) {
      $item = [
        'id' => $i+1,
        'bobot' => $this->input->post($kriteria[$i])/100
      ];
      $total+=$this->input->post($kriteria[$i])/100;
      array_push($bobot, $item);
    }
    if ($total!=1) return 6;
    else return $this->db->update_batch('bobot_kriteria',$bobot,'id');
  }

  function get_tabel_kriteria($kriteria){
    $this->db->where('id',$kriteria);
    $this->db->from('bobot_kriteria');
    $tabel = $this->db->get()->result();
    return $tabel[0];
  }

  function get_kriteria($tabel){
    return $this->db->get($tabel)->result();
  }

  function get_kriteria_detail($tabel,$id){
    $col = 'id_'.$tabel;
    $target= 'nilai_'.$tabel;
    $this->db->where($col,$id);
    $this->db->select($target);
    $hasil = $this->db->get($tabel)->result();
    return $hasil[0]->$target;
  }

  function add_kriteria($tabel){
    $id = 'id_'.$tabel;
    $opsi = 'opsi_'.$tabel;
    $nilai = 'nilai_'.$tabel;
    $data = array(
      $id => $this->input->post('id'),
      $opsi => $this->input->post('opsi'),
      $nilai => $this->input->post('bobot'),
    );
    return $this->db->insert($tabel,$data);
  }

  function delete_kriteria($tabel,$id,$id_ku){
    $this->db->where($id, $id_ku);
    return $this->db->delete($tabel);
  }

  function ajax_get_opsi($tabel){
    $kolom = "id_".$tabel;
    $id = $this->input->post('id');
    $this->db->where($kolom, $id);
    return $this->db->get($tabel)->result();
  }

  function edit_opsi_kriteria($tabel){
    $col_id = 'id_'.$tabel;
    $col_opsi = 'opsi_'.$tabel;
    $col_bobot = 'nilai_'.$tabel;
    $this->db->where($col_id, $this->input->post('edit_id'));
    $data = array(      
      $col_opsi => $this->input->post('edit_opsi'),
      $col_bobot => $this->input->post('edit_bobot')
    );
    return $this->db->update($tabel,$data);
  }

  function get_jaminan(){
    return $this->db->get('kriteria_jaminan')->result();
  }

  function get_jumlah_tanggungan(){
    return $this->db->get('kriteria_jumlah_tanggungan')->result();
  }

  function get_pekerjaan(){
    return $this->db->get('kriteria_pekerjaan')->result();
  }

  function get_penghasilan(){
    return $this->db->get('kriteria_penghasilan')->result();
  }

  function get_status_rumah(){
    return $this->db->get('kriteria_status_rumah')->result();
  }
}
