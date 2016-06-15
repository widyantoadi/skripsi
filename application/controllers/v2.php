<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class v2 extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('m_v2','','TRUE');
    //$this->load->library('form_validation');
    }

    function sukses(){
        //$g=array(
        //    'id_transaksi'=>$this->input->post(//'nomer'),
        //    'tanggal_pinjam'=>$this->input->//post('pinjam')
        //    );
        //$this->m_peminjaman->simpan2($g);
        $tmp=$this->m_v2->tampilTmp()->result();
        foreach($tmp as $row){
            $info=array(
                'id_transaksi'=>$this->input->post('nomer'),
                
                'kode_anak_asuh'=>$row->kode_anak_asuh,
                'tanggal_pinjam'=>$this->input->post('pinjam'),
                
                
            );
            $this->m_v2->simpan($info);

            
            //hapus data di temp
            $this->m_v2->hapusTmp($row->kode_anak_asuh);
        }
    }

    public function index(){
        $this->load->view('v2/v2',$data);
    }

    public function tes(){
    
    $data['kode_calon'] = $this->m_v2->buat_kode();
    $this->load->view('v2/v3',$data);
    }

    function tampil(){
        $data['tmp']=$this->m_v2->tampilTmp()->result();
        $data['jumlahTmp']=$this->m_v2->jumlahTmp();
        $this->load->view('v2/tampil',$data);
    }

    function pencarianbuku(){
        $cari=$this->input->post('caribuku');
        $data['buku']=$this->m_v2->pencarianbuku($cari)->result();
        $this->load->view('v2/pencarianbuku',$data);
    }

    function cariBuku(){
        $kode=$this->input->post('kode');
        $q=$this->m_v2->cariBuku($kode);
        if($q->num_rows()>0){
            $q=$q->row_array();
            echo $q['kode_anak_asuh']."|".$q['nama_calon'];
        }
    }
    
    
    function tambah(){
        $kode=$this->input->post('kode');
        $cek=$this->m_v2->cekTmp($kode);
        if($cek->num_rows()<1){
            $info=array(
                'kode_anak_asuh'=>$this->input->post('kode'),
                'keperluan'=>$this->input->post('judul'),
                'jumlah'=>$this->input->post('jumlah'),
                'ref_kwitansi'=>$this->input->post('ref_kwitansi'),
                'tgl_bayar'=>$this->input->post('tgl_bayar'),
                'kategori'=>$this->input->post('pengarang')
            );
            $this->m_v2->simpanTmp($info);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_v2->hapusTmp($kode);
    }

    
}
