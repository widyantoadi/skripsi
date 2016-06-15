<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mpengurus extends CI_Model{
    var $tabel_pengurus='pengurus';

    public function __construct(){
        parent::__construct();
    }

    public function tampil_semua_pengurus(){
        $this->db->order_by('kode_pengurus','asc');
        $sql_pengurus=$this->db->get($this->tabel_pengurus);

        if($sql_pengurus->num_rows()>0) {
            return $sql_pengurus->result_array();
        }
    }

    public function hapus($kode_pengurus){
        $this->db->where('kode_pengurus',$kode_pengurus);
        $this->db->delete($this->tabel_pengurus);
    }

    public function tambah_pengurus(){
        $data_pengurus = array(
            'kode_pengurus' => $this->input->post('kode_pengurus'),
            'nama_pengurus' => $this->input->post('nama_pengurus'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'jabatan' => $this->input->post('jabatan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            );
        $this->db->insert($this->tabel_pengurus,$data_pengurus);
    }

    public function update_pengurus($kode_pengurus){
        $data_pengurus = array(
            'kode_pengurus' => $this->input->post('kode_pengurus'),
            'nama_pengurus' => $this->input->post('nama_pengurus'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'jabatan' => $this->input->post('jabatan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            );
        $this->db->where('kode_pengurus',$kode_pengurus);
        $this->db->update($this->tabel_pengurus,$data_pengurus);
    }

    public function ambil_satu_pengurus($kode_pengurus){
        $this->db->where('kode_pengurus',$kode_pengurus);
        $sql_pengurus= $this->db->get($this->tabel_pengurus);
        if($sql_pengurus->num_rows()==1){
            return $sql_pengurus->row_array();
        }
    }


    function buat_kode()
{
$this->db->select('RIGHT(pengurus.kode_pengurus,3) as kode', FALSE);
$this->db->order_by('kode_pengurus','DESC');
$this->db->limit(1);
$query = $this->db->get('pengurus');
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
$kodejadi = "P".$kodemax;
return $kodejadi;
}


 function search($keyword) 
    {

        $sql        = "SELECT * FROM pengurus WHERE kode_pengurus LIKE '%$keyword%' or nama_pengurus LIKE '%$keyword%'";

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