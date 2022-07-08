<?php

class Barang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Barang_model');

        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('sukses');

        //  $this->load->library('pdf');
    }

    function index()
    {



        // date_default_timezone_set('Asia/Jakarta');
        // $bulanSekarang = date("Y-m-d"); 

        // //$bulanSekarang = "202206"; 
        // //substr($bln[0]['tgl_aktif'],5,2)
        // $bulanYangAktif = $this->db->query("SELECT tgl_aktif FROM dbm003");
        // $bln = $bulanYangAktif->result_array();
        // $bulanConfig = substr($bln[0]['tgl_aktif'],0,4).substr($bln[0]['tgl_aktif'],5,2);
        // //echo $bulanConfig < $bulanSekarang;
        // //

        // if($bulanConfig<substr($bulanSekarang,0,4).substr($bulanSekarang,5,2)){
        //     $this->db->select('*');
        //  $this->db->where('blnaktif', $bulanConfig);
        //  $narik = $this->db->get('dbm002');
        //  $dataSebelumnya =$narik->result();
        //  foreach($dataSebelumnya as $d){
        //     $d->id = null;
        //      $d->blnaktif = substr($bulanSekarang,0,4).substr($bulanSekarang,5,2);
        //  }

        //  $this->db->insert_batch('dbm002', $dataSebelumnya);
        //  //die();

        //     $this->db->set('tgl_aktif', $bulanSekarang);
        //     $this->db->where('flag_aktif !=', '*');
        //     $this->db->update('dbm003');

        // }





        // $bulan = $this->db->query("SELECT DISTINCT blnaktif FROM dbm002");
        // $data['bulanAktif']  = $bulan->result_array();

        $this->load->view('material/Head_view');
        $this->load->view("Barang_view");
    }

    public function ajax_list()
    {


        // $bulanYangAktif = $this->db->query("SELECT tgl_aktif FROM dbm003 where flag_aktif != '*'");
        // $bln = $bulanYangAktif->result_array();
        // $bulanAktifSekarang = substr($bln[0]['tgl_aktif'],0,4).substr($bln[0]['tgl_aktif'],5,2);




        // date_default_timezone_set('Asia/Jakarta');
        // $bulanAktifSekarang = date("Ym");
        if (isset($_POST['bulanAktif'])) {


            $_SESSION['bulanAktif'] = $_POST['bulanAktif'];
            // var_dump($_SESSION['bulanAktif']);
            // die();
        }
        $list = $this->Barang_model->get_datatables();
        $data = array();
        $total = 0;
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = $p->k_barang;
            $row[] = $p->n_barang;
            $row[] = $p->k_div;
            $row[] = $p->kode_berat;
            $row[] = $p->jml_kg;
            $row[] = number_format($p->h_pokok, 2, ".", ",");
            $row[] = number_format($p->h_jual, 2, ".", ",");
            $row[] = $p->kode_jual;
            $row[] = $p->kode_tim;
            // $row[] = $p->blnaktif;
            $row[] = $p->kd_unit;

            //     echo $bulanAktifSekarang. " ".$p->blnaktif;
            // die();
            //  if($p->blnaktif == $bulanAktifSekarang){


            // $row[] = '<a href="javascript:void(0);" class="fas fa-edit" onclick="get_data_po('.$p->id.')" title="Ubah data PO" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-trash" onclick="hapus_po('.$p->id.')" title="Hapus data PO" style="color:black;"></a>';
            $row[] = '<a href="#!" class="fas fa-edit edit_barang" data-id="' . $p->id . '"  title="Ubah data PO" style="color:black;"></a> | <a href="#!" class="fas fa-trash deleteBarang" data-id="' . $p->id . '" title="Hapus data PO" style="color:black;"></a>';
            // }else{
            //     $row[] =  '<p  class=""  title="Tidak dapat mengubah" style="color:black;">Disabled</p>';
            // }
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Barang_model->count_all(),
            "recordsFiltered" => $this->Barang_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



    public function tambahBarang()
    {

        $query = $this->db->query("SELECT AUTO_INCREMENT
         FROM information_schema.TABLES
         WHERE TABLE_SCHEMA = 'itjticom_input_cust'
         AND TABLE_NAME = 'dbm002'");
        $hasil = $query->result();





        $namaBarang = $_POST['namaBarang'];
        //$hargaPokok = $_POST['hargaPokok'];
        $hargaPokok = str_replace(",", "", $this->input->post('hargaPokok'));
        //$hargaJual = $_POST['hargaJual'];
        $hargaJual = str_replace(",", "", $this->input->post('hargaJual'));
        $kodeDiv = $_POST['kodeDiv'];
        $kodeBerat = $_POST['kodeBerat'];
        $jumlahKg = $_POST['jumlahKg'];
        $kodeJual = $_POST['kodeJual'];
        $kodeTim = $_POST['kodeTim'];

        $tahunBulan = date("Y-m");
        $tahun =  substr($tahunBulan, 0, 4);
        $bulan = substr($tahunBulan, 5, 6);
        $bulanAktif = $tahun . $bulan;
        $k_barang = "";
        $kodeBarang = $hasil[0]->AUTO_INCREMENT;
        $kodeUnit = $_POST['kodeUnit'];
        if ($kodeBarang > 0 && $kodeBarang < 10) {
            $k_barang = $kodeUnit . "000000" . $kodeBarang;
        } else if ($kodeBarang >= 10 && $kodeBarang < 100) {
            $k_barang =  $kodeUnit . "00000" . $kodeBarang;
        } else if ($kodeBarang >= 100 && $kodeBarang < 1000) {
            $k_barang =  $kodeUnit . "0000" . $kodeBarang;
        } else if ($kodeBarang >= 1000 && $kodeBarang < 10000) {
            $k_barang = $kodeUnit . "000" . $kodeBarang;
        } else if ($kodeBarang >= 10000 && $kodeBarang < 100000) {
            $k_barang = $kodeUnit . "00" . $kodeBarang;
        } else if ($kodeBarang >= 100000 && $kodeBarang < 1000000) {
            $k_barang =  $kodeUnit . "0" . $kodeBarang;
        } else if ($kodeBarang >= 1000000 && $kodeBarang < 10000000) {
            $k_barang = $kodeUnit . $kodeBarang;
        }


        $data = array(
            'k_barang' => $k_barang,
            'n_barang' => $namaBarang,
            'k_div'    => $kodeDiv,
            'kode_berat' => $kodeBerat,
            'jml_kg' => $jumlahKg,
            'h_pokok' => $hargaPokok,
            'h_jual' => $hargaJual,
            'kode_jual' => $kodeJual,
            'kode_tim' => $kodeTim,
            // 'blnaktif' => $bulanAktif,
            'kd_unit' => $kodeUnit

        );
        $this->Barang_model->tambah_barang('dbm002', $data);
        $query = $this->db->affected_rows();


        if ($query) {

            $data = array(
                'status' => 'true',

            );

            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'false',

            );
        }
    }


    function get_unit_barang()
    {

        $daftar_unit = "";
        $unit_akses = $this->db->query("select * from hak_akses where nama_user = '" . $_SESSION['nama'] . "' ")->result();
        foreach ($unit_akses as $unit) {
            $daftar_unit .= " OR kd_unit = '$unit->kode_unit'";
        }
        $daftar_unit = substr($daftar_unit, 4);

        //$unit = $this->db->query("select * from tb_unit where (".$daftar_unit.") order by nm_unit asc ")->result();        
        $unit = $this->db->query("select * from tb_unit order by nm_unit desc ")->result();

        if (empty($unit_akses)) {
            echo '<option value="kosong">Belum ada data</option>';
        } else {
            echo '<option value="">Pilih Unit</option>';
        }

        foreach ($unit_akses as $u) {
            echo '<option value="' . $u->kode_unit . '">' . "$u->nama_unit ". '</option>';
        }
    }



    function hapus_barang()
    {
        $id = $_POST['id'];

        $this->Barang_model->hapus_barang($id);
        $query = $this->db->affected_rows();
        if ($query == true) {
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



    function edit_barang()
    {
        $id = $_POST['id'];
        $kodeBarang2 = $_POST['kodeBarang2'];
        $namaBarang2 = $_POST['namaBarang2'];
        // $hargaPokok2 = $_POST['hargaPokok2'];
        $hargaPokok2 = str_replace(",", "", $this->input->post('hargaPokok2'));
        // $hargaJual2 = $_POST['hargaJual2'];
        $hargaJual2 = str_replace(",", "", $this->input->post('hargaJual2'));
        $kodeDiv2 = $_POST['kodeDiv2'];
        $kodeBerat2 = $_POST['kodeBerat2'];
        $jumlahKg2 = $_POST['jumlahKg2'];
        $kodeJual2 = $_POST['kodeJual2'];
        $kodeTim2 = $_POST['kodeTim2'];

        // echo $kodeTim2 . " ". $kodeJual2;
        // die();
        $tahunBulan = date("Y-m");
        $tahun =  substr($tahunBulan, 0, 4);
        $bulan = substr($tahunBulan, 5, 6);
        $bulanAktif = $tahun . $bulan;

        $kodeUnit2 = $_POST['kodeUnit2'];
        $kodeBarang2 = $kodeUnit2 . substr($kodeBarang2, 3);
        // var_dump($kodeUnit);
        // die();

        $data = array(
            'k_barang' => $kodeBarang2,
            'n_barang' => $namaBarang2,
            'k_div'    => $kodeDiv2,
            'kode_berat' => $kodeBerat2,
            'jml_kg' => $jumlahKg2,
            'h_pokok' => $hargaPokok2,
            'h_jual' => $hargaJual2,
            'kode_jual' => $kodeJual2,
            'kode_tim' => $kodeTim2,
            //'blnaktif' => $bulanAktif,
            'kd_unit' => $kodeUnit2

        );
        $this->Barang_model->edit_barang($id, $data);
        $query = $this->db->affected_rows();

        //  echo '<pre>';
        // print_r($data);
        // die();

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
}
