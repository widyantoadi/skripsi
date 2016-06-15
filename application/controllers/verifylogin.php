<?php if ( ! defined('BASEPATH')) exit('No direct scripta access allowed');
    class VerifyLogin extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('user','',TRUE); //nantinya diteruskan di user.php pada folder models
        }
    function index() {
        //Aksi untuk melakukan validasi
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE) {
            //Jika validasi gagal user akan diarahkan kembali ke halaman login
            $this->load->view('login_view');
        }
        else {
            //Jika berhasil user akan di arahkan ke private area
            redirect('welcome', 'refresh');
        }
    }

    function check_database($password) {
        //validasi field terhadap database
        $username = $this->input->post('username');
        //query ke database
        $result = $this->user->login($username, $password);
    
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                $sess_array = array(
                'username' => $row->username,
                'password' => $row->password,
                'kode_pengurus' => $row->kode_pengurus,
                'nama_pengurus' => $row->nama_pengurus,
                'jabatan' => $row->jabatan,
                'pekerjaan' => $row->pekerjaan,
                'alamat' => $row->alamat,
                'jenis_kelamin' => $row->jenis_kelamin,
                //'jabatan' => $row->jabatan,
                );
            $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
       }
       else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
       }
    }
    }
    ?>