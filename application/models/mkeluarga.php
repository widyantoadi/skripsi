<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class mkeluarga extends CI_Model{
    var $tabel_calon_keluarga_asuh='calon_keluarga_asuh';

    public function __construct(){
        parent::__construct();
    }

    public function tampil_semua_calon_keluarga_asuh(){
        $this->db->order_by('kode_calon_keluarga_asuh','asc');
        $sql_calon_keluarga_asuh=$this->db->get($this->tabel_calon_keluarga_asuh);

        if($sql_calon_keluarga_asuh->num_rows()>0) {
            return $sql_calon_keluarga_asuh->result_array();
        }
    }

    public function hapus($kode_calon_keluarga_asuh){
        $this->db->where('kode_calon_keluarga_asuh',$kode_calon_keluarga_asuh);
        $this->db->delete($this->tabel_calon_keluarga_asuh);
    }

    public function tambah_calon_keluarga_asuh(){
        $data_calon_keluarga_asuh = array(
            'kode_calon_keluarga_asuh' => $this->input->post('kode_calon_keluarga_asuh'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            
            );
        $this->db->insert($this->tabel_calon_keluarga_asuh,$data_calon_keluarga_asuh);
    }

    public function update_calon_keluarga_asuh($kode_calon_keluarga_asuh){
        $data_calon_keluarga_asuh = array(
            'kode_calon_keluarga_asuh' => $this->input->post('kode_calon_keluarga_asuh'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            );
        $this->db->where('kode_calon_keluarga_asuh',$kode_calon_keluarga_asuh);
        $this->db->update($this->tabel_calon_keluarga_asuh,$data_calon_keluarga_asuh);
    }

    public function ambil_satu_calon_keluarga_asuh($kode_calon_keluarga_asuh){
        $this->db->where('kode_calon_keluarga_asuh',$kode_calon_keluarga_asuh);
        $sql_calon_keluarga_asuh= $this->db->get($this->tabel_calon_keluarga_asuh);
        if($sql_calon_keluarga_asuh->num_rows()==1){
            return $sql_calon_keluarga_asuh->row_array();
        }
    }


    function buat_kode()
{
$this->db->select('RIGHT(calon_keluarga_asuh.kode_calon_keluarga_asuh,3) as kode', FALSE);
$this->db->order_by('kode_calon_keluarga_asuh','DESC');
$this->db->limit(1);
$query = $this->db->get('calon_keluarga_asuh');
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
$kodejadi = "K".$kodemax;
return $kodejadi;
}


 function search($keyword) 
    {

        $sql        = "SELECT * FROM calon_keluarga_asuh WHERE kode_calon_keluarga_asuh LIKE '%$keyword%' or nama LIKE '%$keyword%'";

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