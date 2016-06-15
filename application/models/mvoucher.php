<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mvoucher extends CI_Model {

	protected $table = 'voucher';
	protected $table_detail = 'detil_voucher';

	
	public $voucher = [];

	public function __construct()
	{
		parent::__construct();

		
	}

	public function ambil_no_voucher($id)
	{  
          $result=$this->db->where('no_voucher',$id);
          $result=$this->db->get('detil_voucher');
          if($result->num_rows() >0){
          		return $result->row();
          }
          else {
          	return false;
          }

   	}

   	public function delete_no_voucher($id)
	{

        	$this->db->where('no_voucher', $id)->delete('detil_voucher');

   	}

	public function store($id)
	{
		
		$this->db->trans_begin();

		try {
			//$this->db->insert($this->table, $this);

			//$id = $this->db->insert_id();

			foreach ($this->voucher as $key => $value) $this->voucher[$key]['no_voucher'] = $id;

			$this->db->insert_batch('detil_voucher', $this->voucher);
		} catch (Exception $e) {
			return FALSE;
		}

		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        return FALSE;
		} else {
	        $this->db->trans_commit();
	        return TRUE;
		}
	}

	public function store1($data){
		$this->db->insert('voucher',$data);
	}


	public function ambil_satu_voucher($id){
        //$this->db->where('no_voucher',$id);
        //$sql_v= $this->db->get('voucher');
        $q="SELECT voucher.no_voucher,voucher.tgl_voucher,voucher.kode_pengurus,pengurus.nama_pengurus FROM voucher INNER JOIN  pengurus ON voucher.kode_pengurus = pengurus.kode_pengurus where voucher.no_voucher='$id'";
        $sql_v=$this->db->query($q);
        if($sql_v->num_rows()==1){
            return $sql_v->row_array();
        }
    }

    

    public function detil_trans2($id){
	//$no_voucher= $this->input->post('no_voucher');
	$qw="SELECT detil_voucher.kode_anak_asuh,detil_voucher.kategori,detil_voucher.keperluan,detil_voucher.jumlah,detil_voucher.ref_kwitansi,detil_voucher.tgl_bayar,calon.nama_calon,detil_voucher.no_voucher FROM  detil_voucher INNER JOIN anak_asuh ON detil_voucher.kode_anak_asuh =anak_asuh.kode_anak_asuh INNER JOIN calon ON anak_asuh.kode_calon = calon.kode_calon where no_voucher='$id'";
	$qwa= $this->db->query($qw);
		return $qwa->result();
}

    public function tampil_semua_voucher(){
    	
        $s="SELECT DISTINCT voucher.no_voucher,voucher.tgl_voucher,detil_voucher.tgl_bayar,pengurus.nama_pengurus FROM voucher INNER JOIN detil_voucher ON voucher.no_voucher = detil_voucher.no_voucher INNER JOIN pengurus ON voucher.kode_pengurus = pengurus.kode_pengurus WHERE detil_voucher.tgl_bayar = '0000-00-00'";
        $sql_v=$this->db->query($s);
        if($sql_v->num_rows()>0) {
            return $sql_v->result_array();
        }
    }

    public function get_anak($term = '')
	{
		//$this->db->order_by('kode_anak_asuh', 'asc');

		//if (! empty($term)) $this->db->like('LOWER(nama_calon)', strtolower($term), 'both');

		//$q = $this->db->get('anak_asuh');
		$a="SELECT anak_asuh.kode_anak_asuh,calon.nama_calon FROM anak_asuh INNER JOIN calon ON anak_asuh.kode_calon = calon.kode_calon where status='tetap' and calon.nama_calon like '%$term%'";
		$q= $this->db->query($a);
		return $q->result();
	}

	function buat_kode()
{
$this->db->select('RIGHT(voucher.no_voucher,3) as kode', FALSE);
$this->db->order_by('no_voucher','DESC');
$this->db->limit(1);
$query = $this->db->get('voucher');
//cek dulu apakah ada sudah ada kode di tabel.
if($query->num_rows() <> 0){
//jika kode ternyata sudah ada.
$data = $query->row();
$kode = intval($data->kode) + 1;
}else{
//jika kode belum ada
$kode = 1;
}
$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
$kodejadi = "V".$kodemax;
return $kodejadi;
}

public function detil_trans(){
	$no_voucher= $this->input->post('no_voucher');
	$qw="SELECT detil_voucher.kode_anak_asuh,detil_voucher.kategori,detil_voucher.keperluan,detil_voucher.jumlah,detil_voucher.ref_kwitansi,detil_voucher.tgl_bayar,calon.nama_calon,detil_voucher.no_voucher FROM  detil_voucher INNER JOIN anak_asuh ON detil_voucher.kode_anak_asuh =anak_asuh.kode_anak_asuh INNER JOIN calon ON anak_asuh.kode_calon = calon.kode_calon where no_voucher='$no_voucher'";
	$qwa= $this->db->query($qw);
		return $qwa->result();
}

public function total(){
	$a=$this->input->post('no_voucher');
	$totala="SELECT sum(detil_voucher.jumlah) as jumlah FROM detil_voucher WHERE no_voucher='$a'";
        $total=$this->db->query($totala);
        if ($total->num_rows() == 1 ) {   
            return $total->result();  
        }  
}

public function lap_keluar(){
	$a=$this->input->post('tgl1');
	$b=$this->input->post('tgl2');
	$q="SELECT voucher.no_voucher,voucher.tgl_voucher,sum(detil_voucher.jumlah) as total ,pengurus.nama_pengurus FROM voucher INNER JOIN pengurus ON  voucher.kode_pengurus = pengurus.kode_pengurus INNER JOIN detil_voucher ON voucher.no_voucher = detil_voucher.no_voucher where voucher.tgl_voucher between '$a' and '$b' group by voucher.no_voucher";
	$lap=$this->db->query($q);
        if ($lap->num_rows() > 0) {   
            return $lap->result();  
        }  
}

public function total2(){
        $a =$this->input->post('tgl1');
        $b =$this->input->post('tgl2');
       
        $totala=" SELECT voucher.tgl_voucher,sum(detil_voucher.jumlah) as totali FROM voucher INNER JOIN detil_voucher ON voucher.no_voucher  = detil_voucher.no_voucher WHERE voucher.tgl_voucher between '$a' and '$b' ";
        $totalz=$this->db->query($totala);
        if ($totalz->num_rows() ==1 ) {   
            return $totalz->result();  
        }  
    } 


   
    function search($keyword) 
    {
       
        
        
        $sqla2="SELECT DISTINCT voucher.no_voucher,voucher.tgl_voucher,detil_voucher.tgl_bayar,pengurus.nama_pengurus FROM voucher INNER JOIN detil_voucher ON voucher.no_voucher = detil_voucher.no_voucher INNER JOIN pengurus ON voucher.kode_pengurus = pengurus.kode_pengurus WHERE detil_voucher.tgl_bayar = '0000-00-00' and voucher.no_voucher like '%$keyword%'";
        $result    =     $this->db->query($sqla2);


        if($result->num_rows() > 0) 
        {
            return $result->result_array();       
        }
        else 
        {
            return array();       
        }   

        }
   

}