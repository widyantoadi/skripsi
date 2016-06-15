<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class keluarga extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mkeluarga','','TRUE');
    //$this->load->library('form_validation');
}

public function index(){
    $data['data_calon_keluarga_asuh']=$this->mkeluarga->tampil_semua_calon_keluarga_asuh();
    $data['page']='keluarga/tampil';
    $this->load->view('keluarga/tampil',$data);
    }

//public function tampil(){
//$data['data_calon_keluarga_asuh']=$this->Mcalon_keluarga_asuh->tampil_semua_calon_keluarga_asuh();
// $data['page']='calon_keluarga_asuh/tampil';
//$this->load->view('calon_keluarga_asuh/tampil',$data);

//}


public function tambah() {
    $data['kode_calon_keluarga_asuh'] = $this->mkeluarga->buat_kode();
    //$this->load->view('kode_view', $data);

    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
    $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('telepon','Telepon','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mkeluarga->tambah_calon_keluarga_asuh();
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        redirect(base_url().'index.php/keluarga');
    
    $data['page']='keluarga/tambah';
    $this->load->view('home',$data);
    }else {

           $data['message']="";

           $this->load->view('keluarga/tambah',$data);
               }
}

public function hapus($kode_calon_keluarga_asuh){
    $this->mkeluarga->hapus($kode_calon_keluarga_asuh);
    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"> Barang berhasil dihapus</div>");
    redirect(base_url().'index.php/keluarga');
}

public function edit($kode_calon_keluarga_asuh){
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
    $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('telepon','Telepon','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mkeluarga->update_calon_keluarga_asuh($kode_calon_keluarga_asuh);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diupdate</div>");
        redirect(base_url().'index.php/keluarga/');
    
    $data['calon_keluarga_asuh']=$this->mkeluarga->ambil_satu_calon_keluarga_asuh($kode_calon_keluarga_asuh);
    $data['page']='keluarga/edit';
    $this->load->view('home',$data);
    }else {
            $data['calon_keluarga_asuh']=$this->mkeluarga->ambil_satu_calon_keluarga_asuh($kode_calon_keluarga_asuh);
           $data['message']="";

           $this->load->view('keluarga/edit',$data);
               }
}


public function do_search() 
    {
        $keyword = $this->input->post('keyword');

        //echo 'you just type in : '. $keyword;

        $data_calon_keluarga_asuh = $this->mkeluarga->search($keyword);

        foreach($data_calon_keluarga_asuh as $baris_calon_keluarga_asuh){
       
        
        echo '<tr>
        
        <td align="center">'.$baris_calon_keluarga_asuh['kode_calon_keluarga_asuh'].'</td>
        <td>'.$baris_calon_keluarga_asuh['nama'].'</td>
        <td>'.$baris_calon_keluarga_asuh['jenis_kelamin'].'</td>
        <td>'.$baris_calon_keluarga_asuh['pekerjaan'].'</td>
        <td>'.$baris_calon_keluarga_asuh['alamat'].'</td>
        <td>'.$baris_calon_keluarga_asuh['telepon'].'</td>
        
        
        <td align="center">
        <a  href="'.base_url().'/index.php/keluarga/edit/'.$baris_calon_keluarga_asuh['kode_calon_keluarga_asuh'].'" class="btn btn-info btn-sm">ubah</a> 
        
        <a   href=" '.base_url().'/index.php/keluarga/hapus/'.$baris_calon_keluarga_asuh['kode_calon_keluarga_asuh'].'" '?> class="btn btn-danger btn-sm" onclick="return confirm('yakin?')"> hapus</a>
        <?php '
        </td>
            </tr>';
            }
        }
}