<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class tater extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mtater','','TRUE');
    $this->load->helper(array('tanggal','terbilang'));

    //$this->load->model('mdonatur','','TRUE');
    //$this->load->model('mpengurus','','TRUE');
    
    //$this->load->library('form_validation');
}

public function index(){
    if($this->session->userdata('logged_in')) {
        $data['message']="";
        $data['no_tanda_terima'] = $this->mtater->buat_kode();
        //$data['data_donatur']=$this->mdonatur->tampil_semua_donatur();
        //$data['data_pengurus']=$this->mpengurus->tampil_semua_pengurus();
        $session_data = $this->session->userdata('logged_in');
                //$data['username'] = $session_data['username'];
                $data['nama_pengurus'] = $session_data['nama_pengurus'];
                $data['kode_pengurus'] = $session_data['kode_pengurus'];
                //$this->load->view('welcome', $data);
        $this->load->view('tater/tanda_terima',$data);
                
            }
            else {
                //Jika tidak ada session di kembalikan ke halaman login
                redirect('login', 'refresh');
            }
	
    }

    public function simpan() {
    $data['no_tanda_terima'] = $this->mtater->buat_kode();
    
     $this->form_validation->set_rules('banyaknya_uang','Banyaknya Uang','required|numeric');
     $this->form_validation->set_rules('untuk_pembayaran','Untuk Pembayaran','required');
     $this->form_validation->set_rules('kode','Nama Donatur','required');
     $this->form_validation->set_rules('kode1','Nama Pengurus','required');
     
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $this->mtater->simpan();
        $data['no_t']=$this->input->post('no_tanda_terima');
        $data['tgl_t']=date('Y-m-d',strtotime($this->input->post('tgl_terima')));
        $data['nama_d']=$this->input->post('nama_donatur');
        $data['nama_p']=$this->input->post('nama_pengurus');
        $data['bu']=$this->input->post('banyaknya_uang');

        $data['up']=$this->input->post('untuk_pembayaran');
        $data['a']=$this->input->post('alamat');
        $no =$this->input->post('no_tanda_terima');
        
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        $html = $this->load->view('tater/vproses_cetak', $data, true);
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            
            $html2pdf->Output('tater_'.$no.'.pdf');
            
        } catch (HTML2PDF_exception $e) {
            
        }
       
        }else {

           $data['message']="";

           $this->load->view('tater/tanda_terima',$data);
               }
        }

        function get_alldonatur() {  
        $q = strtolower($_GET['term']);  
        $query = $this->mtater->get_alldonatur($q); //query model  
   
        $donatur       =  array();  
        foreach ($query as $d) {  
            $donatur[]     = array(  
                'label' => $d->nama_donatur, 
                'kode' => $d->kode_donatur ,
                'alamat' => $d->alamat, 
                 
            );  
        }  
        echo json_encode($donatur);        
        }  

        function get_allpengurus() {  
        $q = strtolower($_GET['term']);  
        $query = $this->mtater->get_allpengurus($q); //query model  
   
        $pengurus       =  array();  
        foreach ($query as $d) {  
            $pengurus[]     = array(  
                'label' => $d->nama_pengurus, 
                'kode1' => $d->kode_pengurus ,
                
            );  
        }  
        echo json_encode($pengurus);        
    }  


    public function pra(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
         //$x = $session_data['jabatan'];
                
        $x = $session_data['jabatan'];
        if($x == "Bendahara"){               
        //$data['tater'] = $this->mtater->view();
        $this->load->view('tater/pra');}
                        else{
                            redirect('welcome', 'refresh');
                        }
    }else{
        redirect('login', 'refresh');
    }
    }

/*public function ini1(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
                
        $data['nama_pengurus'] = $session_data['nama_pengurus'];
                
        $data['tater'] = $this->mtater->view();
        $this->load->view('tater/preview', $data);
    }else{
        redirect('login', 'refresh');
    }
    }

 public function ini(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
                
        $data['nama_pengurus'] = $session_data['nama_pengurus'];
                
        $data['tater'] = $this->mtater->view();
        $this->load->view('tater/preview', $data);
    }else{
        redirect('login', 'refresh');
    }
    }
    */
public function cetak(){
        
        ob_start();
        if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
                //$data['username'] = $session_data['username'];
        $data['nama_pengurus1'] = $session_data['nama_pengurus'];
        $data['jabatan'] = $session_data['jabatan'];
        $data['tgl1'] =$this->input->post('tgl1');
        $data['tgl2'] =$this->input->post('tgl2');
                //$data['kode_pengurus'] = $session_data['kode_pengurus'];
        $data['tater'] = $this->mtater->view();
        $data['total'] = $this->mtater->view2();
        $this->load->view('tater/print', $data);
        $html = ob_get_contents();
        ob_end_clean();
         
        require_once('./assets/html2pdf/html2pdf.class.php');
        //$pdf = new HTML2PDF('P','A4','en');
        $pdf = new HTML2PDF('L', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
        $pdf->WriteHTML($html);
        
        $pdf->Output('Data Tanda Terima.pdf','');
    }else{
        redirect('login', 'refresh');
    }
    }


}


