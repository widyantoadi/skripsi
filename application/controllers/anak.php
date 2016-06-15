<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class anak extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('manak','','TRUE');
    //$this->load->library('form_validation');
	}


	public function index(){
	$data['data_anak_asuh']=$this->manak->tampil_semua_anak_asuh();
	$this->load->view('anak_asuh/tampil',$data);
	}

	public function do_search() 
    {
        $keyword = $this->input->post('keyword');

        //echo 'you just type in : '. $keyword;

        $data_anak_asuh = $this->manak->search($keyword);

        foreach($data_anak_asuh as $baris_anak){
       
        
        echo '<tr>
        
        <td align="center">'.$baris_anak['kode_anak_asuh'].'</td>
        <td>'.$baris_anak['nama_calon'].'</td>
   
        
        
        <td align="center">
        <a  href="'.base_url().'/index.php/anak/detail/'.$baris_anak['kode_anak_asuh'].'" class="btn btn-info btn-sm">Lihat</a> 
         <a  href="'.base_url().'/index.php/anak/edit/'.$baris_anak['kode_anak_asuh'].'" class="btn btn-info btn-sm">Edit</a> 
        
        
        </td>
            </tr>';
            }
        }


        public function detail($kode_anak_asuh){
        
        $data['qanak_asuh'] = $this->manak->get_anak_byid($kode_anak_asuh); //query model semua barang

        $this->load->view('anak_asuh/vdetanak',$data);
    }

    public function edit($kode_anak_asuh){
    $this->form_validation->set_rules('nama_calon','Nama calon','required');
    $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
    $this->form_validation->set_rules('tgl_lahir','Tanggal lahir','required');
     $this->form_validation->set_rules('pendidikan_terakhir','Pendidikan Terakhir','required');
     $this->form_validation->set_rules('status_anak','status anak','required');
     $this->form_validation->set_rules('anak_ke','anak ke','required');
     $this->form_validation->set_rules('dari','dari','required');
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
        $this->manak->update_anak($kode_calon);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diupdate</div>");
        redirect(base_url().'index.php/anak/');
    
         $data['qanak_asuh'] = $this->manak->get_anak_byid($kode_anak_asuh); //query model semua barang

        //$this->load->view('anak_asuh/vdetanak',$data);
    
    //$this->load->view('home',$data);
    }else {
            $data['qanak_asuh'] = $this->manak->get_anak_byid($kode_anak_asuh); //query model semua barang
        $data['message']="";
        $this->load->view('anak_asuh/edit',$data);
           

           
               }
    }

}

