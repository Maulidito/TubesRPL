<?php

    Class Main_Model extends CI_Model{
        
        // fungsi yang digunakan untuk mengambil kota asal dari tabel tiket
        public function getKotaAsal(){
            // query untuk menentukan kolom yang diambil adalah kolom kota_asal
            $this->db->select("kota_asal");
            // query untuk menghilangkan hasil kota_asal yang duplikat 
            $this->db->distinct("kota_asal");
            // query untuk menentukan tabel yang digunakan adalah tabel tiket
            $this->db->from("tiket");

            // mengembalikkan hasil semua data dari query diatas
            return $this->db->get()->result_array();
        }
    
        // fungsi yang digunakan untuk mengambil kota tujuan dari tabel tiket dengan parameter kota asal
        public function getKotaTujuan($asal){
            // query untuk menghilangkan hasil kota_tujuan yang duplikat 
            $this->db->distinct("kota_tujuan");
            // query untuk menentukan tabel yang digunakan adalah tabel tiket
            $this->db->from("tiket");
            // query untuk menentukan kolom yang diambil adalah kolom kota_tujuan
            $this->db->select("kota_tujuan");
            // query untuk menetapkan bahwa data yang diambil adalah data yang memiliki kota asal sesuai dengan parameter yang ditentukan.
            $this->db->where("kota_asal",$asal);

            // mengembalikkan hasil semua data dari query diatas
            return $this->db->get()->result_array();
        }

        // fungsi yang digunakan untuk mencari tiket sesuai dengan parameter kota asal dan kota tujuan
        public function cariTiket($asal,$tujuan){
            // query untuk menentukan tabel yang digunakan adalah tabel tiket
            $this->db->from("tiket");
            // query untuk menetapkan bahwa data yang diambil adalah data yang memiliki kota asal sesuai dengan parameter yang ditentukan.
            $this->db->where("kota_asal",$asal);
            // query untuk menetapkan bahwa data yang diambil adalah data yang memiliki kota tujuan sesuai dengan parameter yang ditentukan.
            $this->db->where("kota_tujuan",$tujuan);

            // mengembalikkan hasil semua data dari query diatas
            return $this->db->get()->result_array();
        }

        public function getTiketById($idTiket){
            return $this->db->get_where("tiket",array("id_tiket" => $idTiket))->row_array();
        }

        public function pesanTiket(){
            $idPesanan = "PS".$this->countTableRow("pesanan")+1;
            $pesanan = [
                'id_pesanan' => $idPesanan,
                'nama_pemesan' => $this->input->post("nama"),
                'no_telp' => $this->input->post("noTelp"),
                'email' => $this->input->post("email"),
                'jumlah_penumpang' => $this->input->post("jmlPenumpang")
            ];

            $detail = [
                'id_pesanan' => $idPesanan,
                'id_tiket' => $this->input->post("idTiket"),
                'total_biaya' => $this->input->post("total")
            ];

            if($this->db->insert("pesanan",$pesanan)){
                if($this->db->insert("detail_pesanan",$detail)){
                    return $idPesanan;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function getPesanan($id_pesanan){
            $query = $this->db->query("SELECT tiket.*,detail_pesanan.*,pesanan.* FROM tiket JOIN detail_pesanan ON tiket.id_tiket=detail_pesanan.id_tiket JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE pesanan.id_pesanan = '$id_pesanan'");

            return $query->row_array();
        }

        public function konfirmasiPembayaran($idPesanan){
            $idPembayaran = "PB".$this->countTableRow("pembayaran")+1;
            $data = [
                "id_pembayaran" => $idPembayaran,
                "id_pesanan" => $idPesanan,
                "nama_pengirim" => $this->input->post("nama_pengirim"),
                "nomor_rekening" => $this->input->post("no_rekening"),
                "total_pembayaran" => $this->input->post("total_pembayaran"),
                "tgl_pembayaran" => $this->input->post("tanggal"),
                "status_pembayaran" => "Menunggu Konfirmasi Admin"
            ];

            return $this->db->insert("pembayaran",$data);
        }

        public function batalPembayaran($idPesanan){
            if($this->db->delete('detail_pesanan',['id_pesanan' => $idPesanan])){
                if($this->db->delete('pesanan',['id_pesanan' => $idPesanan])){
                    return true;
                }else{
                    return false;
                }
            }
            return false;
        }

        public function countTableRow($table){
            $query = $this->db->get($table);

            return $query->num_rows();
        }

    }