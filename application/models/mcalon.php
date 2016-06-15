<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mcalon extends CI_Model{
    var $tabel_calon='calon';

    public function __construct(){
        parent::__construct();
    }

    public function tampil_semua_calon(){
        $this->db->order_by('kode_calon','asc');
        $sql_calon=$this->db->get($this->tabel_calon);

        if($sql_calon->num_rows()>0) {
            return $sql_calon->result_array();
        }
    }

     public function tampil_semua_calon2(){
        $sql        = "SELECT * FROM calon WHERE calon.kode_calon NOT IN (SELECT kode_calon FROM ketentuan)";

        

        $result    =     $this->db->query($sql);

        if($result->num_rows()>0) {
            return $result->result_array();
        }
    }

    public function tampil_semua_calon3(){
        //$sql        = "SELECT * FROM calon inner join calon on anak_asuh.kode_calon = calon.kode_calon WHERE calon.kode_calon NOT IN (SELECT kode_calon FROM anak_asuh)";
        $sql ="select * from calon where status_ketentuan='belum_lolos'";
        

        $result    =     $this->db->query($sql);

        if($result->num_rows()>0) {
            return $result->result_array();
        }
    }

    public function hapus($kode_calon){
        $this->db->where('kode_calon',$kode_calon);
        $this->db->delete($this->tabel_calon);
    }

    public function tambah_calon(){
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
            'status_ketentuan' => $this->input->post('status_ketentuan'),
            );
        $this->db->insert($this->tabel_calon,$data_calon);
    }

    public function update_calon($kode_calon){
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
            'status_ketentuan' => $this->input->post('status_ketentuan'),
            );
        $this->db->where('kode_calon',$kode_calon);
        $this->db->update($this->tabel_calon,$data_calon);
    }

    /*public function update_ketentuan($kode_calon){
        $data_calon = array(
            'status_ketentuan' => 'lolos'
            );
     $this->db->where('kode_calon',$kode_calon);
        $this->db->update($this->tabel_calon,$data_calon);   
    }
    */
    public function ambil_satu_calon($kode_calon){
        $this->db->where('kode_calon',$kode_calon);
        $sql_calon= $this->db->get($this->tabel_calon);
        if($sql_calon->num_rows()==1){
            return $sql_calon->row_array();
        }
    }


    function buat_kode()
{
$this->db->select('RIGHT(calon.kode_calon,3) as kode', FALSE);
$this->db->order_by('kode_calon','DESC');
$this->db->limit(1);
$query = $this->db->get('calon');
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
$kodejadi = "C".$kodemax;
return $kodejadi;
}


 function search($keyword) 
    {

        //$sql        = "SELECT * FROM calon where calon.kode_calon NOT IN (SELECT kode_calon FROM anak_asuh) AND calon.kode_calon LIKE '%$keyword%' or calon.nama_calon LIKE '%$keyword%'";
        $sql="select * from calon where status_ketentuan='belum_lolos' AND nama_calon LIKE '%$keyword%'";
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


}
?>