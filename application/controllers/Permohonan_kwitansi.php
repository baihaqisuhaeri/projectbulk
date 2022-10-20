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
            echo '<option value="">Nama Customer (NPWP) (Unit)</option>';
     //   }
        // var_dump($_SESSION['nama']);
        // die();
        foreach ($customer as $u){
            echo '<option value="'.$u->id.'">'.$u->n_cus.' ('.$u->npwp.') ('.$u->unit.')</option>';
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
            $row[] = '<button  class="btn btn-primary btn-small btn-primary btn-rounded hapus_pilih_sj" id="hapus_pilih_sj" data-id="' . $p->id . '"  name="hapus_pilih_sj" type="button">Hapus</button>';
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



    function validasi_alamat_kirim(){
        $id_awal = $this->input->post("id_awal");
        $id_cek = $this->input->post("id_cek");
        $alamat_awal = $this->Permohonan_kwitansi_model->get_alamat($id_awal);
        $alamat_cek = $this->Permohonan_kwitansi_model->get_alamat($id_cek);
        foreach($alamat_awal as $aw){
            $k_altk_awal = $aw->k_altk;
        }
        foreach($alamat_cek as $ac){
            $k_altk_cek = $ac->k_altk;
        }

       
        if ($k_altk_awal==$k_altk_cek) {
    
            $data = array(
                'status' => 'success',

            );

            echo json_encode($data);
        }else{
            $data = array(
                'status' => 'failed',

            );

            echo json_encode($data);
        }

    }


    function set_tgl_mohon(){
       // $k_cus = $_POST['k_cus'];
        $id_cus = $_POST['id_cus'];
        $get_kd_unit = $this->Permohonan_kwitansi_model->get_kd_unit($id_cus);

        foreach ($get_kd_unit as $u) {
            $kd_unit = $u->unit;
        }
        
        $query = $this->Permohonan_kwitansi_model->get_bulan_aktif($kd_unit);

        foreach ($query as $q) {
            $bln_aktif = $q->tgl_aktif;
        }
        //$bln_aktif = substr($bln_aktif, 0, 7);
        $data = array(
            'tgl_aktif' => $bln_aktif,
        );
        echo json_encode($data);
    }


    function set_alamat_dipilih(){
        $id = $this->input->post("id");
        $alamat = $this->Permohonan_kwitansi_model->get_sj_by_id($id);
        foreach($alamat as $a){
            $alk_cus1 = $a->alk_cus1;
            $alk_cus2 = $a->alk_cus2;
            $alk_cus3 = $a->alk_cus3;
        }
        $data = array(
            'alk_cus1' => $alk_cus1,
            'alk_cus2' => $alk_cus2,
            'alk_cus3' => $alk_cus3,
        );
        //Sampe sini 20 Oktober , tinggal input doang sm auto generate no_mohon nya
        echo json_encode($data);

    }


}
