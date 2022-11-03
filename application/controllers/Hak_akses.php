<?php

class Hak_akses extends CI_Controller{
    
     function __construct() {
        parent::__construct();
        error_reporting(0);
        $this->load->library("session");
        $this->load->helper('url');
        
        if(!isset($_SESSION['nama'])){
            redirect('Login');
        }else{
            if($_SESSION['role'] != "administrator"){
                redirect('halaman-utama');
            }
        }

        $this->load->model('Hak_akses_model');
        
    }
    
    public function ajax_list(){

        $username = $this->input->post('username');
        
        if($username == ""){
            $username = "EDP";
        }
        
        $data_user = $this->db->query('select * from user where username = "'.$username.'" ')->row();
        
        $list = $this->Hak_akses_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $l) {
                $no++;
                $hak_akses = $this->db->query('select * from hak_akses where kode_unit = "'.$l->kd_unit.'" and nama_user = "'.$data_user->nama.'" ')->row();
                
                $row = array();
                $row[] = $no.".";
                $row[] = $l->kd_unit;
                $row[] = $l->nm_unit;
                
                if(empty($hak_akses->kode_unit)){
                    $row[] = '<a href="javascript:void(0);" class="fas fa-plus" onclick="tambah_hak_akses(\''.$l->kd_unit.'\',\''.$l->nm_unit.'\',\''.$data_user->nama.'\')" style="color:black;"></a>';
                }else{
                    $row[] = '<a href="javascript:void(0);" class="fas fa-backspace" onclick="hapus_hak_akses(\''.$l->kd_unit.'\',\''.$l->nm_unit.'\',\''.$data_user->nama.'\')" style="color:black;"></a>';
                }
                                
                $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Hak_akses_model->count_all(),
                        "recordsFiltered" => $this->Hak_akses_model->count_filtered(),
                        "data" => $data,
                        );
        //output to json format
        echo json_encode($output);
    }
    
}