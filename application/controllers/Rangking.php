<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rangking extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_rangking','M_kriteria','M_nasabah'));
    $this->load->library('Pdf');
    $this->load->helper(array('string'));
    //Codeigniter : Write Less Do More
  }

  function index() //bagian inti SPK metode SAW
  {
    $jumlah_nasabah = $this->db->get('nasabah')->num_rows();
    if ($jumlah_nasabah>0) {
      $nasabah = $this->M_nasabah->get_nasabah_all();
      //var_dump($nasabah);
      $data=array();
      foreach ($nasabah as $key) {
        $row=array(
          'nik' => $key->nik,
          'kriteria_jaminan' => $this->M_kriteria->get_kriteria_detail('kriteria_jaminan',$key->id_kriteria_jaminan),
          'kriteria_jumlah_tanggungan' => $this->M_kriteria->get_kriteria_detail('kriteria_jumlah_tanggungan',$key->id_kriteria_jumlah_tanggungan),
          'kriteria_pekerjaan' => $this->M_kriteria->get_kriteria_detail('kriteria_pekerjaan',$key->id_kriteria_pekerjaan),
          'kriteria_penghasilan' => $this->M_kriteria->get_kriteria_detail('kriteria_penghasilan',$key->id_kriteria_penghasilan),
          'kriteria_status_rumah' => $this->M_kriteria->get_kriteria_detail('kriteria_status_rumah',$key->id_kriteria_status_rumah),
        );
        array_push($data,$row);
      }
      $tabel = array('kriteria_jaminan','kriteria_jumlah_tanggungan','kriteria_pekerjaan','kriteria_penghasilan','kriteria_status_rumah');
      for ($i=0; $i < sizeof($tabel); $i++) {
        $col = 'nilai_'.$tabel[$i];
        $this->db->select_max($col);
        $query = $this->db->get($tabel[$i])->result();
        $max = $query[0]->$col;
        for ($j=0; $j < sizeof($data); $j++) {
          $data[$j][$tabel[$i]]=$data[$j][$tabel[$i]]/$max;
        }
      }
      $this->db->empty_table('normalisasi_nasabah');
      $this->db->insert_batch('normalisasi_nasabah', $data);

      $bobot_kriteria = $this->M_kriteria->get_bobot_kriteria();
      //var_dump($bobot_kriteria);
      for ($i=0; $i <sizeof($data) ; $i++) {
        $data[$i]['nilai_akhir']=0;
        foreach ($bobot_kriteria as $key) {
          $data[$i][$key->tabel]=$data[$i][$key->tabel]*$key->bobot;
          $data[$i]['nilai_akhir']+=$data[$i][$key->tabel];
        }
        if ($data[$i]['nilai_akhir']>=0.5) {
          $data[$i]['status']='Diterima';
        }
        else {
          $data[$i]['status']='Ditolak';
        }
      }
      $this->db->empty_table('hasil_akhir');
      $this->db->insert_batch('hasil_akhir', $data);

      $this->db->reset_query();
      $this->db->select('*');
      $this->db->from('hasil_akhir');
      $this->db->join('nasabah','hasil_akhir.nik = nasabah.nik');
      $this->db->order_by('nilai_akhir');
      $rangking = $this->db->get()->result();

      $kirim['rangking'] = $this->M_rangking->get_all();

      $this->load->view('rangking',$kirim);
    }
    else {
      $this->session->set_flashdata('error', 'Tidak Ada Data Nasabah. Silahkan Input Data Nasabah Terlebih Dahulu!');
      $this->load->view('rangking');
    }

  }

  function cetak(){
    $data['rangking'] = $this->M_rangking->get_all();

    $html = $this->load->view('cetak', $data,TRUE);
    $nama = "Hasil Perangkingan";
    $pdf = $this->pdf->load();
    $pdf->AddPage('L');
    $pdf->WriteHTML($html,0);
    $pdf->Output();
  }

}
