<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if ($this->session->userdata('is_login')==TRUE) {
      $this->load->view('home');
    }
    else {
      $this->load->view('login');
    }
  }

}
