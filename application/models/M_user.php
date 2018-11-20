<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function login($username,$password){
    $this->db->where('username',$username);
    $this->db->join('role', 'role.role_id = user.role_id');
    return $this->db->get('user')->row_array();
  }

  function get_user(){
    $this->db->join('role', 'role.role_id = user.role_id');
    return $this->db->get('user')->result();
  }

  function get_role(){
    return $this->db->get('role')->result();
  }

  function ajax_get_user(){
    $username=$this->input->post('username');
    $this->db->where('username',$username);
    $hasil = $this->db->get('user')->result();
    return $hasil[0];
  }

  function add_user(){
    $this->db->where('username', $this->input->post('username'));
    $cek = $this->db->get('user')->num_rows();
    if ($cek>0) {
      return 'username_sama';
    }
    else if ($this->input->post('password')==$this->input->post('rpt_password')) {
      $data=array(
        'username' => $this->input->post('username'),
        'name' => $this->input->post('name'),
        'password' => md5($this->input->post('password')),
        'role_id' => $this->input->post('role_id'),
      );
      $insert = $this->db->insert('user',$data);
      if ($insert) return 'berhasil';
    }
    else return 'password_beda';
  }

  function edit_user(){
    $username_lama = $this->input->post('username_lama');
    $username_baru = $this->input->post('edit_username');

    if ($this->input->post('edit_password')==$this->input->post('edit_rpt_password')) {
      $data=array(
        'username' => $this->input->post('edit_username'),
        'name' => $this->input->post('edit_name'),
        'password' => md5($this->input->post('edit_password')),
        'role_id' => $this->input->post('edit_role_id'),
      );
    }
    else {
      return 'password_beda';
    }

    $this->db->where('username', $username_baru);
    $cari = $this->db->get('user')->num_rows();
    if ($cari>0) {
      if ($username_lama==$username_baru) {
        $this->db->where('username', $username_lama);
        $this->db->delete('user');
        $this->db->reset_query();
        if($this->db->insert('user', $data)) return 'berhasil';
      }
      else {
        return 'tersedia';
      }
    }
    else {
      $this->db->where('username', $username_lama);
      $this->db->delete('user');
      $this->db->reset_query();
      if($this->db->insert('user', $data)) return 'berhasil';
    }
  }

  function delete_user($username){
    $this->db->where('username', $username);
    return $this->db->delete('user');
  }
}
