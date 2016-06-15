<?php
// Penduduk.php
class magregasi extends CI_Model {
	//public function __construct()
	//{
	//	$this->load->database();
	//}
 
	public function graph()
	{
		$a=$this->input->post('tgl1');
		$b=$this->input->post('tgl2');
		$q="SELECT detil_voucher.kategori,sum(detil_voucher.jumlah) as jumlah,voucher.tgl_voucher FROM detil_voucher INNER JOIN voucher ON detil_voucher.no_voucher = voucher.no_voucher where voucher.tgl_voucher between '$a' and '$b'   group by detil_voucher.kategori";
		$data = $this->db->query($q);
		return $data->result();
	}
 
}