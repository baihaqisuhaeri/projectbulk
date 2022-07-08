<?php

class Input_model extends CI_Model{
    
    function get_k_cus($jenis_produk,$unit,$tipe_cus){
        
        date_default_timezone_set('Asia/Jakarta');
        
        if($jenis_produk == "ASPAL"){
            $jp = "AS";
        }else if($jenis_produk == "TABUNG"){
            $jp = "TB";
        }else if($jenis_produk == "BULK"){
            $jp = "BL";
        }else if($jenis_produk == "ALAT BERAT"){
            $jp = "AB";
        }else if($jenis_produk == "SPPBE"){
            $jp = "SB";
        }
        
        if($tipe_cus == "-"){
            
            $no_kcus = $jp.$unit;
            $cek_no = $this->db->query("select * from customer where k_Cus like '$no_kcus%' order by id desc")->row();

            if(!empty($cek_no->k_Cus)){
                $no = (substr($cek_no->k_Cus, 5)) + 1;

                if(strlen($no) == 10){
                    return $no_kcus.$no;
                }else if(strlen($no) == 9){
                    return $no_kcus."0".$no;
                }else if(strlen($no) == 8){
                    return $no_kcus."00".$no;
                }else if(strlen($no) == 7){
                    return $no_kcus."000".$no;
                }else if(strlen($no) == 6){
                    return $no_kcus."0000".$no;
                }else if(strlen($no) == 5){
                    return $no_kcus."00000".$no;
                }else if(strlen($no) == 4){
                    return $no_kcus."000000".$no;
                }else if(strlen($no) == 3){
                    return $no_kcus."0000000".$no;
                }else if(strlen($no) == 2){
                    return $no_kcus."00000000".$no;
                }else if(strlen($no) == 1){
                    return $no_kcus."000000000".$no;
                }
                
            }else{
                return $no_kcus."0000000001";
            }
        }else if($tipe_cus == "*"){
            
            $no_kcus = $jp.$unit.date('ym');
        
            $cek_no = $this->db->query("select * from customer where k_Cus like '$no_kcus%' order by id desc")->row();

            if(!empty($cek_no->k_Cus)){
                $no = (substr($cek_no->k_Cus, 9, 3)) + 1;

                if(strlen($no) == 3){
                    return $no_kcus.$no."-P";
                }else if(strlen($no) == 2){
                    return $no_kcus."0".$no."-P";
                }else if(strlen($no) == 1){
                    return $no_kcus."00".$no."-P";
                }
            }else{
                return $no_kcus."001-P";
            }
            
        }
        
    }
    
}