<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class pengurus extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mpengurus','','TRUE');
    //$this->load->library('form_validation');
}

public function index(){
    $data['data_pengurus']=$this->mpengurus->tampil_semua_pengurus();
    $data['page']='pengurus/tampil';
    $this->load->view('pengurus/tampil',$data);
    }

//public function tampil(){
//$data['data_pengurus']=$this->mpengurus->tampil_semua_pengurus();
// $data['page']='pengurus/tampil';
//$this->load->view('pengurus/tampil',$data);

//}


public function tambah() {
    $data['kode_pengurus'] = $this->mpengurus->buat_kode();
    //$this->load->view('kode_view', $data);

    $this->form_validation->set_rules('nama_pengurus','Nama pengurus','required');
    $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('telepon','Telepon','required');
    $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required|matches[password2]');
    $this->form_validation->set_rules('password2','Konfirmasi Password','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mpengurus->tambah_pengurus();
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        redirect(base_url().'index.php/pengurus');
    
    $data['page']='pengurus/tambah';
    $this->load->view('home',$data);
    }else {

           $data['message']="";

           $this->load->view('pengurus/tambah',$data);
               }
}

public function hapus($kode_pengurus){
    $this->mpengurus->hapus($kode_pengurus);
    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"> Barang berhasil dihapus</div>");
    redirect(base_url().'index.php/pengurus');
}

public function edit($kode_pengurus){
    $this->form_validation->set_rules('nama_pengurus','Nama pengurus','required');
    $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('telepon','Telepon','required');
    $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required|matches[password2]');
    $this->form_validation->set_rules('password2','Konfirmasi Password','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mpengurus->update_pengurus($kode_pengurus);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diupdate</div>");
        redirect(base_url().'index.php/pengurus/');
    
    $data['pengurus']=$this->mpengurus->ambil_satu_pengurus($kode_pengurus);
    $data['page']='pengurus/edit';
    $this->load->view('home',$data);
    }else {
            $data['pengurus']=$this->mpengurus->ambil_satu_pengurus($kode_pengurus);
           $data['message']="";

           $this->load->view('pengurus/edit',$data);
               }
}


public function do_search() 
    {
        $keyword = $this->input->post('keyword');

        //echo 'you just type in : '. $keyword;

        $data_pengurus = $this->mpengurus->search($keyword);

        foreach($data_pengurus as $baris_pengurus){
       
        
        echo '<tr>
        
        <td align="center">'.$baris_pengurus['kode_pengurus'].'</td>
        <td>'.$baris_pengurus['nama_pengurus'].'</td>
        <td>'.$baris_pengurus['pekerjaan'].'</td>
        <td>'.$baris_pengurus['alamat'].'</td>
        <td>'.$baris_pengurus['telepon'].'</td>
        <td>'.$baris_pengurus['jabatan'].'</td>
        <td>'.$baris_pengurus['jenis_kelamin'].'</td>
        <td>'.$baris_pengurus['username'].'</td>
        
        
        <td align="center">
        <a  href="'.base_url().'/index.php/pengurus/edit/'.$baris_pengurus['kode_pengurus'].'" class="btn btn-info btn-sm">ubah</a> 
        
        <a   href=" '.base_url().'/index.php/pengurus/hapus/'.$baris_pengurus['kode_pengurus'].'" '?> class="btn btn-danger btn-sm" onclick="return confirm('yakin?')"> hapus</a>
        <?php '
        </td>
            </tr>';
            }
        }
}