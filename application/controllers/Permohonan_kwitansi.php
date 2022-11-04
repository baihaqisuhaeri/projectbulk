<?php

class Permohonan_kwitansi extends CI_Controller
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

        $this->load->model('Permohonan_kwitansi_model');

        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('sukses');
    }

    function index()
    {

        $this->load->view('material/Head_view');
        $this->load->view("Permohonan_kwitansi_view");
    }


    // 7 Oktober 2022 , lagi mikirin buat view Permohonan Kwitansi
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

    function get_nama_customer()
    {
        $id_cust = $this->input->post("id_cust");
        $customer = $this->Permohonan_kwitansi_model->get_nama_customer($id_cust);
        $kode_customer ="";
        $kd_unit = "";
        foreach ($customer as $qc) {
            $kode_customer = $qc->k_Cus;
            $kd_unit = $qc->unit;
        }
        $data = array(
            'kode_customer' => $kode_customer,
            'kd_unit' => $kd_unit,
        );
        echo json_encode($data);
    }
    // Sampe sini 10 Oktober 2022, selesai narik data customer buat permohonan kwitansi


    function get_sj_detail()
    {
        $k_cus = $this->input->post("k_cus");
        $kd_unit = $this->input->post("kd_unit");

        $_SESSION['k_cus'] = $k_cus;
        $_SESSION['kd_unit'] = $kd_unit;

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
            foreach ($get_nama_barang as $nb) {
                $n_barang = $nb->n_barang;
            }

            $row[] = $n_barang;
            $row[] = "flag tes";
            $row[] = $p->k_altk;
            $row[] = $p->alk_cus1;
            $row[] = '<button  class="btn btn-primary btn-small btn-primary btn-rounded pilih_sj" id="pilih_sj" data-id="' . $p->id . '"  name="pilih_sj" type="button">Pilih</button>';
            $row[] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled class="form-check-input" type="checkbox" value="" id="defaultCheck1">';
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

    function get_sj_detail_pilih()
    {
        $id = $this->input->post("id");

        $list = array();
        foreach ($id as $i) {

            $_SESSION['id'] = $i;
            array_push($list, $this->Permohonan_kwitansi_model->get_datatables_sj_detail_pilih());
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
                foreach ($get_nama_barang as $nb) {
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


    public function tabel_permohonan_kwitansi()
    {


        $list = $this->Permohonan_kwitansi_model->get_datatables();
        $data = array();
        $total = 0;
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();

            $row[] = $no;

            $row[] = $p->tgl_mohon;
            $row[] = $p->no_mohon;
            $row[] = $p->tgl_sj;
            $row[] = $p->n_cus;
            $row[] = $p->no_sj;
            $row[] = $p->jumlah;
            $row[] = '<button  class="btn btn-primary btn-small btn-primary btn-rounded batal_permohonan_kwitansi" id="batal_permohonan_kwitansi" data-id="' . $p->id . '"  name="batal_permohonan_kwitansi" type="button">Batal</button>';









            // $row[] = '<a href="javascript:void(0);" class="fas fa-edit" onclick="get_data_po('.$p->id.')" title="Ubah data PO" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-trash" onclick="hapus_po('.$p->id.')" title="Hapus data PO" style="color:black;"></a>';
            //$row[] = '<a href="#!" class="fas fa-edit edit_supir" data-id="' . $p->id . '"  title="Ubah data PO" style="color:black;"></a> | <a href="#!" class="fas fa-trash deleteSupir" data-id="' . $p->id . '" title="Hapus data PO" style="color:black;"></a>';



            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Permohonan_kwitansi_model->count_all(),
            "recordsFiltered" => $this->Permohonan_kwitansi_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }




    function validasi_alamat_kirim()
    {
        $id_awal = $this->input->post("id_awal");
        $id_cek = $this->input->post("id_cek");
        $alamat_awal = $this->Permohonan_kwitansi_model->get_alamat($id_awal);
        $alamat_cek = $this->Permohonan_kwitansi_model->get_alamat($id_cek);
        foreach ($alamat_awal as $aw) {
            $k_altk_awal = $aw->k_altk;
        }
        foreach ($alamat_cek as $ac) {
            $k_altk_cek = $ac->k_altk;
        }


        if ($k_altk_awal == $k_altk_cek) {

            $data = array(
                'status' => 'success',

            );

            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'failed',

            );

            echo json_encode($data);
        }
    }


    function set_tgl_mohon()
    {
        // $k_cus = $_POST['k_cus'];
        $id_cus = $_POST['id_cus'];
        $get_kd_unit = $this->Permohonan_kwitansi_model->get_kd_unit($id_cus);
        $kd_unit = "";
        foreach ($get_kd_unit as $u) {
            $kd_unit = $u->unit;
        }

        $query = $this->Permohonan_kwitansi_model->get_bulan_aktif($kd_unit);
        $bln_aktif ="";
        foreach ($query as $q) {
            $bln_aktif = $q->tgl_aktif;
        }
        //$bln_aktif = substr($bln_aktif, 0, 7);
        $data = array(
            'tgl_aktif' => $bln_aktif,
        );
        echo json_encode($data);
    }


    function set_alamat_dipilih()
    {
        $id = $this->input->post("id");
        $alamat = $this->Permohonan_kwitansi_model->get_sj_by_id($id);
        foreach ($alamat as $a) {
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


    function tambah_permohonan_kwitansi()
    {
        $id_cus = $_POST['id_cus'];
        $get_kd_unit = $this->Permohonan_kwitansi_model->get_kd_unit($id_cus);
        foreach ($get_kd_unit as $u) {
            $kd_unit = $u->unit;
        }

        $get_bulan_aktif = $this->Permohonan_kwitansi_model->get_bulan_aktif($kd_unit);

        foreach ($get_bulan_aktif as $bln) {
            $tgl_aktif = $bln->tgl_aktif;
        }


        $no_mohon = "M";
        $kode_nomor = "";
        $query_kode_nomor = $this->Permohonan_kwitansi_model->get_kode_nomor($kd_unit);
        foreach ($query_kode_nomor as $qkn) {
            $kode_nomor = $qkn->kode_nomor;
        }
        
        $no_mohon .= $kode_nomor . substr($tgl_aktif, 2, 2) . substr($tgl_aktif, 5, 2);
        //var_dump($no_sj);
        //var_dump($no_mohon);
        $query_last_permohonan_kwitansi = $this->Permohonan_kwitansi_model->get_last_permohonan_kwitansi($no_mohon);
        // var_dump($query_last_sj == null);
        // die();
        if ($query_last_permohonan_kwitansi == null) {
            $urut = "001";
        } else {


            foreach ($query_last_permohonan_kwitansi as $ls) {
                $urut = substr($ls->no_mohon, 7);
                //var_dump($ls->no_sj);
                if ($urut > 0 && $urut < 9) {
                    $urut = "00" . ($urut + 1);
                } else if ($urut >= 9 && $urut < 99) {
                    $urut = "0" . ($urut + 1);
                } else if ($urut >= 99 && $urut <= 999) {
                    $urut = $urut + 1;
                }
            }
            
        }

        $no_mohon .= $urut;


        $tgl_mohon = $_POST['tgl_mohon'];
        $tgl_Area = $_POST['tgl_Area'];
        $alk_cus1 = $_POST['alk_cus1'];
        $alk_cus2 = $_POST['alk_cus2'];
        $alk_cus3 = $_POST['alk_cus3'];
        $id_sj = $_POST['id_sj'];

        foreach ($id_sj as $d) {


            $data = array(
                'no_mohon' => $no_mohon,
                'tgl_mohon' => $tgl_mohon,
                'tgl_Area' => $tgl_Area,


            );

            $this->Permohonan_kwitansi_model->tambah_permohonan_kwitansi($data, $d);
            $query = $this->db->affected_rows();
        }

        if ($query) {
            $data = array(
                'status' => 'true',
            );
            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'false',
            );
            echo json_encode($data);
        }
    }



    public function batal_permohonan_kwitansi()
    {
        $id = $this->input->post('id');
        $data = array(

            'no_mohon' => "",
            'tgl_mohon' => "",
            'tgl_Area' => "",

        );
        $this->Permohonan_kwitansi_model->batal_permohonan_kwitansi($id, $data);
        $query = $this->db->affected_rows();

        if ($query) {

            $data = array(
                'status' => 'success',

            );

            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'failed',

            );

            echo json_encode($data);
        }
    }
}
