<?php

    Class Main_Model extends CI_Model{
        
        public function getKotaAsal(){
            $this->db->select("kota_asal");
            $this->db->distinct("kota_asal");
            $this->db->from("tiket");

            return $this->db->get()->result_array();
        }
    
        public function getKotaTujuan($asal){
            $this->db->distinct("kota_tujuan");
            $this->db->from("tiket");
            $this->db->select("kota_tujuan");
            $this->db->where("kota_asal",$asal);

            return $this->db->get()->result_array();
        }

        public function cariTiket($asal,$tujuan){
            $this->db->from("tiket");
            $this->db->where("kota_asal",$asal);
            $this->db->where("kota_tujuan",$tujuan);

            return $this->db->get()->result_array();
        }
    }