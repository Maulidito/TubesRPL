<?php
    class pesanTiket extends CI_Controller{
        public function __construct()
        {
                parent::__construct();
                $this->load->model("Main_Model");
                $this->load->library("form_validation");
        }

        public function index(){
            $data["kotaAsal"] = $this->Main_Model->getKotaAsal();

            $this->form_validation->set_error_delimiters('<p class="formError">', '</p>');

            // aturan form validation
            $this->form_validation->set_rules("tanggal","Tanggal","required", array("required" => "Tanggal tidak boleh kosong!"));
            $this->form_validation->set_rules("kotaAsal","Kota Asal","required", array("required" => "Kota Asal tidak boleh kosong!"));
            $this->form_validation->set_rules("kotaTujuan","Kota Tujuan","required", array("required" => "Kota Tujuan tidak boleh kosong!"));
            $this->form_validation->set_rules("jmlPenumpang","Jumlah Penumpang","required", array("required" => "Jumlah Penumpang tidak boleh kosong!"));

            if(!$this->form_validation->run()){
                $this->load->view("templates/header");
                $this->load->view("pengguna/home",$data);
                $this->load->view("templates/footer");
            }else{
                $tanggal = $this->input->post("tanggal");
                $asal = $this->input->post("kotaAsal");
                $tujuan = $this->input->post("kotaTujuan");
                $penumpang = $this->input->post("jmlPenumpang");

                redirect("pesanTiket/hasilPencarian/$tanggal/$asal/$tujuan/$penumpang");
            }

        }

        public function hasilPencarian($tanggal,$asal,$tujuan,$penumpang){
            $data['parameter'] = [$tanggal,$asal,$tujuan,$penumpang];
            $data["hasilPencarian"] = $this->Main_Model->cariTiket($asal,$tujuan);

            $this->load->view("templates/header");
            $this->load->view("pengguna/hasilPencarian",$data);
            $this->load->view("templates/footer");
        }

        public function getTujuan(){
            $asal = $this->input->get("asal");
            $data = $this->Main_Model->getKotaTujuan($asal);
            echo json_encode($data);
        }
    }
?>