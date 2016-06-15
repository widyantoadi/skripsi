<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mdonatur extends CI_Model{
    var $tabel_donatur='donatur';

    public function __construct(){
        parent::__construct();
    }

    public function tampil_semua_donatur(){
        $this->db->order_by('kode_donatur','asc');
        $sql_donatur=$this->db->get($this->tabel_donatur);

        if($sql_donatur->num_rows()>0) {
            return $sql_donatur->result_array();
        }
    }

    public function hapus($kode_donatur){
        $this->db->where('kode_donatur',$kode_donatur);
        $this->db->delete($this->tabel_donatur);
    }

    public function tambah_donatur(){
        $data_donatur = array(
            'kode_donatur' => $this->input->post('kode_donatur'),
            'nama_donatur' => $this->input->post('nama_donatur'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            
            );
        $this->db->insert($this->tabel_donatur,$data_donatur);
    }

    public function update_donatur($kode_donatur){
        $data_donatur = array(
            'kode_donatur' => $this->input->post('kode_donatur'),
            'nama_donatur' => $this->input->post('nama_donatur'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            );
        $this->db->where('kode_donatur',$kode_donatur);
        $this->db->update($this->tabel_donatur,$data_donatur);
    }

    public function ambil_satu_donatur($kode_donatur){
        $this->db->where('kode_donatur',$kode_donatur);
        $sql_donatur= $this->db->get($this->tabel_donatur);
        if($sql_donatur->num_rows()==1){
            return $sql_donatur->row_array();
        }
    }


    function buat_kode()
{
$this->db->select('RIGHT(donatur.kode_donatur,3) as kode', FALSE);
$this->db->order_by('kode_donatur','DESC');
$this->db->limit(1);
$query = $this->db->get('donatur');
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
$kodejadi = "D".$kodemax;
return $kodejadi;
}


 function search($keyword) 
    {

        $sql        = "SELECT * FROM donatur WHERE kode_donatur LIKE '%$keyword%' or nama_donatur LIKE '%$keyword%'";

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