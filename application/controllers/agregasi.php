<?php
class agregasi extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('magregasi');
		$this->load->helper(array('tanggal','terbilang'));
	}
 
	public function index()
	{
		$data['graph'] = $this->magregasi->graph();
		$data['tgl1'] =$this->input->post('tgl1');
		$data['tgl2'] =$this->input->post('tgl2');
		$this->load->view('agregasi/chart', $data);
	}

	public function pra(){
		$this->load->view('agregasi/pra');
	}

	/*public function x(){
		$data['graph'] = $this->magregasi->graph();
		$html = $this->load->view('agregasi/chart', $data, true);
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            
            $html2pdf->Output('agregasi.pdf');
            
        } catch (HTML2PDF_exception $e) {
            
        }
	}*/
 
}