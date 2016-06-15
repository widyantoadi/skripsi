<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class ska extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mska','','TRUE');
    //$this->load->helper('tanggal');

    //$this->load->model('mdonatur','','TRUE');
    //$this->load->model('mpengurus','','TRUE');
    
    //$this->load->library('form_validation');
}

public function index(){
    if($this->session->userdata('logged_in')) {
        $data['message']="";
        $data['no_ska'] = $this->mska->buat_kode();
        //$data['data_donatur']=$this->mdonatur->tampil_semua_donatur();
        //$data['data_pengurus']=$this->mpengurus->tampil_semua_pengurus();
        //$session_data = $this->session->userdata('logged_in');
                //$data['username'] = $session_data['username'];
                //$data['nama_pengurus'] = $session_data['nama_pengurus'];
                //$data['kode_pengurus'] = $session_data['kode_pengurus'];
                //$this->load->view('welcome', $data);
        $this->load->view('ska/ska',$data);
                
            }
            else {
                //Jika tidak ada session di kembalikan ke halaman login
                redirect('login', 'refresh');
            }
	
    }

    public function simpan() {
    $data['no_ska'] = $this->mska->buat_kode();
    
     //$this->form_validation->set_rules('banyaknya_uang','Banyaknya Uang','required|numeric');
     //$this->form_validation->set_rules('untuk_pembayaran','Untuk Pembayaran','required');
     //$this->form_validation->set_rules('kode','Nama Donatur','required');
     $this->form_validation->set_rules('no_ska','No SKA','required');
     
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mska->simpan();
        /*$data['no_t']=$this->input->post('no_tanda_terima');
        $data['tgl_t']=date('Y-m-d',strtotime($this->input->post('tgl_terima')));
        $data['nama_d']=$this->input->post('nama_donatur');
        $data['nama_p']=$this->input->post('nama_pengurus');
        $data['bu']=$this->input->post('banyaknya_uang');

        $data['up']=$this->input->post('untuk_pembayaran');
        $data['a']=$this->input->post('alamat');
        $no =$this->input->post('no_tanda_terima');
        */
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        /*$html = $this->load->view('tater/vproses_cetak', $data, true);
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            
            $html2pdf->Output('tater_'.$no.'.pdf');
            
        } catch (HTML2PDF_exception $e) {
            
        }
        */
        ###
        redirect(base_url().'index.php/ska');

     //$data['page']='tater/tanda_terima';
     ##
    //$data['message']="";
    //$this->load->view('ska/ska',$data);
    }else {

           $data['message']="";

           $this->load->view('ska/ska',$data);
               }
}

function get_allkeluarga() {  
        $q = strtolower($_GET['term']);  
        $query = $this->mska->get_allkeluarga($q); //query model  
   
        $keluarga       =  array();  
        foreach ($query as $d) {  
            $keluarga[]     = array(  
                'label' => $d->nama, //variabel array yg dibawa ke label ketikan kunci  
                'kode_calon_keluarga_asuh' => $d->kode_calon_keluarga_asuh, //variabel yg dibawa ke id nama  
                'alamat' => $d->alamat, //variabel yang dibawa ke id ibukota  
                'jenis_kelamin' => $d->jenis_kelamin,
                'pekerjaan' => $d->pekerjaan,
                //'telepon' => $d->telepon //variabel yang dibawa ke id keterangan  
            );  
        }  
        echo json_encode($keluarga);      //data array yang telah kota deklarasikan dibawa menggunakan json  
    }  

     function get_allanak() {  
        $q = strtolower($_GET['term']);  
        $query = $this->mska->get_allanak($q); //query model  
   
        $anak       =  array();  
        foreach ($query as $d) {  
            $anak[]     = array(  
                'label' => $d->nama_calon, //variabel array yg dibawa ke label ketikan kunci  
                'kode_anak_asuh' => $d->kode_anak_asuh , //variabel yg dibawa ke id nama  
                //'alamat' => $d->alamat, //variabel yang dibawa ke id ibukota  
                //'telepon' => $d->telepon //variabel yang dibawa ke id keterangan  
            );  
        }  
        echo json_encode($anak);      //data array yang telah kota deklarasikan dibawa menggunakan json  
    }  

}


