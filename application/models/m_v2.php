<?php
class m_v2 extends CI_Model{
    private $table="voucher";
    
    
    
    function getAnggota(){
        return $this->db->get("anggota");
    }
    
    
    
    function cariBuku($kode){
        $ab="SELECT anak_asuh.kode_anak_asuh,calon.nama_calon FROM anak_asuh INNER JOIN calon ON anak_asuh.kode_calon = calon.kode_calon where status='tetap' and calon.nama_calon like '%$kode%'";
        $qa= $this->db->query($ab);
        return $qa->result();
    }
    
    function simpanTmp($info){
        $this->db->insert("tmp",$info);
    }
    
    function tampilTmp(){
        return $this->db->get("tmp");
    }
    
    function cekTmp($kode){
        $this->db->where("kode_anak_asuh",$kode);
        return $this->db->get("tmp");
    }
    
    function jumlahTmp(){
        return $this->db->count_all("tmp");
    }
    
    function hapusTmp($kode){
        $this->db->where("kode_anak_asuh",$kode);
        $this->db->delete("tmp");
    }
    
    function simpan($info){
        $this->db->insert("voucher2",$info);
    }
    function simpan2($g){
        $this->db->insert("pinjam",$g);
    }
    
    function pencarianbuku($cari){
        $a="SELECT anak_asuh.kode_anak_asuh,calon.nama_calon FROM anak_asuh INNER JOIN calon ON anak_asuh.kode_calon = calon.kode_calon where status='tetap' and calon.nama_calon like '%$cari%'";
        $q= $this->db->query($a);
        return $q->result();
    }
    
function buat_kode()
{
$this->db->select('RIGHT(voucher.no_voucher,3) as kode', FALSE);
$this->db->order_by('no_voucher','DESC');
$this->db->limit(1);
$query = $this->db->get('voucher');
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
$kodejadi = "V".$kodemax;
return $kodejadi;
}
}
?>