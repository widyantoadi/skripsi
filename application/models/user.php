<?php 
Class User extends CI_Model {
        function login($username, $password) {
            $this -> db -> select('username, password,kode_pengurus,nama_pengurus,jabatan,pekerjaan,alamat,jenis_kelamin'); 
            $this -> db -> from('pengurus'); //nama tabel pada database
            $this -> db -> where('username', $username);
            $this -> db -> where('password', $password);
            $this -> db -> limit(1); //menandakan data ditemukan atau sama dengan satu
            $query = $this -> db -> get();

            if($query -> num_rows() == 1) {
                return $query->result();
            }
            else {
                return false;
            }
        }
    }
    ?> 