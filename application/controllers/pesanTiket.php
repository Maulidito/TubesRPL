<?php
    class pesanTiket extends CI_Controller{
        public function __construct()
        {
                parent::__construct();
                $this->load->model("Main_Model");
                $this->load->library("form_validation");
                $this->load->helper("Custom");
        }

        public function index(){
            if($this->session->userdata("id_pesanan") != null){
                redirect("pesanTiket/pembayaran");
            }else{
                // mengambil data kota asal dengan menggunakan model Main_model lalu menyimpan di variabel $data[kotaAsal]
                $data["kotaAsal"] = $this->Main_Model->getKotaAsal();
    
                // Membuat aturan untuk library form validation untuk form mencari tiket
                $this->form_validation->set_error_delimiters('<p class="formError">', '</p>');
                $this->form_validation->set_rules("tanggal","Tanggal","required", array("required" => "Tanggal tidak boleh kosong!"));
                $this->form_validation->set_rules("kotaAsal","Kota Asal","required", array("required" => "Kota Asal tidak boleh kosong!"));
                $this->form_validation->set_rules("kotaTujuan","Kota Tujuan","required", array("required" => "Kota Tujuan tidak boleh kosong!"));
                $this->form_validation->set_rules("jmlPenumpang","Jumlah Penumpang","required", array("required" => "Jumlah Penumpang tidak boleh kosong!"));
                // kondisi untuk mengecek apakah form validation aktif atau tidak(jika aktif, maka proses form tidak dijalankan)
                if(!$this->form_validation->run()){
                    // jika aktif, maka proses form tidak akan dijalankan, dan dikembalikan ke halaman form cari tiket
                    $this->load->view("templates/header");
                    $this->load->view("pengguna/home",$data);
                    $this->load->view("templates/footer");
                }else{
                    // jika tidak aktif, maka proses form dijalankan dan data yang sudah diinput di form dimasukkan kedalam variabel dengan menggunakan method post
                    $tanggal = $this->input->post("tanggal");
                    $asal = $this->input->post("kotaAsal");
                    $tujuan = $this->input->post("kotaTujuan");
                    $penumpang = $this->input->post("jmlPenumpang");
                    // variabel diatas lalu dijadikan parameter melalui url yang akan digunakan oleh method hasil pencarian.
                    redirect("pesanTiket/hasilPencarian/$tanggal/$asal/$tujuan/$penumpang");
                }
            }
        }

        public function hasilPencarian($tanggal,$asal,$tujuan,$penumpang){
            // array yang digunakan untuk menyimpan keyword pencarian yang diambil dari url.
            $data['keyPencarian'] = [
                "tanggal" => $tanggal,
                "kotaAsal" => $asal,
                "kotaTujuan" => $tujuan,
                "penumpang" => $penumpang
            ];
            // mengambil data dari tabel tiket sesuai dengan parameter hasil pencarian
            $data["hasilPencarian"] = $this->Main_Model->cariTiket($asal,$tujuan);

            // digunakan untuk memuat halaman hasil pencarian dan mengoper variabel bernama data agar isi dari variabel tersebut dapat digunakan di halaman hasil pencarian
            $this->load->view("templates/header");
            $this->load->view("pengguna/hasilPencarian",$data);
            $this->load->view("templates/footer");
        }

        public function formPemesanan($idTiket,$tanggal,$penumpang){
            $data['keyPencarian'] = [
                "tanggal" => $tanggal,
                "penumpang" => $penumpang
            ];
            $data["tiket"] = $this->Main_Model->getTiketById($idTiket);

            $this->form_validation->set_error_delimiters('<p class="formError">', '</p>');

            $this->form_validation->set_rules("nama","Nama","required", array("required" => "Nama tidak boleh kosong!"));
            $this->form_validation->set_rules("noTelp","No Telepon","required|numeric", array("required" => "No Telepon tidak boleh kosong!","numeric" => "No Telepon tidak boleh terdapat huruf/karakter"));
            $this->form_validation->set_rules("email","Email","required", array("required" => "Email tidak boleh kosong!"));

            if(!$this->form_validation->run()){
                $this->load->view("templates/header");
                $this->load->view("pengguna/formPemesanan",$data);
                $this->load->view("templates/footer");
            }else{
                // menginput pesanan ke database
                $pesanan = $this->Main_Model->pesanTiket(); 
                if($pesanan != false){
                    $this->session->set_userdata("id_pesanan",$pesanan);
                    redirect("pesanTiket/pembayaran");
                }
            }
            
        }
        
        public function pembayaran(){
            $data["tiket"] = $this->Main_Model->getPesanan($this->session->userdata("id_pesanan")); 
            
            $this->load->view("templates/header");
            $this->load->view("pengguna/pembayaran",$data);
            $this->load->view("templates/footer");
        }
        
        public function konfirmasiPembayaran(){
            if($this->Main_Model->konfirmasiPembayaran($this->session->userdata("id_pesanan"))){
                $this->session->set_userdata("konfirmasiPembayaran",true);
                redirect("pesanTiket/pembayaran");
            }else{

            }

        }

        public function batalPembayaran($idPesanan){
            if($this->Main_Model->batalPembayaran($idPesanan)){
                $this->session->unset_userdata("pesanan");
                redirect("pesanTiket/index");
            }
        }

        public function getTujuan(){
            $asal = $this->input->get("asal");
            $data = $this->Main_Model->getKotaTujuan($asal);
            echo json_encode($data);
        }
    }
?>