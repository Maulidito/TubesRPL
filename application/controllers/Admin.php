<?php
    Class Admin extends CI_Controller{
        public function index(){
            $this->load->view("templates/header");
            $this->load->view("Admin/home");
            $this->load->view("templates/footer");
        }

        public function tambahDataTiket(){
            if($this->Admin_model->tambahDataTiket()){
                $this->session->set_flashdata("succNotice","Data Tiket Berhasil Ditambahkan!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function mengubahDataTiket($idTiket){
            if($this->Admin_model->mengubahDataTiket($idTiket)){
                $this->session->set_flashdata("succNotice","Data Tiket Berhasil Diubah");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function menghapusDataTiket($idTiket){
            if($this->Admin_model->menghapusDataTiket($idTiket)){
                $this->session->set_flashdata("succNotice","Data Tiket Berhasil Dihapus");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function tambahDataPesanan(){
            if($this->Admin_model->tambahDataPesanan()){
                $this->session->set_flashdata("succNotice","Data Pesanan Berhasil Ditambahkan!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function mengubahDataPesanan($idPesanan){
            if($this->Admin_model->mengubahDataPesanan($idPesanan)){
                $this->session->set_flashdata("succNotice","Data Pesanan Berhasil Diubah!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function menghapusDataPesanan($idPesanan){
            if($this->Admin_model->menghapusDataPesanan($idPesanan)){
                $this->session->set_flashdata("succNotice","Data Pesanan Berhasil Ditambahkan!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function tambahDataKursi(){
            if($this->Admin_model->tambahDataKursi()){
                $this->session->set_flashdata("succNotice","Data Kursi Berhasil Ditambahkan!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function mengubahDataKursi($idKursi){
            if($this->Admin_model->mengubahDataKursi($idKursi)){
                $this->session->set_flashdata("succNotice","Data Kursi Berhasil Diubah!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function menghapusDataKursi($idKursi){
            if($this->Admin_model->menghapusDataKursi($idKursi)){
                $this->session->set_flashdata("succNotice","Data Kursi Berhasil Dihapus!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function tambahDataBis(){
            if($this->Admin_model->tambahDataTiket()){
                $this->session->set_flashdata("succNotice","Data Bis Berhasil Ditambahkan!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function mengubahDataBis($idBis){
            if($this->Admin_model->mengubahDataBis($idBis)){
                $this->session->set_flashdata("succNotice","Data Bis Berhasil Diubah!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

        public function menghapusDataBis($idBis){
            if($this->Admin_model->menghapusDataBis($idBis)){
                $this->session->set_flashdata("succNotice","Data Bis Berhasil Dihapus!");
                redirect("Admin/index");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/index");
            }
        }

    }
?>