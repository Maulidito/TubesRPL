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

        public function tambahDataTiket(){
            $tiket = [
                "id_tiket" => $this->input->post("id_tiket"),
                "id_bis" => $this->input->post("id_bis"),
                "kota_asal" => $this->input->post("kota_asal"),
                "kota_tujuan" => $this->input->post("kota_tujuan"),
                "jam_keberangkatan" => $this->input->post("jam_keberangkatan"),
                "harga" => $this->input->post("harga")
            ];

            return $this->db->insert("tiket",$tiket);
        }

        public function mengubahDataTiket($idTiket){
            $tiket = [
                "id_bis" => $this->input->post("id_bis"),
                "kota_asal" => $this->input->post("kota_asal"),
                "kota_tujuan" => $this->input->post("kota_tujuan"),
                "jam_keberangkatan" => $this->input->post("jam_keberangkatan"),
                "harga" => $this->input->post("harga")
            ];

            $this->db->set($tiket);
            $this->db->where('id_tiket', $idTiket);
            return $this->db->update('tiket');
        }
        
        public function menghapusDataTiket($idTiket){
            return $this->db->delete("tiket",array("id_tiket" => $idTiket));
        }

        public function tambahDataPesanan(){
            $pesanan = [
                "id_pesanan" => $this->input->post("id_pesanan"),
                "nama_pemesan" => $this->input->post("nama_pemesan"),
                "no_telp" => $this->input->post("no_telp"),
                "email" => $this->input->post("email"),
                "jumlah_penumpang" => $this->input->post("jumlah_penumpang")
            ];

            $detail_pesanan = [
                "id_pesanan" => $this->input->post("id_pesanan"),
                "id_tiket" => $this->input->post("id_tiket"),
                "total_biaya" => $this->input->post("total_biaya"),
                "tgl_pemesanan" => $this->input->post("tgl_pemesanan")
            ];

            return $this->db->insert("pesanan",$pesanan) && $this->db->insert("detail_pesanan",$detail_pesanan);
        }

        public function menghapusDataPesanan($idPesanan){
            if ($this->db->delete("detail_pesanan",array("id_pesanan" => $idPesanan)) && $this->db->delete("pembayaran",array("id_pesanan" => $idPesanan))){
                if ($this->db->delete("pesanan",array("id_pesanan" => $idPesanan))){
                    return true;
                }
            }else{
                return false;
            }
                        
        }

        public function mengubahDataPesanan($idPesanan){
            $pesanan = [
                "id_pesanan" => $this->input->post("id_pesanan"),
                "nama_pemesan" => $this->input->post("nama_pemesan"),
                "no_telp" => $this->input->post("no_telp"),
                "email" => $this->input->post("email"),
                "jumlah_penumpang" => $this->input->post("jumlah_penumpang")
            ];

            $this->db->set($pesanan);
            $this->db->where('id_pesanan', $idPesanan);
            return $this->db->update('pesanan');
        }

        public function mengubahDetailPesanan($idPesanan){
            $detail_pesanan = [
                "id_pesanan" => $this->input->post("id_pesanan"),
                "id_tiket" => $this->input->post("id_tiket"),
                "total_biaya" => $this->input->post("total_biaya"),
                "tgl_pemesanan" => $this->input->post("tgl_pemesanan")
            ];

            $this->db->set($detail_pesanan);
            $this->db->where('id_pesanan', $idPesanan);
            return $this->db->update('detail_pesanan');
        }

        public function getDataPesanan(){
            // menetapkan query mysql untuk mengambil seluruh data tiket dari tabel tiket
            $query = $this->db->get("pesanan");
            // mengembalikkan semua data dari query yang telah dijalankan
            return $query->result_array();
        }
        
        public function getDetailPesanan($id_pesanan){
            // menetapkan query mysql untuk mengambil seluruh data tiket dari tabel tiket
            $query = $this->db->get_where("detail_pesanan",array("id_pesanan" => $id_pesanan));
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