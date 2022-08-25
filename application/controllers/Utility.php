<?php

class Utility extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Supir_model');

        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('sukses');

        //$this->load->library('pdf');
    }

    function index()
    {
        // var_dump($_SESSION['nama']);
        // die();
        // $bulan = $this->db->query("SELECT DISTINCT blnaktif FROM dbm002");
        // $data['bulanAktif']  = $bulan->result_array();
        // var_dump($data[0]['blnaktif']);
        // die();

        //  $data['ini'] = $datai;

        $this->load->view('material/Head_view');
        $this->load->view("Utility_view");
    }


}
