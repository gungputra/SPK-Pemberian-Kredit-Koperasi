<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
    //Codeigniter : Write Less Do More
  }

  function index(){
    if ($this->session->userdata('is_login')==TRUE) {
      $data['user'] = $this->M_user->get_user();
      $data['role'] = $this->M_user->get_role();
      $this->load->view('user',$data);
    }
    else {
      $this->load->view('login');
    }
  }

  function ajax_get_user(){
    $data = $this->M_user->ajax_get_user();
    echo json_encode($data);
  }

  function delete_user($username){
    $hasil = $this->M_user->delete_user($username);
    //var_dump($hasil);
    if ($hasil) {
      $this->session->set_flashdata('success', 'User berhasil dihapus!');
    }
    else {
      $this->session->set_flashdata('error', 'Gagal menghapus user!');
    }
    redirect('User');
  }

  function add_user(){
    $data = $this->M_user->add_user();
    if ($data=='berhasil') {
      $this->session->set_flashdata('success', 'User baru terlah ditambahkan!');
    }
    else if($data=='username_sama'){
      $this->session->set_flashdata('error', 'Username yang dimasukkan telah terdaftar sebelumnya!');
    }
    else if($data=='password_beda'){
      $this->session->set_flashdata('error', 'Password yang dimasukkan tidak sama!');
    }
    redirect('User');
  }

  function login(){
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $data = $this->M_user->login($username,$password);
    if ($data) {
      if ($data['password']==$password) {
        $data['is_login']=TRUE;
        $this->session->set_userdata($data);
        //var_dump($this->session->userdata());
        redirect('Home');
      }
      else {
        $this->session->set_flashdata('error', 'Password tidak sesuai, silahkan coba kembali!');
        redirect('User');
      }
    }
    else {
      $this->session->set_flashdata('error', 'Username tidak terdaftar, silahkan masukkan username terdaftar!');
      redirect('User');
    }
  }

  function logout(){
    $this->session->sess_destroy();
    //var_dump($this->session->userdata());
    redirect('User');
  }
}
