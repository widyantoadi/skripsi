<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mskpaa extends CI_Model{
    var $tabel_skpaa='skpaa';
    var $tabel_anak='anak_asuh';

    public function __construct(){
        parent::__construct();
    }


public function simpan(){
        $data_skpaa = array(
            'no_skpaa' => $this->input->post('no_skpaa'),
            'no_ska' => $this->input->post('no_ska'),
            'tgl_skpaa' => date('Y-m-d',strtotime($this->input->post('tgl_skpaa'))),
            
            
            
            );
        $this->db->insert($this->tabel_skpaa,$data_skpaa);
    }

    function buat_kode()
{
$this->db->select('RIGHT(skpaa.no_skpaa,3) as kode', FALSE);
$this->db->order_by('no_skpaa','DESC');
$this->db->limit(1);
$query = $this->db->get('skpaa');
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
$kodejadi = "SKPAA".$kodemax;
return $kodejadi;
}

 /*function get_allkeluarga($q) {  
  
        $this->db->like('nama', $q);
        //$this->db->where('kode_anak_asuh')
        $res = $this->db->get('calon_keluarga_asuh');  
        if ($res->num_rows() > 0) {   
            return $res->result();  
        }  
  
       
    } */ 

     function get_allska($q) {  
        $sqla1="SELECT ska.no_ska, ska.kode_anak_asuh,  ska.kode_calon_keluarga_asuh, calon.nama_calon,calon_keluarga_asuh.nama,  calon_keluarga_asuh.jenis_kelamin, calon_keluarga_asuh.pekerjaan, calon_keluarga_asuh.alamat FROM  ska  INNER JOIN calon_keluarga_asuh ON calon_keluarga_asuh.kode_calon_keluarga_asuh = ska.kode_calon_keluarga_asuh INNER JOIN anak_asuh ON anak_asuh.kode_anak_asuh = ska.kode_anak_asuh INNER JOIN calon ON calon.kode_calon = anak_asuh.kode_calon AND ska.no_ska NOT IN (SELECT no_ska FROM skpaa) AND ska.no_ska like '%$q%'";

        $res    =     $this->db->query($sqla1);
        
        if ($res->num_rows() > 0) {   
            return $res->result();  
        }  
  
       
    }  

    function get_xanak($q) {  
        $sqla1="SELECT ska.no_ska,calon_keluarga_asuh.kode_calon_keluarga_asuh,calon_keluarga_asuh.nama,calon_keluarga_asuh.alamat,calon_keluarga_asuh.jenis_kelamin,calon_keluarga_asuh.pekerjaan,calon.nama_calon,ska.kode_anak_asuh FROM ska INNER JOIN anak_asuh ON ska.kode_anak_asuh = anak_asuh.kode_anak_asuh INNER JOIN calon ON anak_asuh.kode_calon = calon.kode_calon INNER JOIN calon_keluarga_asuh ON ska.kode_calon_keluarga_asuh = calon_keluarga_asuh.kode_calon_keluarga_asuh AND ska.no_ska NOT IN (SELECT no_ska FROM skpaa) AND calon.nama_calon like '%$q%'";

        $res    =     $this->db->query($sqla1);
        
        if ($res->num_rows() > 0) {   
            return $res->result();  
        }  
  
       
    }  

    public function update_status_anak($kode_anak_asuh){
        $data_status_anak= array(
            'kode_anak_asuh' => $this->input->post('kode_anak_asuh'),
            'status' => 'keluar',
            );
            $this->db->where('kode_anak_asuh',$kode_anak_asuh);
        $this->db->update($this->tabel_anak,$data_status_anak);
            
    }

     public function laporan1(){
        $a =$this->input->post('tgl1');
        
        $skpaa1="SELECT calon.nama_calon,skpaa.tgl_skpaa,calon_keluarga_asuh.nama,calon_keluarga_asuh.alamat FROM skpaa INNER JOIN ska ON skpaa.no_ska = ska.no_ska INNER JOIN calon_keluarga_asuh ON ska.kode_calon_keluarga_asuh = calon_keluarga_asuh.kode_calon_keluarga_asuh  INNER JOIN anak_asuh ON ska.kode_anak_asuh = anak_asuh.kode_anak_asuh INNER JOIN calon ON anak_asuh.kode_calon = calon.kode_calon  where anak_asuh.status='keluar' and year(skpaa.tgl_skpaa)='$a'";
        
        $skpaa=$this->db->query($skpaa1);
        if ($skpaa->num_rows() > 0) {   
            return $skpaa->result();  
        }  
    }   

}