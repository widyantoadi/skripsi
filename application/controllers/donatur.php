<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Donatur extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mdonatur','','TRUE');
    //$this->load->library('form_validation');
}

public function index(){
    $data['data_donatur']=$this->mdonatur->tampil_semua_donatur();
    $data['page']='donatur/tampil';
    $this->load->view('donatur/tampil',$data);
    }

 /*public function index(){
        $data['data_donatur'] = $this->mdonatur->tampil_semua_donatur();
        $this->load->view('donatur/preview', $data);
        }   
public function cetak(){
    //$data['data_donatur'] = $this->mdonatur->tampil_semua_donatur();
        ob_start();
        $data['data_donatur'] = $this->mdonatur->tampil_semua_donatur();
        $this->load->view('donatur/print', $data);
        $html = ob_get_contents();
        ob_end_clean();
         
        require_once('./assets/html2pdf/html2pdf.class.php');
        //require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Donatur.pdf', 'D');
    }*/
//public function tampil(){
//$data['data_donatur']=$this->Mdonatur->tampil_semua_donatur();
// $data['page']='donatur/tampil';
//$this->load->view('donatur/tampil',$data);

//}


public function tambah() {
    $data['kode_donatur'] = $this->mdonatur->buat_kode();
    //$this->load->view('kode_view', $data);

    $this->form_validation->set_rules('nama_donatur','Nama donatur','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('telepon','Telepon','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mdonatur->tambah_donatur();
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        redirect(base_url().'index.php/donatur');
    
    $data['page']='donatur/tambah';
    //$this->load->view('home',$data);
    }else {

           $data['message']="";

           $this->load->view('donatur/tambah',$data);
               }
}

public function hapus($kode_donatur){
    $this->mdonatur->hapus($kode_donatur);
    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"> Barang berhasil dihapus</div>");
    redirect(base_url().'index.php/donatur');
}

public function edit($kode_donatur){
    $this->form_validation->set_rules('nama_donatur','Nama donatur','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('telepon','Telepon','required');
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mdonatur->update_donatur($kode_donatur);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diupdate</div>");
        redirect(base_url().'index.php/donatur/');
    
    $data['donatur']=$this->mdonatur->ambil_satu_donatur($kode_donatur);
    //$data['page']='donatur/edit';
    $this->load->view('home',$data);
    }else {
            $data['donatur']=$this->mdonatur->ambil_satu_donatur($kode_donatur);
           $data['message']="";

           $this->load->view('donatur/edit',$data);
               }
}


public function do_search() 
    {
        $keyword = $this->input->post('keyword');

        //echo 'you just type in : '. $keyword;

        $data_donatur = $this->mdonatur->search($keyword);

        foreach($data_donatur as $baris_donatur){
       
        
        echo '<tr>
        
        <td align="center">'.$baris_donatur['kode_donatur'].'</td>
        <td>'.$baris_donatur['nama_donatur'].'</td>
        <td>'.$baris_donatur['alamat'].'</td>
        <td>'.$baris_donatur['telepon'].'</td>
        
        
        <td align="center">
        <a  href="'.base_url().'/index.php/donatur/edit/'.$baris_donatur['kode_donatur'].'" class="btn btn-info btn-sm">ubah</a> 
        
        <a   href=" '.base_url().'/index.php/donatur/hapus/'.$baris_donatur['kode_donatur'].'" '?> class="btn btn-danger btn-sm" onclick="return confirm('yakin?')"> hapus</a>
        <?php '
        </td>
            </tr>';
            }
        }
}