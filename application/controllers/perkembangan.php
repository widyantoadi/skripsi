<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class perkembangan extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mperkembangan','','TRUE');
    $this->load->helper('tanggal');
    //$this->load->model('manak','','TRUE');
    //$this->load->library('form_validation');
}
public function index(){
 $data['message']="";
 //$data['data_anak_asuh']=$this->manak->tampil_semua_anak_asuh();
		$this->load->view('perkembangan/tambah',$data);
	}
    

   public function pra(){
    $data['message']="";
    //$data['data_anak_asuh']=$this->manak->tampil_semua_anak_asuh();
        $this->load->view('perkembangan/pracetak',$data);
    }



     public function simpan(){
     	//$data['data_anak_asuh']=$this->manak->tampil_semua_anak_asuh();
     //$this->form_validation->set_rules('','','');
     $this->form_validation->set_rules('tanggal','Tanggal','required');
     $this->form_validation->set_rules('keterangan','Keterangan','required');
     $this->form_validation->set_rules('kategori','Kategori','required');
     
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mperkembangan->tambah();
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        redirect(base_url().'index.php/perkembangan');
    
    $data['page']='perkembangan/tambah';
    //$data['message']="";
    //$this->load->view('/tanda_terima',$data);
    }else {

           $data['message']="";

           $this->load->view('perkembangan/tambah',$data);
               }

	}

function get_allanak() {  
        $q = strtolower($_GET['term']);  
        $query = $this->mperkembangan->get_allanak($q); //query model  
   
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

    public function cetak(){
        
       
        $data['nama_anak']=$this->input->post('nama1');
        $data['tgl1'] =$this->input->post('tanggal1');
        $data['tgl2'] =$this->input->post('tanggal2');
        $data['perkembangan'] =$this->mperkembangan->view();
        $this->load->view('perkembangan/print', $data);              
        $html = $this->load->view('perkembangan/print', $data, true);
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            
            $html2pdf->Output('perkembangan.pdf');
            
        } catch (HTML2PDF_exception $e) {
            
        }
    }
        
   
    
  

    

}