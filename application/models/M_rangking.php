<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rangking extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all($number,$offset){
    $this->db->join('nasabah','nasabah.nik = hasil_akhir.nik');
    $this->db->order_by('nilai_akhir','DESC');
    return $this->db->get('hasil_akhir',$number,$offset)->result();
  }

}
