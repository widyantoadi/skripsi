<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mperkembangan extends CI_Model{
    var $tabel_perkembangan='perkembangan';

    public function __construct(){
        parent::__construct();
    }

    public function tambah(){
        $data_perkembangan = array(
            'kode_anak_asuh' => $this->input->post('kode_anak_asuh'),                 
            //'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'tanggal' => $this->input->post('tanggal'),
             'keterangan' => $this->input->post('keterangan'),
             'kategori' => $this->input->post('kategori'),
            );
        $this->db->insert($this->tabel_perkembangan,$data_perkembangan);
    }

function get_allanak($q) {  
    //$this->db->like('nama_calon', $q);
        //$sqla = "SELECT calon.nama_calon,anak_asuh.kode_anak_asuh from calon inner join anak_asuh on anak_asuh.kode_calon =calon.kode_calon AND anak_asuh.kode_anak_asuh NOT IN (SELECT kode_anak_asuh FROM ska) ";
        $sqla1 = "SELECT calon.nama_calon,anak_asuh.kode_anak_asuh from calon inner join anak_asuh on anak_asuh.kode_calon =calon.kode_calon WHERE anak_asuh.status='tetap' AND calon.nama_calon like '%$q%'";

        $res    =     $this->db->query($sqla1);
        
        if ($res->num_rows() > 0) {   
            return $res->result();  
        }  
  
       
    } 

    public function view(){
        $a =$this->input->post('tanggal1');
        $b =$this->input->post('tanggal2');
        $c =$this->input->post('kode_anak_asuh');
        $q="SELECT calon.nama_calon,perkembangan.keterangan,perkembangan.kategori,perkembangan.tanggal as tanggal_p FROM calon INNER JOIN anak_asuh ON calon.kode_calon = anak_asuh.kode_calon INNER JOIN perkembangan ON perkembangan.kode_anak_asuh = anak_asuh.kode_anak_asuh where anak_asuh.kode_anak_asuh='$c' and perkembangan.tanggal between '$a' and '$b' order by tanggal_p ASC ";
        $perkembangan=$this->db->query($q);
        if ($perkembangan->num_rows() > 0) {   
            return $perkembangan->result();  
        }  
    } 

}
?>