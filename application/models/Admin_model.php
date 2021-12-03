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
        
        public function menghapusDataTiket($idTiket,$idPesanan){

            if($idPesanan != null){
                $this->db->delete("pembayaran",array("id_pesanan" => $idPesanan));
                $this->db->delete("detail_pesanan",array("id_tiket" => $idTiket));
                // menghapus id pesanan karena id pesanan bisa lebih dari 1 ,jadi harus dilakukan looping
                foreach($idPesanan as $row){
                    $this->db->delete('pesanan',array("id_pesanan" => $row['id_pesanan']));
                }
                return $this->db->delete("tiket",array("id_tiket" => $idTiket));
            }
            
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

        public function getPesananByIdTiket($idTiket){
            $this->db->select("id_pesanan");
            $query = $this->db->get_where('detail_pesanan',array("id_tiket" => $idTiket));
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
            if($idBis == null){
                return false;
            }else{
                $query = $this->db->get_where("kursi",array("id_bis"=>$idBis));
                return $query->result_array();
            }
        }

        public function tambahDataBis(){
            $bis = [
                "id_bis" => $this->input->post("id_bis"),
                "jumlah_kursi" => $this->input->post("jumlah_kursi"),
            ];
            return $this->db->insert("bis",$bis) ;
        }

    public function mengubahDataBis($idBis){
        $bis = [
          
            "jumlah_kursi" => $this->input->post("jumlah_kursi"),
        ];
        $this->db->set($bis);
        $this->db->where('id_bis', $idBis);
        return $this->db->update('bis');
    }

    public function menghapusDataBis($idBis){
        if($this->db->get_where("tiket",array("id_bis" => $idBis))){
            $this->db->set('id_bis', 'NULL');
            $this->db->where('id_bis', $idBis);
            $this->db->update('tiket');
        }

        if($this->db->get_where("kursi",array("id_bis" => $idBis))->result_array()){
            $this->db->delete("kursi",array("id_bis" => $idBis));
        }

        return $this->db->delete("bis",array("id_bis" => $idBis));   
    }

    public function tambahDataKursi(){
        $kursi = [
            "nomor_kursi" => $this->input->post("nomor_kursi"),
            "id_bis" => $this->input->post("id_bis"),
        ];
        return $this->db->insert("kursi",$kursi) ;
    }

public function mengubahDataKursi($idKursi){
    $kursi = [
        "nomor_kursi" => $this->input->post("nomor_kursi")
    ];
    
    $this->db->set($kursi);
    $this->db->where('nomor_kursi', $idKursi);
    return $this->db->update('kursi');
}

public function menghapusDataKursi($nomor_kursi){
    if($this->db->delete("kursi",array("nomor_kursi" => $nomor_kursi))) {
        
            return true;
        
    }else{
        return false;
    }              
}
public function getDataPembayaran(){
    // menetapkan query mysql untuk mengambil seluruh data tiket dari tabel tiket
    $query = $this->db->get("pembayaran");
    // mengembalikkan semua data dari query yang telah dijalankan
    return $query->result_array();
}
public function tambahDataPembayaran(){
    $pembayaran = [
        "id_pembayaran" => $this->input->post("id_pembayaran"),
        "id_pesanan" => $this->input->post("id_pesanan"),
        "nama_pengirim" => $this->input->post("nama_pengirim"),
        "nomor_rekening" => $this->input->post("nomor_rekening"),
        "total_pembayaran" => $this->input->post("total_pembayaran"),
        "tgl_pembayaran" => $this->input->post("tgl_pembayaran"),
        "status_pembayaran" => $this->input->post("status_pembayaran")
    ];

    return $this->db->insert("pembayaran",$pembayaran);
}
public function mengubahDataPembayaran($idPembayaran){
    $pembayaran = [
        "id_pesanan" => $this->input->post("id_pesanan"),
        "nama_pengirim" => $this->input->post("nama_pengirim"),
        "nomor_rekening" => $this->input->post("nomor_rekening"),
        "total_pembayaran" => $this->input->post("total_pembayaran"),
        "tgl_pembayaran" => $this->input->post("tgl_pembayaran"),
        "status_pembayaran" => $this->input->post("status_pembayaran")
    ];

    $this->db->set($pembayaran);
    $this->db->where('id_pembayaran', $idPembayaran);
    return $this->db->update('pembayaran');
}
}
?>