<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class ketentuan extends CI_Controller {
public function __construct(){
    parent::__construct();
   $this->load->model('mketentuan','','TRUE');
    $this->load->model('mcalon','','TRUE');
    //$this->load->library('form_validation');
}


public function index(){
	$data['data_ketentuan']=$this->mketentuan->tampil_semua_ketentuan2();
	$this->load->view('ketentuan/tampil',$data);
//$this->load->view('ketentuan/tampil',$data);

//$data['kode_ketentuan'] = $this->mketentuan->buat_kode();
}
public function form_tambah(){
	//$data['kode_ketentuan'] = $this->mketentuan->buat_kode();
    $data['kode_anak_asuh'] = $this->mketentuan->buat_kode_anak();
	$data['data_calon']=$this->mcalon->tampil_semua_calon2();
$this->load->view('ketentuan/ketentuan',$data);
}
public function tambah() {
	
    $z= $this->input->post('kode_calon');
    $a = $this->input->post('wawancara');
    $b = $this->input->post('surat_ketersediaan_anak');
    $c = $this->input->post('surat_pernyataan_wali');
    $d= $this->input->post('rapor');
    $e= $this->input->post('ijazah');
    //$f= $this->input->post('surat_kematian_ortu');
    $g= $this->input->post('surat_keterangan_sehat');
    $h= $this->input->post('akte_kelahiran');
    $i= $this->input->post('kartu_keluarga');
    $j= $this->input->post('foto');
    $k= $this->input->post('surat_pengantar_rt_rw');
    $l= $this->input->post('surat_rek_muh');

           
        $this->mketentuan->tambah_ketentuan();
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        if($a=='lolos' && $b=='ada' &&  $c=='ada' &&  $d=='ada' &&  $e=='ada' &&  $g=='ada' &&  $h=='ada' &&  $i=='ada' &&  $j=='ada' &&  $k=='ada' &&  $l=='ada'){
            $this->mketentuan->uasuh();
            $this->mketentuan->update_status_calon($z);
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data Anak Telah Masuk Daftar Anak Asuh</div>");
            redirect(base_url().'index.php/ketentuan');
        }else{
        redirect(base_url().'index.php/ketentuan');
    }
    
}



public function edit_form($kode_calon){
    $data['ketentuan']=$this->mketentuan->ambil_satu_ketentuan2($kode_calon);
    $data['kode_anak_asuh'] = $this->mketentuan->buat_kode_anak();
    $this->load->view('ketentuan/edit',$data);
}

public function edit($kode_calon){
    $data['ketentuan']=$this->mketentuan->ambil_satu_ketentuan($kode_calon);
    $z= $this->input->post('kode_calon');
    $a = $this->input->post('wawancara');
    $b = $this->input->post('surat_ketersediaan_anak');
    $c = $this->input->post('surat_pernyataan_wali');
     $d= $this->input->post('rapor');
    $e= $this->input->post('ijazah');
    //$f= $this->input->post('surat_kematian_ortu');
    $g= $this->input->post('surat_keterangan_sehat');
    $h= $this->input->post('akte_kelahiran');
    $i= $this->input->post('kartu_keluarga');
    $j= $this->input->post('foto');
    $k= $this->input->post('surat_pengantar_rt_rw');
    $l= $this->input->post('surat_rek_muh');
        $this->mketentuan->update_ketentuan($kode_calon);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diupdate</div>");
        if($a=='lolos' && $b=='ada' &&  $c=='ada' &&  $d=='ada' &&  $e=='ada' &&  $g=='ada' &&  $h=='ada' &&  $i=='ada' &&  $j=='ada' &&  $k=='ada' &&  $l=='ada'){
            $this->mketentuan->uasuh();
            $this->mketentuan->update_status_calon($z);
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data Anak Telah Masuk Daftar Anak Asuh</div>");
            redirect(base_url().'index.php/ketentuan');
        }else{
        redirect(base_url().'index.php/ketentuan/');

   
    
               }
           }

	
public function do_search() 
    {
        $keyword = $this->input->post('keyword');

       

        $data_ketentuan = $this->mketentuan->search($keyword);

        foreach($data_ketentuan as $baris_ketentuan){
       
        
        echo '<tr>
        
 
        <td>'.$baris_ketentuan['kode_calon'].'</td>
        <td>'.$baris_ketentuan['nama_calon'].'</td>
        
        
        <td align="center">
        <a  href="'.base_url().'/index.php/ketentuan/edit/'.$baris_ketentuan['kode_calon'].'" class="btn btn-info btn-sm">ubah</a> 
        
        
        </td>
            </tr>';
            }
        }

}