<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf {

  public function __construct()
  {
    $CI = &get_instance();
    log_message('Debug','mPDF Class Is Loaded');
  }

  function load($param=NULL){

    include_once APPPATH.'third_party\pdf\mpdf.php';
    if ($parram==NULL) {
      $parram = '"en-GB-x","A4","","",10,10,10,10,6,3';
    }
    return new mPDF($param);
  }

}
