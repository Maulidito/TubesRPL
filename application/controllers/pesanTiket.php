<?php
    class pesanTiket extends CI_Controller{
        public function index(){
            $this->load->view("templates/header");
            $this->load->view("pengguna/home");
            $this->load->view("templates/footer");
        }
    }
?>