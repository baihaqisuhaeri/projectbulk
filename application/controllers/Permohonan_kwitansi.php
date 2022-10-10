<?php

class Permohonan_kwitansi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Permohonan_kwitansi_model');

        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('sukses');

    }

    function index()
    {
        
        $this->load->view('material/Head_view');
        $this->load->view("Permohonan_Kwitansi_view");
    }

    
    // 7 Oktober 2022 , lagi mikirin buat view Permohonan Kwitansi
    function get_customer(){
        
        //$unit = $this->input->post("unit");
        
        
        //if($unit == "BLK"){
           // $customer = $this->db->query("select * from customer where flag_aktif = '' order by n_cus asc")->result();
            $customer = $this->db->query("select DISTINCT *, customer.id as id from customer
            join hak_akses on customer.unit = hak_akses.kode_unit
             where flag_aktif = '' AND hak_akses.nama_user = '".$_SESSION['nama']."'  order by n_cus asc")->result();
        // }else if($unit == "GBB"){
        //     $customer = $this->db->query("select * from dbm001_gbu where flag_aktif = '' order by n_cus asc")->result();
        // }
        
        // if(empty($customer)){
        //     echo '<option value="">Belum ada data</option>';
        // }else{
            echo '<option value="">Nama Customer (NPWP)</option>';
     //   }
        // var_dump($_SESSION['nama']);
        // die();
        foreach ($customer as $u){
            echo '<option value="'.$u->id.'">'.$u->n_cus.' ('.$u->npwp.')</option>';
        }
        
    }

    function get_nama_customer(){
        $id_cust = $this->input->post("id_cust");
        $customer = $this->Permohonan_kwitansi_model->get_nama_customer($id_cust);

        foreach($customer as $qc){
            $kode_customer = $qc->k_Cus;
        }
        $data = array(
            'kode_customer' => $kode_customer,
        );
        echo json_encode($data);

    }
    // Sampe sini 10 Oktober 2022, selesai narik data customer buat permohonan kwitansi

}
