<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mketentuan extends CI_Model{
    var $tabel_ketentuan='ketentuan';
    var $tabel_asuh='anak_asuh';
    var $tabel_calon='calon';

    public function __construct(){
        parent::__construct();
    }

    public function tampil_semua_ketentuan(){
        //$this->db->order_by('kode_ketentuan','asc');
        $sqla="select * from ketentuan where wawancara='ada' AND surat_pernyataan_wali='ada' AND calon.kode_calon NOT IN (SELECT kode_calon FROM anak_asuh)";
        $sql_ketentuan=$this->db->query($sqla);

        if($sql_ketentuan->num_rows()>0) {
            return $sql_ketentuan->result_array();
        }
    }
///////////////////////////////////////////////////////////
    public function tampil_semua_ketentuan2(){
        
        $sqla="SELECT ketentuan.kode_calon,calon.nama_calon from ketentuan inner join calon on ketentuan.kode_calon =calon.kode_calon AND ketentuan.kode_calon NOT IN (SELECT kode_calon FROM anak_asuh)";
        $sql_ketentuan=$this->db->query($sqla);

        if($sql_ketentuan->num_rows()>0) {
            return $sql_ketentuan->result_array();
        }
    }

    public function tambah_ketentuan(){
        $data_ketentuan = array(
            //'kode_ketentuan' => $this->input->post('kode_ketentuan'),
            'kode_calon' => $this->input->post('kode_calon'),
            'rapor' => $this->input->post('rapor'),
            'ijazah' => $this->input->post('ijazah'),
            'surat_kematian_ortu' => $this->input->post('surat_kematian_ortu'),
            'surat_keterangan_sehat' => $this->input->post('surat_keterangan_sehat'),
            'akte_kelahiran' => $this->input->post('akte_kelahiran'),
            'kartu_keluarga' => $this->input->post('kartu_keluarga'),
            'foto' => $this->input->post('foto'),
            'surat_pengantar_rt_rw' => $this->input->post('surat_pengantar_rt_rw'),
            'surat_rek_muh' => $this->input->post('surat_rek_muh'),
            'wawancara' => $this->input->post('wawancara'),
            'surat_ketersediaan_anak' => $this->input->post('surat_ketersediaan_anak'),
            'surat_pernyataan_wali' => $this->input->post('surat_pernyataan_wali'),
            );
        $this->db->insert($this->tabel_ketentuan,$data_ketentuan);
    }

    public function uasuh(){

        $data_ketentuan = array(
            'kode_anak_asuh' => $this->input->post('kode_anak_asuh'),
            //'kode_ketentuan' => $this->input->post('kode_ketentuan'),
            'kode_calon' => $this->input->post('kode_calon'),
            );
         $this->db->insert($this->tabel_asuh,$data_ketentuan);
    }

    public function update_status_calon($kode_calon){
        $data_status_calon= array(
            'kode_calon' => $this->input->post('kode_calon'),
            'status_ketentuan' => 'lolos',
            );
            $this->db->where('kode_calon',$kode_calon);
        $this->db->update($this->tabel_calon,$data_status_calon);
            
    }

    public function update_ketentuan($kode_calon){
        $data_ketentuan = array(
            //'kode_ketentuan' => $this->input->post('kode_ketentuan'),
            'kode_calon' => $this->input->post('kode_calon'),
            'rapor' => $this->input->post('rapor'),
            'ijazah' => $this->input->post('ijazah'),
            'surat_kematian_ortu' => $this->input->post('surat_kematian_ortu'),
            'surat_keterangan_sehat' => $this->input->post('surat_keterangan_sehat'),
            'akte_kelahiran' => $this->input->post('akte_kelahiran'),
            'kartu_keluarga' => $this->input->post('kartu_keluarga'),
            'foto' => $this->input->post('foto'),
            'surat_pengantar_rt_rw' => $this->input->post('surat_pengantar_rt_rw'),
            'surat_rek_muh' => $this->input->post('surat_rek_muh'),
            'wawancara' => $this->input->post('wawancara'),
            'surat_ketersediaan_anak' => $this->input->post('surat_ketersediaan_anak'),
            'surat_pernyataan_wali' => $this->input->post('surat_pernyataan_wali'),
            );
        $this->db->where('kode_calon',$kode_calon);
        $this->db->update($this->tabel_ketentuan,$data_ketentuan);
    }

    public function ambil_satu_ketentuan($kode_calon){
        $this->db->where('kode_calon',$kode_calon);
        $sql_ketentuan= $this->db->get($this->tabel_ketentuan);
        if($sql_ketentuan->num_rows()==1){
            return $sql_ketentuan->row_array();
        }
    }

    public function ambil_satu_ketentuan2($kode_calon){
        $q="SELECT ketentuan.kode_calon,ketentuan.rapor,ketentuan.ijazah,ketentuan.surat_kematian_ortu,ketentuan.surat_keterangan_sehat,ketentuan.akte_kelahiran,ketentuan.kartu_keluarga,ketentuan.foto,ketentuan.surat_pengantar_rt_rw,ketentuan.surat_rek_muh,ketentuan.wawancara,ketentuan.surat_ketersediaan_anak,ketentuan.surat_pernyataan_wali,calon.nama_calon FROM
            ketentuan INNER JOIN calon ON ketentuan.kode_calon = calon.kode_calon where ketentuan.kode_calon='$kode_calon' ";
        $sql_ketentuan=$this->db->query($q);
        if($sql_ketentuan->num_rows()==1){
            return $sql_ketentuan->row_array();
        }
    }



    

function buat_kode_anak()
{
$this->db->select('RIGHT(anak_asuh.kode_anak_asuh,3) as kode', FALSE);
$this->db->order_by('kode_anak_asuh','DESC');
$this->db->limit(1);
$query = $this->db->get('anak_asuh');
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
$kodejadi = "A".$kodemax;
return $kodejadi;
}


 function search($keyword) 
    {
        //$sqla="SELECT ketentuan.kode_ketentuan,ketentuan.kode_calon,calon.nama_calon from ketentuan inner join calon on ketentuan.kode_calon =calon.kode_calon AND nama_calon like '%$keyword%'";
        //$sql        = "SELECT * FROM ketentuan a,calon b WHERE  b.nama_calon LIKE '%$keyword%'";
        $sqla = "SELECT ketentuan.kode_calon,calon.nama_calon from ketentuan inner join calon on ketentuan.kode_calon =calon.kode_calon AND ketentuan.kode_calon NOT IN (SELECT kode_calon FROM anak_asuh) AND nama_calon like '%$keyword%'";
        $result    =     $this->db->query($sqla);


        if($result->num_rows() > 0) 
        {
            return $result->result_array();       
        }
        else 
        {
            return array();       
        }   

        }


}
?>