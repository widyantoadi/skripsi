<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class manak extends CI_Model{
    var $tabel_anak='anak_asuh';
    var $tabel_calon='calon';

    public function __construct(){
        parent::__construct();
    }

    public function tampil_semua_anak_asuh(){
        //$qa="SELECT calon.nama_calon,anak_asuh.kode_anak_asuh from calon inner join anak_asuh on anak_asuh.kode_calon =calon.kode_calon AND anak_asuh.kode_anak_asuh NOT IN (SELECT kode_anak_asuh FROM ska)";
        //$this->db->order_by('kode_anak_asuh','asc');
        //$sql_anak=$this->db->get($this->tabel_anak);
        $qa="SELECT calon.nama_calon,anak_asuh.kode_anak_asuh from calon inner join anak_asuh on anak_asuh.kode_calon =calon.kode_calon WHERE anak_asuh.status='tetap'";
        $sql_anak    =     $this->db->query($qa);
        if($sql_anak->num_rows()>0) {
            return $sql_anak->result_array();
        }
    }

    function search($keyword) 
    {

        //$sql        = "SELECT * FROM anak_asuh where anak_asuh.kode_anak_asuh LIKE '%$keyword%' or anak_asuh.kode_calon LIKE '%$keyword%'";
        //$sql="SELECT calon.nama_calon,anak_asuh.kode_anak_asuh from calon inner join anak_asuh on anak_asuh.kode_calon =calon.kode_calon AND anak_asuh.kode_anak_asuh NOT IN (SELECT kode_anak_asuh FROM ska) AND calon.nama_calon like '%$keyword%'";
        $sql = "SELECT calon.nama_calon,anak_asuh.kode_anak_asuh from calon inner join anak_asuh on anak_asuh.kode_calon =calon.kode_calon WHERE anak_asuh.status='tetap' AND calon.nama_calon like '%$keyword%'";
        $result    =     $this->db->query($sql);


        if($result->num_rows() > 0) 
        {
            return $result->result_array();       
        }
        else 
        {
            return array();       
        }   

        }


        function get_anak_byid($kode_anak_asuh) {
        //$this->db->from($this->tabel);
        //$this->db->where('kode_brg', $id);
        $sql="SELECT anak_asuh.kode_anak_asuh,  calon.kode_calon,calon.nama_calon,  calon.tempat_lahir,  calon.tgl_lahir,  calon.pendidikan_terakhir,  calon.status_anak,  calon.anak_ke,calon.dari,  calon.alamat,  calon.nama_bapak,  calon.alamat_bapak,  calon.pekerjaan_bapak,  calon.tgl_meninggal_bapak,  calon.nama_ibu,  calon.alamat_ibu,  calon.pekerjaan_ibu,  calon.tgl_meninggal_ibu,  calon.nama_wali,  calon.alamat_wali,  calon.pekerjaan_wali,  anak_asuh.status FROM   anak_asuh   INNER JOIN calon ON calon.kode_calon = anak_asuh.kode_calon WHERE anak_asuh.kode_anak_asuh ='$kode_anak_asuh' ";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

     public function tampil_semua_anak2(){
        $sql        = "SELECT anak_asuh.kode_anak_asuh,calon.nama_calon FROM anak_asuh INNER JOIN calon ON anak_asuh.kode_calon = calon.kode_calon where  status='tetap'";

        

        $result    =     $this->db->query($sql);

        if($result->num_rows()>0) {
            return $result->result_array();
        }
    }

    public function update_anak(){
        $kode_calon=$this->input->post('kode_calon');
        $z=$this->input->post('tgl_meninggal_bapak');
        if($z=="0000-00-00"){
            $a = "0000-00-00";
        }else{
            //$a= $this->input->post('tgl_meninggal_bapak');
            $a=date('Y-m-d',strtotime($this->input->post('tgl_meninggal_bapak')));
        }

        $q=$this->input->post('tgl_meninggal_ibu');
        if($q=="0000-00-00"){
            $b = "0000-00-00";
        }else{
            $b=date('Y-m-d',strtotime($this->input->post('tgl_meninggal_ibu')));
        }
        $data_calon = array(
           'kode_calon' => $this->input->post('kode_calon'),
            'nama_calon' => $this->input->post('nama_calon'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            //'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tgl_lahir' => date('Y-m-d',strtotime($this->input->post('tgl_lahir'))),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'status_anak' => $this->input->post('status_anak'),
            'anak_ke' => $this->input->post('anak_ke'),
            'dari' => $this->input->post('dari'),
            'alamat' => $this->input->post('alamat'),
            'nama_bapak' => $this->input->post('nama_bapak'),
            'alamat_bapak' => $this->input->post('alamat_bapak'),
            'pekerjaan_bapak' => $this->input->post('pekerjaan_bapak'),
            //'tgl_meninggal_bapak' => $this->input->post('tgl_meninggal_bapak'),
            //'tgl_meninggal_bapak' => date('Y-m-d',strtotime($this->input->post('tgl_meninggal_bapak'))),
            'tgl_meninggal_bapak' => $a,
            'nama_ibu' => $this->input->post('nama_ibu'),
            'alamat_ibu' => $this->input->post('alamat_ibu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'tgl_meninggal_ibu' => $b,
            //'tgl_meninggal_ibu' => $this->input->post('tgl_meninggal_ibu'),
            //'tgl_meninggal_ibu' => date('Y-m-d',strtotime($this->input->post('tgl_meninggal_ibu'))),
            'nama_wali' => $this->input->post('nama_wali'),
            'alamat_wali' => $this->input->post('alamat_wali'),
            'pekerjaan_wali' => $this->input->post('pekerjaan_wali'),
            
            );
        $this->db->where('kode_calon',$kode_calon);
        $this->db->update($this->tabel_calon,$data_calon);
    
     
}
}
?>



