<?php
    Class Admin extends CI_Controller{
        public function __construct()
        {
                parent::__construct();
                $this->load->model("Admin_model");
                $this->load->library("form_validation");
                $this->load->helper("Custom");
        }

        // index = tiket
        public function index(){
            // kondisi untuk mengecek apakah user sudah login atau belum
            if($this->session->userdata("login")){
                // mengambil data tiket dari database melalui model Admin_model dan menyimpan di array bernama data[tiket]
                $data["tiket"] = $this->Admin_model->getDataTiket();
                $data["bis"] = $this->Admin_model->getDataBis();

                // fungsi untuk menampilkan header/navbar dari folder templates
                $this->load->view("templates/headerAdmin");
                // fungsi untuk menampilkan halaman tiket dari folder admin, dan mengoper array bernama data agar data dapat dipanggil di halaman tiket
                $this->load->view("Admin/tiket",$data);
                // fungsi untuk menampilkan header/navbar dari folder templates
                $this->load->view("templates/footer");
            }else{
                // mengarahkan ke halaman login jika admin belum melakukan login.
                redirect("Admin/login");
            }
        }

        public function tambahDataTiket(){
            if($this->session->userdata("login")){
                if($this->Admin_model->tambahDataTiket()){
                    $this->session->set_flashdata("succNotice","Data Tiket Berhasil Ditambahkan!");
                    redirect("Admin/index");
                }else{
                    $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                    redirect("Admin/index");
                }
            }else{
                redirect("Admin/login");
            }
        }

        public function mengubahDataTiket(){
            if($this->session->userdata("login")){  
                $idTiket = $this->input->post("id_tiket");
                if($this->Admin_model->mengubahDataTiket($idTiket)){
                    $this->session->set_flashdata("succNotice","Data Tiket Berhasil Diubah");
                    redirect("Admin/index");
                }else{
                    $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                    redirect("Admin/index");
                }
            }else{
                redirect("Admin/login");
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

        public function login(){
            // kondisi untuk mengecek apakah user sudah login atau belum
            if(!$this->session->userdata("login")){
                // Membuat aturan untuk library form validation untuk form login
                $this->form_validation->set_error_delimiters('<p class="formError">', '</p>');
                $this->form_validation->set_rules("username","Username","required", array("required" => "Username tidak boleh kosong !"));
                $this->form_validation->set_rules("password","Username","required", array("required" => "Password tidak boleh kosong !"));

                // kondisi untuk mengecek apakah form validation aktif atau tidak(jika aktif, maka proses form tidak dijalankan)
                if(!$this->form_validation->run()){
                    // fungsi untuk menampilkan view login dari folder Admin
                    $this->load->view("Admin/login");
                }else{
                    // Mengambil data username dan password yang sudah diinputkan di form menggunakan method post
                    $username = $this->input->post("username");
                    $password = $this->input->post("password");
                    
                    // mengecek apakah username dan password ada di database menggunakan fungsi login check dari model Admin_model
                    $userdata = $this->Admin_model->loginCheck($username, $password);
                    // jika data username dan password ada di database, maka admin akan diarahkan ke halaman index admin
                    if($userdata){
                        //  menetapkan session bernama admin yang menyimpan nama admin, dan session bernama login yang digunakan untuk memberi tahu bahwa admin sedang login
                        $this->session->set_userdata("admin",$userdata["nama"]);
                        $this->session->set_userdata("login",true);
                        // mengarahkan ke halaman index admin
                        redirect("Admin/index");
                    }else{
                        // mengarahkan ke halaman login jika login gagal.
                        redirect("Admin/login");
                    }
                }
            }else{
                // mengarahkan ke halaman index admin jika terdeteksi bahwa admin sudah login
                redirect("Admin/index");
            }
        }

        public function logout(){
            // array untuk menentukan userdata yang akan dihapus/destroy
            $userdata = ["admin","login"];

            // fungsi codeigniter untuk menghapus userdata
            $this->session->unset_userdata($userdata);
            // mengarahkan ke halaman login
            redirect("Admin/login");
        }

        public function tambahDataPesanan(){
            if($this->session->userdata("login")){
                if($this->Admin_model->tambahDataPesanan()){
                    $this->session->set_flashdata("succNotice","Data Pesanan Berhasil Ditambahkan!");
                    redirect("Admin/pesanan");
                }else{
                    $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                    redirect("Admin/pesanan");
                }
            }else{
                redirect("Admin/login");
            }
        }

        public function menghapusDataPesanan($idPesanan){
            if($this->Admin_model->menghapusDataPesanan($idPesanan)){
                $this->session->set_flashdata("succNotice","Data Pesanan Berhasil Dihapus");
                redirect("Admin/pesanan");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/pesanan");
            }
        }

        public function mengubahDataPesanan(){
            if($this->session->userdata("login")){  
                $idPesanan = $this->input->post("id_pesanan");
                if($this->Admin_model->mengubahDataPesanan($idPesanan)){
                    $this->session->set_flashdata("succNotice","Data Pesanan Berhasil Diubah");
                    redirect("Admin/pesanan");
                }else{
                    $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                    redirect("Admin/pesanan");
                }
            }else{
                redirect("Admin/login");
            }
        }

     

   
  

      

        public function pesanan(){
            // kondisi untuk mengecek apakah user sudah login atau belum
            if($this->session->userdata("login")){
                // mengambil data tiket dari database melalui model Admin_model dan menyimpan di array bernama data[tiket]
                $data["pesanan"] = $this->Admin_model->getDataPesanan();
                $data["tiket"] = $this->Admin_model->getDataTiket();
                 // fungsi untuk menampilkan header/navbar dari folder templates
                 $this->load->view("templates/headerAdmin");
                 // fungsi untuk menampilkan halaman tiket dari folder admin, dan mengoper array bernama data agar data dapat dipanggil di halaman tiket
                 $this->load->view("Admin/pesanan",$data);
                 // fungsi untuk menampilkan header/navbar dari folder templates
                 $this->load->view("templates/footer");
                }else{
                    // mengarahkan ke halaman login jika admin belum melakukan login.
                    redirect("Admin/login");
                }

        }
        public function bis(){
            if($this->session->userdata("login")){
                // mengambil data tiket dari database melalui model Admin_model dan menyimpan di array bernama data[tiket]
                $data["bis"] = $this->Admin_model->getDataBis();

                // fungsi untuk menampilkan header/navbar dari folder templates
                $this->load->view("templates/headerAdmin");
                // fungsi untuk menampilkan halaman tiket dari folder admin, dan mengoper array bernama data agar data dapat dipanggil di halaman tiket
                
                $this->load->view("Admin/bis",$data);
                // fungsi untuk menampilkan header/navbar dari folder templates
                $this->load->view("templates/footer");
            }else{
                // mengarahkan ke halaman login jika admin belum melakukan login.
                redirect("Admin/login");
            }
        }

        public function detail_pesanan($id_pesanan){
            // kondisi untuk mengecek apakah user sudah login atau belum
            if($this->session->userdata("login")){
                // mengambil data tiket dari database melalui model Admin_model dan menyimpan di array bernama data[tiket]
                $data["detail_pesanan"] = $this->Admin_model->getDetailPesanan($id_pesanan);
                // fungsi untuk menampilkan header/navbar dari folder templates
                $this->load->view("templates/headerAdmin");
                // fungsi untuk menampilkan halaman tiket dari folder admin, dan mengoper array bernama data agar data dapat dipanggil di halaman tiket
                $this->load->view("Admin/detail_pesanan",$data);
                // fungsi untuk menampilkan header/navbar dari folder templates
                $this->load->view("templates/footer");
            }else{
                // mengarahkan ke halaman login jika admin belum melakukan login.
                redirect("Admin/login");
            }

        }
        
        public function mengubahDetailPesanan(){
            if($this->session->userdata("login")){  
                $idPesanan = $this->input->post("id_pesanan");
                if($this->Admin_model->mengubahDetailPesanan($idPesanan)){
                    $this->session->set_flashdata("succNotice","Detail Pesanan Berhasil Diubah");
                    redirect("Admin/detail_pesanan/$id_pesanan");
                }else{
                    $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                    redirect("Admin/detail_pesanan/$id_pesanan");
                }
            }else{
                redirect("Admin/login");
            }
        }

        public function kursi($idBis){
              // kondisi untuk mengecek apakah user sudah login atau belum
              if($this->session->userdata("login")){
                // mengambil data tiket dari database melalui model Admin_model dan menyimpan di array bernama data[tiket]
                $data["kursi"] = $this->Admin_model->getDataKursi($idBis);

                // fungsi untuk menampilkan header/navbar dari folder templates
                $this->load->view("templates/headerAdmin");
                // fungsi untuk menampilkan halaman tiket dari folder admin, dan mengoper array bernama data agar data dapat dipanggil di halaman tiket
                $this->load->view("Admin/kursi",$data);
                // fungsi untuk menampilkan header/navbar dari folder templates
                $this->load->view("templates/footer");
            }else{
                // mengarahkan ke halaman login jika admin belum melakukan login.
                redirect("Admin/login");
            }

        }
        
        public function tambahDataBis(){
            if($this->session->userdata("login")){
                if($this->Admin_model->tambahDataBis()){
                    $this->session->set_flashdata("succNotice","Data Bis Berhasil Ditambahkan!");
                    redirect("Admin/bis");
                }else{
                    $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                    redirect("Admin/bis");
                }
            }else{
                redirect("Admin/login");
            }
        }    
        
        public function mengubahDataBis(){
            if($this->session->userdata("login")){  
                $idBis = $this->input->post("id_bis");
                if($this->Admin_model->mengubahDataBis($idBis)){
                    $this->session->set_flashdata("succNotice","Data Bis Berhasil Diubah");
                    redirect("Admin/bis");
                }else{
                    $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                    redirect("Admin/bis");
                }
            }else{
                redirect("Admin/login");
            }
        }
    

    public function menghapusDataBis($idBis){
        if($this->Admin_model->menghapusDataBis($idBis)){
            $this->session->set_flashdata("succNotice","Data Bis Berhasil Dihapus");
            redirect("Admin/bis");
        }else{
            $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
            redirect("Admin/bis");
        }
    }


    public function tambahDataKursi(){
        if($this->session->userdata("login")){
            if($this->Admin_model->tambahDataKursi()){
                $this->session->set_flashdata("succNotice","Data Kursi Berhasil Ditambahkan!");
                redirect("Admin/kursi");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/kursi");
            }
        }else{
            redirect("Admin/login");
        }
    }    
    
    public function mengubahDataKursi(){
        if($this->session->userdata("login")){  
            $idKursi = $this->input->post("id_kursi");
            if($this->Admin_model->mengubahDataBis($idKursi)){
                $this->session->set_flashdata("succNotice","Data Kursi Berhasil Diubah");
                redirect("Admin/kursi");
            }else{
                $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
                redirect("Admin/kursi");
            }
        }else{
            redirect("Admin/login");
        }
    }


public function menghapusDataKursi($idKursi){
    if($this->Admin_model->menghapusDataBis($idKursi)){
        $this->session->set_flashdata("succNotice","Data Kursi Berhasil Dihapus");
        redirect("Admin/Kursi");
    }else{
        $this->session->set_flashdata("errNotice","Maaf, Terjadi Error di database");
        redirect("Admin/Kursi");
    }
}
    

    }
?>