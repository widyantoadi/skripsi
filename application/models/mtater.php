<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mtater extends CI_Model{
    var $tabel_tater='tanda_terima';

    public function __construct(){
        parent::__construct();
    }


public function simpan(){
        $data_tater = array(
            'no_tanda_terima' => $this->input->post('no_tanda_terima'),
            'tgl_terima' => date('Y-m-d',strtotime($this->input->post('tgl_terima'))),
            'kode_donatur' => $this->input->post('kode'),
            'kode_pengurus' => $this->input->post('kode1'),
            'banyaknya_uang' => $this->input->post('banyaknya_uang'),
            'untuk_pembayaran' => $this->input->post('untuk_pembayaran'),
            );
        $this->db->insert($this->tabel_tater,$data_tater);
    }

    function buat_kode()
{
$this->db->select('RIGHT(tanda_terima.no_tanda_terima,3) as kode', FALSE);
$this->db->order_by('no_tanda_terima','DESC');
$this->db->limit(1);
$query = $this->db->get('tanda_terima');
//cek dulu apakah ada sudah ada kode di tabel.
if($query->num_rows() <> 0){
//jika kode ternyata sudah ada.
$data = $query->row();
$kode = intval($data->kode) + 1;
}else{
//jika kode belum ada
$kode = 1;
}
$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
$kodejadi = "T".$kodemax;
return $kodejadi;
}

 function get_alldonatur($q) {  
  
        $this->db->like('nama_donatur', $q);  
        $res = $this->db->get('donatur');  
        if ($res->num_rows() > 0) {   
            return $res->result();  
        }  
  
       
    }  

     function get_allpengurus($q) {  
  
        $this->db->like('nama_pengurus', $q);  
        $res = $this->db->get('pengurus');  
        if ($res->num_rows() > 0) {   
            return $res->result();  
        }  
  
       
    }

    public function view(){
        $a =$this->input->post('tgl1');
        $b =$this->input->post('tgl2');
        $tater1="SELECT   tanda_terima.no_tanda_terima,  tanda_terima.tgl_terima,  donatur.nama_donatur,  donatur.alamat,tanda_terima.banyaknya_uang ,pengurus.nama_pengurus FROM   tanda_terima  INNER JOIN donatur ON tanda_terima.kode_donatur = donatur.kode_donatur  INNER JOIN pengurus ON tanda_terima.kode_pengurus = pengurus.kode_pengurus WHERE tgl_terima between '$a' and '$b'";
        $taterq="SELECT tanda_terima.no_tanda_terima,  tanda_terima.tgl_terima,  donatur.nama_donatur,  donatur.alamat,tanda_terima.banyaknya_uang FROM   tanda_terima  INNER JOIN donatur ON tanda_terima.kode_donatur = donatur.kode_donatur";
        $tater=$this->db->query($tater1);
        if ($tater->num_rows() > 0) {   
            return $tater->result();  
        }  

        /*$totala=" SELECT sum(tanda_terima.banyaknya_uang) as total FROM tanda_terima WHERE tgl_terima between '$a' and '$b'";
        $total=$this->db->query($totala);
        if ($total->num_rows() ==1 ) {   
            return $total->result();  
        }  */
    }  

     public function view2(){
        $a =$this->input->post('tgl1');
        $b =$this->input->post('tgl2');
       
        $totala=" SELECT sum(tanda_terima.banyaknya_uang) as total FROM tanda_terima WHERE tgl_terima between '$a' and '$b'";
        $total=$this->db->query($totala);
        if ($total->num_rows() ==1 ) {   
            return $total->result();  
        }  
    }  

}