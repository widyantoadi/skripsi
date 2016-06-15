<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class calon extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mcalon','','TRUE');
    //$this->load->library('form_validation');
}

public function index(){
    $data['data_calon']=$this->mcalon->tampil_semua_calon3();
    $data['page']='calon/tampil';
    $this->load->view('calon/tampil',$data);
    }




public function tambah() {
    $data['kode_calon'] = $this->mcalon->buat_kode();
    //$this->load->view('kode_view', $data);

    $this->form_validation->set_rules('nama_calon','Nama calon','required');
    $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
    $this->form_validation->set_rules('tgl_lahir','Tanggal lahir','required');
     $this->form_validation->set_rules('pendidikan_terakhir','Pendidikan Terakhir','required');
     $this->form_validation->set_rules('status_anak','status anak','required');
     $this->form_validation->set_rules('anak_ke','anak ke','required');
     $this->form_validation->set_rules('alamat','Alamat','required');
     $this->form_validation->set_rules('nama_bapak','Nama Bapak','required');
     $this->form_validation->set_rules('alamat_bapak','Alamat Bapak','required');
     //$this->form_validation->set_rules('pekerjaan_bapak','Pekerjaan Bapak','required');
     //$this->form_validation->set_rules('tgl_meninggal_bapak','Tanggal Meninggal Bapak','required');
     $this->form_validation->set_rules('nama_ibu','Nama Ibu','required');
     $this->form_validation->set_rules('alamat_ibu','Alamat Ibu','required');
     //$this->form_validation->set_rules('pekerjaan_ibu','Pekerjaan Ibu','required');
     //$this->form_validation->set_rules('tgl_meninggal_ibu','Tanggal Meninggal Ibu','required');
     //$this->form_validation->set_rules('nama_wali','Nama Wali','required');
     //$this->form_validation->set_rules('alamat_wali','Alamat Wali','required');
     //$this->form_validation->set_rules('pekerjaan_wali','Pekerjaan Wali','required');
     
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mcalon->tambah_calon();
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        redirect(base_url().'index.php/calon');
    
    $data['page']='calon/tambah';
    
    }else {

           $data['message']="";

           $this->load->view('calon/tambah',$data);
               }
}

public function hapus($kode_calon){
    $this->mcalon->hapus($kode_calon);
    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"> Barang berhasil dihapus</div>");
    redirect(base_url().'index.php/calon');
}



public function edit($kode_calon){
    $this->form_validation->set_rules('nama_calon','Nama calon','required');
    $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
    $this->form_validation->set_rules('tgl_lahir','Tanggal lahir','required');
     $this->form_validation->set_rules('pendidikan_terakhir','Pendidikan Terakhir','required');
     $this->form_validation->set_rules('status_anak','status anak','required');
     $this->form_validation->set_rules('anak_ke','anak ke','required');
     $this->form_validation->set_rules('alamat','Alamat','required');
     $this->form_validation->set_rules('nama_bapak','Nama Bapak','required');
     $this->form_validation->set_rules('alamat_bapak','Alamat Bapak','required');
     //$this->form_validation->set_rules('pekerjaan_bapak','Pekerjaan Bapak','required');
     //$this->form_validation->set_rules('tgl_meninggal_bapak','Tanggal Meninggal Bapak','required');
     $this->form_validation->set_rules('nama_ibu','Nama Ibu','required');
     $this->form_validation->set_rules('alamat_ibu','Alamat Ibu','required');
     //$this->form_validation->set_rules('pekerjaan_ibu','Pekerjaan Ibu','required');
     //$this->form_validation->set_rules('tgl_meninggal_ibu','Tanggal Meninggal Ibu','required');
     //$this->form_validation->set_rules('nama_wali','Nama Wali','required');
     //$this->form_validation->set_rules('alamat_wali','Alamat Wali','required');
     //$this->form_validation->set_rules('pekerjaan_wali','Pekerjaan Wali','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mcalon->update_calon($kode_calon);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diupdate</div>");
        redirect(base_url().'index.php/calon/');
    
    $data['calon']=$this->mcalon->ambil_satu_calon($kode_calon);
    $data['page']='calon/edit';
    //$this->load->view('home',$data);
    }else {
            $data['calon']=$this->mcalon->ambil_satu_calon($kode_calon);
           $data['message']="";

           $this->load->view('calon/edit',$data);
               }
}


public function do_search() 
    {
        $keyword = $this->input->post('keyword');

        //echo 'you just type in : '. $keyword;

        $data_calon = $this->mcalon->search($keyword);

        foreach($data_calon as $baris_calon){
       
        
        echo '<tr>
        
        <td align="center">'.$baris_calon['kode_calon'].'</td>
        <td>'.$baris_calon['nama_calon'].'</td>
        <td>'.$baris_calon['alamat'].'</td>
        <td>'.$baris_calon['pendidikan_terakhir'].'</td>
        
        
        <td align="center">
        <a  href="'.base_url().'/index.php/calon/edit/'.$baris_calon['kode_calon'].'" class="btn btn-info btn-sm">ubah</a> 
        

        
        <a   href=" '.base_url().'/index.php/calon/hapus/'.$baris_calon['kode_calon'].'" '?> class="btn btn-danger btn-sm" onclick="return confirm('yakin?')"> hapus</a>
        <?php '
        </td>
            </tr>';
            }
        }
}