<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	/*public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('welcome');
		
	}
}*/
session_start(); //Memanggil fungsi session Codeigniter
    class welcome extends CI_Controller { 
        function __construct() {
            parent::__construct();
        }
    
        function index() {
            if($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['nama_pengurus'] = $session_data['nama_pengurus'];
                $data['kode_pengurus'] = $session_data['kode_pengurus'];
                $this->load->view('welcome', $data);
            }
            else {
                //Jika tidak ada session di kembalikan ke halaman login
                redirect('login', 'refresh');
            }
        }
    
        function logout() {
            $this->session->unset_userdata('logged_in');
            session_destroy();
            redirect('welcome', 'refresh');
        } 
        }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */