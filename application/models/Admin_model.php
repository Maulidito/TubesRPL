<?php
    Class Admin_model extends CI_Model{
        // fungsi yang digunakan untuk mengecek apakah username dan password ada di database atau tidak
        public function loginCheck($user,$pass){
            // menetapkan query mysql untuk mengambil data dari tabel admin, dengan kondisi username dan password yang telah ditentukan
            $query = $this->db->get_where("admin",array("username" => $user,"password" => $pass));
            // mengembalikkan data baris dari query yang telah dijalankan
            return $query->row_array();
        }

        // untuk mengambil data tiket dari database
        public function getDataTiket(){
            // menetapkan query mysql untuk mengambil seluruh data tiket dari tabel tiket
            $query = $this->db->get("tiket");
            // mengembalikkan semua data dari query yang telah dijalankan
            return $query->result_array();
        }

        public function getDataBis(){
            $query = $this->db->get("bis");
            return $query->result_array();
        }

        public function getDataKursi($idBis){
            $query = $this->db->get_where("kursi",array("id_bis"=>$idBis));
            
            return $query->result_array();
        }
    }
?>