<?php

class Pembukaan_kwitansi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->library("session");
        $this->load->helper('url');
        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Pembukaan_kwitansi_model');

        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('sukses');
    }

    function index()
    {

        $this->load->view('material/Head_view');
        $this->load->view("Pembukaan_kwitansi_view");
    }

    function get_customer()
    {

        //$unit = $this->input->post("unit");


        //if($unit == "BLK"){
        // $customer = $this->db->query("select * from customer where flag_aktif = '' order by n_cus asc")->result();
        $customer = $this->db->query("select DISTINCT *, customer.id as id from customer
            join hak_akses on customer.unit = hak_akses.kode_unit
             where flag_aktif = '' AND hak_akses.nama_user = '" . $_SESSION['nama'] . "'  order by n_cus asc")->result();
        // }else if($unit == "GBB"){
        //     $customer = $this->db->query("select * from dbm001_gbu where flag_aktif = '' order by n_cus asc")->result();
        // }

        // if(empty($customer)){
        //     echo '<option value="">Belum ada data</option>';
        // }else{
        echo '<option value="">Nama Customer (NPWP) (Unit)</option>';
        //   }
        // var_dump($_SESSION['nama']);
        // die();
        foreach ($customer as $u) {
            echo '<option value="' . $u->id . '">' . $u->n_cus . ' (' . $u->npwp . ') (' . $u->unit . ')</option>';
        }
    }


    


}
