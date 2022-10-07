<?php

class Permohonan_kwitansi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Permohonan_Kwitansi_model');

        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('sukses');

    }

    function index()
    {
        
        $this->load->view('material/Head_view');
        $this->load->view("Permohonan_Kwitansi_view");
    }

    
    // 7 Oktober 2022 , lagi mikirin buat view Permohonan Kwitansi


}
