<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class voucher extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('mvoucher');
    $this->load->helper(array('tanggal','terbilang'));
     //$this->load->model('manak');
    $this->load->library('form_validation');
    }


    

    public function get_anak()
    {
        $anak = $this->mvoucher->get_anak($this->input->get('q', TRUE));

        echo json_encode((object)[
            'items' => $anak
        ]);
    }


    public function tampil(){
        $data['data_voucher']=$this->mvoucher->tampil_semua_voucher();
        $this->load->view('voucher/tampil',$data);
    }

    public function index(){
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['nama_pengurus'] = $session_data['nama_pengurus'];
            $data['kode_pengurus'] = $session_data['kode_pengurus'];
        $data['no_voucher'] = $this->mvoucher->buat_kode();
        $data['message']="";
    //$data['data_anak']=$this->manak->tampil_semua_anak2();
    //$data['data_anak_asuh']=$this->manak->tampil_semua_anak_asuh();
    $this->load->view('voucher/voucher',$data);
    }else{
        redirect('login', 'refresh');
        }
    }

    public function edit($id){
    $data['voucher']=$this->mvoucher->ambil_satu_voucher($id);
    $data['detil_voucher']=$this->mvoucher->detil_trans2($id);
    $data['message']="";
    $this->load->view('voucher/edit',$data);
    }

    public function store()
    {
        
        $this->form_validation->set_rules('no_voucher','Nomor voucher','required');
     
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
         $id=$this->input->post('no_voucher');
        $c=$this->input->post('nama_pengurus');
        $data=array(
            'no_voucher' => $this->input->post('no_voucher'),
            'tgl_voucher' => $this->input->post('tgl_voucher'),
            'kode_pengurus' => $this->input->post('kode_pengurus'),
            //'nama_pengurus' => $this->input->post('nama_pengurus')
            );
        
        ///ini buat update
        //$update = $this->mvoucher->ambil_no_voucher($id);
        //$this->mvoucher->tg_voucher = $this->input->post('tgl_voucher', TRUE);
        
        $this->mvoucher->voucher = [];

        foreach ($this->input->post('kode_anak_asuh', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['kode_anak_asuh'] = $value;
        foreach ($this->input->post('kategori', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['kategori'] = $value;
        foreach ($this->input->post('keperluan', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['keperluan'] = $value;
        foreach ($this->input->post('jumlah', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['jumlah'] = $value;
        foreach ($this->input->post('ref_kwitansi', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['ref_kwitansi'] = $value;
        foreach ($this->input->post('tgl_bayar', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['tgl_bayar'] = $value;

        
       if( $c==$c){
        $this->mvoucher->store1($data);
        $this->mvoucher->store($id);
        $data['nama_pengurus'] =$this->input->post('nama_pengurus');
        $data['detil_voucher']=$this->mvoucher->detil_trans();
        $data['totali'] = $this->mvoucher->total();
        //$this->load->view('voucher/vproses_cetak', $data);
        $no =$this->input->post('no_voucher');
        $html = $this->load->view('voucher/vproses_cetak', $data, true);
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            
            $html2pdf->Output('voucher_'.$no.'.pdf');
            
        } catch (HTML2PDF_exception $e) {
            
        }       
       } else {
        echo "something wrong";
       }
       
    
        
    }else {

           $data['message']="";

           $this->load->view('voucher/voucher',$data);
               }
           }

    public function storee()
    {
        
        $this->form_validation->set_rules('no_voucher','Nomor voucher','required');
     
    $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    if($this->form_validation->run() == TRUE)
    {
         $id=$this->input->post('no_voucher');
        $c=$this->input->post('nama_pengurus');
        $data=array(
            'no_voucher' => $this->input->post('no_voucher'),
            'tgl_voucher' => $this->input->post('tgl_voucher'),
            'kode_pengurus' => $this->input->post('kode_pengurus'),
            //'nama_pengurus' => $this->input->post('nama_pengurus')
            );
        
        ///ini buat update
        //$update = $this->mvoucher->ambil_no_voucher($id);
        //$this->mvoucher->tg_voucher = $this->input->post('tgl_voucher', TRUE);
        
        $this->mvoucher->voucher = [];

        foreach ($this->input->post('kode_anak_asuh', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['kode_anak_asuh'] = $value;
        foreach ($this->input->post('kategori', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['kategori'] = $value;
        foreach ($this->input->post('keperluan', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['keperluan'] = $value;
        foreach ($this->input->post('jumlah', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['jumlah'] = $value;
        foreach ($this->input->post('ref_kwitansi', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['ref_kwitansi'] = $value;
        foreach ($this->input->post('tgl_bayar', TRUE) as $key => $value) $this->mvoucher->voucher[$key]['tgl_bayar'] = $value;

       
       if( $c==$c){
        $this->mvoucher->delete_no_voucher($id);
        $this->mvoucher->store($id);
        $data['nama_pengurus'] =$this->input->post('nama_pengurus');
        $data['detil_voucher']=$this->mvoucher->detil_trans();
        $data['totali'] = $this->mvoucher->total();
        //$this->load->view('voucher/vproses_cetak', $data);
        $no =$this->input->post('no_voucher');
        $html = $this->load->view('voucher/vproses_cetak', $data, true);
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            
            $html2pdf->Output('voucher_'.$no.'.pdf');
            
        } catch (HTML2PDF_exception $e) {
            
        }       
       } else {
        echo "something wrong";
       }
       
    
        
    }else {

           $data['message']="";

           $this->load->view('voucher/voucher',$data);
               }
           }



       public function pra(){
        $this->load->view('voucher/pra');
       }    

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
        $data['lap'] = $this->mvoucher->lap_keluar();
         $data['totalz'] = $this->mvoucher->total2();
        //$data['total'] = $this->mtater->view2();
        $this->load->view('voucher/lap', $data);
        $html = ob_get_contents();
        ob_end_clean();
         
        require_once('./assets/html2pdf/html2pdf.class.php');
        //$pdf = new HTML2PDF('P','A4','en');
        $pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
        $pdf->WriteHTML($html);
        
        $pdf->Output('Data Pengeluaran Kas.pdf','');
    }else{
        redirect('login', 'refresh');
    }
    }


    public function do_search() 
    {
        $keyword = $this->input->post('keyword');

       

        $data_voucher = $this->mvoucher->search($keyword);

        foreach($data_voucher as $baris_voucher){
       
        
        echo '<tr>
        
 
        <td align="center">'.$baris_voucher['no_voucher'].'</td>
        <td align="center">'.$baris_voucher['tgl_voucher'].'</td>
        
        
        <td align="center">
        <a  href="'.base_url().'/index.php/voucher/edit/'.$baris_voucher['no_voucher'].'" class="btn btn-info btn-sm">update</a>
        
        
        </td>
            </tr>';
            }
        }
    


    }