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


    function get_sj_detail(){
        $k_cus = $this->input->post("k_cus");
        
        $_SESSION['k_cus'] = $k_cus;
    
        $list = $this->Permohonan_kwitansi_model->get_datatables_sj_detail();
       
        $data = array();
        $n_barang = "";
        $total = 0;
        $no = $_POST['start'];
        foreach ($list as $p) {
            // var_dump($p->no_sj);
            // die();
            $no++;
            $row = array();

            $row[] = $no;

            $row[] = $p->tgl_sj;
            $row[] = $p->no_sj;
            $row[] = $p->jumlah;
            $row[] = $p->k_barang;
            $get_nama_barang = $this->Permohonan_kwitansi_model->get_nama_barang($p->k_barang);
            foreach($get_nama_barang as $nb){
                $n_barang = $nb->n_barang;
            }

            $row[] = $n_barang;
            $row[] = "flag tes";
            $row[] = $p->k_altk;
            $row[] = $p->alk_cus1;
            $row[] = '<button  class="btn btn-primary btn-small btn-primary btn-rounded pilih_sj" id="pilih_sj" data-id="' . $p->id . '"  name="pilih_sj" type="button">Pilih</button>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Permohonan_kwitansi_model->count_all_sj_detail(),
            "recordsFiltered" => $this->Permohonan_kwitansi_model->count_filtered_sj_detail($k_cus),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function get_sj_detail_pilih(){
        $id = $this->input->post("id");
        
        $list = array();
        foreach($id as $i){
            
            $_SESSION['id'] = $i;
            array_push($list,$this->Permohonan_kwitansi_model->get_datatables_sj_detail_pilih());
        }
        $data = array();
        $n_barang = "";
        $total = 0;
        $no = $_POST['start'];
        
        foreach ($list as $l) {
            foreach ($l as $p) {
            // var_dump($p->no_sj);
            // die();
            $no++;
            $row = array();

            $row[] = $no;

            $row[] = $p->tgl_sj;
            $row[] = $p->no_sj;
            $row[] = $p->k_barang;
            $get_nama_barang = $this->Permohonan_kwitansi_model->get_nama_barang($p->k_barang);
            foreach($get_nama_barang as $nb){
                $n_barang = $nb->n_barang;
            }
            $row[] = $n_barang;
            $row[] = $p->qty_kirim;
            $data[] = $row;
        }
        }
    

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Permohonan_kwitansi_model->count_all_sj_detail_pilih(),
            "recordsFiltered" => $this->Permohonan_kwitansi_model->count_filtered_sj_detail_pilih(),
            "data" => $data,
        );
        //output to json format
    
        echo json_encode($output);
    
    
    }
}
