<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mska extends CI_Model{
    var $tabel_ska='ska';

    public function __construct(){
        parent::__construct();
    }


public function simpan(){
        $data_ska = array(
            'no_ska' => $this->input->post('no_ska'),
            'tgl_ska' => date('Y-m-d',strtotime($this->input->post('tgl_ska'))),
            'kode_anak_asuh' => $this->input->post('kode_anak_asuh'),
            'kode_calon_keluarga_asuh' => $this->input->post('kode_calon_keluarga_asuh'),
            
            
            );
        $this->db->insert($this->tabel_ska,$data_ska);
    }

    function buat_kode()
{
$this->db->select('RIGHT(ska.no_ska,3) as kode', FALSE);
$this->db->order_by('no_ska','DESC');
$this->db->limit(1);
$query = $this->db->get('ska');
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
$kodejadi = "SKA".$kodemax;
return $kodejadi;
}

 function get_allkeluarga($q) {  
  
        $this->db->like('nama', $q);
        //$this->db->where('kode_anak_asuh')
        $res = $this->db->get('calon_keluarga_asuh');  
        if ($res->num_rows() > 0) {   
            return $res->result();  
        }  
  
       
    }  

     function get_allanak($q) {  
    //$this->db->like('nama_calon', $q);
        //$sqla = "SELECT calon.nama_calon,anak_asuh.kode_anak_asuh from calon inner join anak_asuh on anak_asuh.kode_calon =calon.kode_calon AND anak_asuh.kode_anak_asuh NOT IN (SELECT kode_anak_asuh FROM ska) ";
        $sqla1 = "SELECT calon.nama_calon,anak_asuh.kode_anak_asuh from calon inner join anak_asuh on anak_asuh.kode_calon =calon.kode_calon AND anak_asuh.kode_anak_asuh NOT IN (SELECT kode_anak_asuh FROM ska) AND calon.nama_calon like '%$q%'";

        $res    =     $this->db->query($sqla1);
        
        if ($res->num_rows() > 0) {   
            return $res->result();  
        }  
  
       
    }  

}