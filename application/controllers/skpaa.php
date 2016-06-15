<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class skpaa extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mskpaa','','TRUE');
    $this->load->helper('tanggal');

    //$this->load->model('mdonatur','','TRUE');
    //$this->load->model('mpengurus','','TRUE');
    
    //$this->load->library('form_validation');
}

public function index(){
    if($this->session->userdata('logged_in')) {
        $data['message']="";
        $data['no_skpaa'] = $this->mskpaa->buat_kode();
        //$data['data_donatur']=$this->mdonatur->tampil_semua_donatur();
        //$data['data_pengurus']=$this->mpengurus->tampil_semua_pengurus();
        $session_data = $this->session->userdata('logged_in');
                //$data['username'] = $session_data['username'];
                $data['nama_pengurus'] = $session_data['nama_pengurus'];
                $data['kode_pengurus'] = $session_data['kode_pengurus'];
                $data['alamatp'] = $session_data['alamat'];
                $data['pekerjaanp'] = $session_data['pekerjaan'];
                $data['kelaminp'] = $session_data['jenis_kelamin'];
                //$this->load->view('welcome', $data);
        $this->load->view('skpaa/skpaa',$data);
                
            }
            else {
                //Jika tidak ada session di kembalikan ke halaman login
                redirect('login', 'refresh');
            }
	
    }

    public function laporan(){
        $this->load->view('skpaa/lap');
    }

    

   

function get_allska() {  
        $q = strtolower($_GET['term']);  
        $query = $this->mskpaa->get_allska($q); //query model  
   
        $ska       =  array();  
        foreach ($query as $d) {  
            $ska[]     = array(  
                'label' => $d->no_ska, //variabel array yg dibawa ke label ketikan kunci  
                'kode_calon_keluarga_asuh' => $d->kode_calon_keluarga_asuh, //variabel yg dibawa ke id nama  
                'kode_anak_asuh' => $d->kode_anak_asuh,
                'nama_calon' => $d->nama_calon,
                'alamat' => $d->alamat,  
                'nama' => $d->nama,  
                'jenis_kelamin' => $d->jenis_kelamin,
                'pekerjaan' => $d->pekerjaan,
                //'telepon' => $d->telepon //variabel yang dibawa ke id keterangan  
            );  
        }  
        echo json_encode($ska);      //data array yang telah  deklarasikan dibawa menggunakan json  
    } 

    function get_xanak() {  
        $q = strtolower($_GET['term']);  
        $query = $this->mskpaa->get_xanak($q); //query model  
   
        $xanak       =  array();  
        foreach ($query as $d) {  
            $xanak[]     = array(  
                'label' => $d->nama_calon, //variabel array yg dibawa ke label ketikan kunci  
                'kode_calon_keluarga_asuh' => $d->kode_calon_keluarga_asuh, //variabel yg dibawa ke id nama  
                'kode_anak_asuh' => $d->kode_anak_asuh,
                'no_ska' => $d->no_ska,
                'alamat' => $d->alamat,  
                'nama' => $d->nama,  
                'jenis_kelamin' => $d->jenis_kelamin,
                'pekerjaan' => $d->pekerjaan,
                //'telepon' => $d->telepon //variabel yang dibawa ke id keterangan  
            );  
        }  
        echo json_encode($xanak);      //data array yang telah  deklarasikan dibawa menggunakan json  
    } 

    
public function simpan(){
    $data['no_skpaa'] = $this->mskpaa->buat_kode();
    
     
     $this->form_validation->set_rules('no_skpaa','No SKPAA','required');
     
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
        $z = $this->input->post('kode_anak_asuh');
        $this->mskpaa->simpan();
        $this->mskpaa->update_status_anak($z);
        $data['no_s']=$this->input->post('no_skpaa');
        $data['tgl_s']=date('Y-m-d',strtotime($this->input->post('tgl_skpaa')));
        $data['nama_k']=$this->input->post('nama');
        $data['alamat_k']=$this->input->post('alamat');
        $data['jeniskelamin_k']=$this->input->post('jenis_kelamin');
        $data['pekerjaan_k']=$this->input->post('pekerjaan');
        $data['nama_a']=$this->input->post('nama_calon');
        $data['nama_p']=$this->input->post('nama_pengurus');
        $data['alamat_p']=$this->input->post('alamat_pengurus');
        $data['pekerjaan_p']=$this->input->post('pekerjaan_pengurus');
        $data['jeniskp']=$this->input->post('jenis_kelamin_pengurus');
       
        
        $no =$this->input->post('no_skpaa');
        
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"> Data berhasil di insert</div>");
        $html = $this->load->view('skpaa/vproses_cetak', $data, true);
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            
            $html2pdf->Output('tater_'.$no.'.pdf');
            
        } catch (HTML2PDF_exception $e) {
            
        }
        
    }else {

           $data['message']="";

           $this->load->view('skpaa/skpaa',$data);
               }
}

public function lap_keluar(){
        ob_start();
        $data['tgl1'] =$this->input->post('tgl1');
        $data['skpaa'] = $this->mskpaa->laporan1();
        $this->load->view('skpaa/print', $data);
        $html = ob_get_contents();
        ob_end_clean();
         
        require_once('./assets/html2pdf/html2pdf.class.php');
        //$pdf = new HTML2PDF('P','A4','en');
        $pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
        $pdf->WriteHTML($html);
       $pdf->Output('lap.pdf');
    
    }
     

}


