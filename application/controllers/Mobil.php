<?php

class Mobil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Mobil_model');

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
        $this->load->view("Mobil_view");
    }

    public function tambahMobil()
    {
        $namaUnit = $_POST['namaUnit'];
        $namaMobil = $_POST['namaMobil'];
        $platNomor = $_POST['platNomor'];
        $tahun = $_POST['tahun'];
        $tanggalStnk = $_POST['tanggalStnk'];
        $tanggalKirim = $_POST['tanggalKirim'];


        $mobil_unik = $platNomor ."_". $namaUnit;


        $data = array(
            'k_mobil' => $platNomor,
            'n_mobil' => $namaMobil,
            'k_cabang' => $namaUnit,
            'tahun' => $tahun,
            'stnk' => $tanggalStnk,
            'kir_mobil' => $tanggalKirim,
            'mobil_unik' => $mobil_unik


        );

        if ($this->Mobil_model->check($mobil_unik)) {
            $data = array(
                'status' => 'false',

            );
            echo json_encode($data);
        }else{
            
        $this->Mobil_model->tambah_mobil('mobil', $data);
        $query = $this->db->affected_rows();


        // if ($query) {

            $data = array(
                'status' => 'true',

            );

            echo json_encode($data);
        // } else {
        //     $data = array(
        //         'status' => 'false',

        //     );

        //     echo json_encode($data);
        // }
    }
    }

    function get_unit_mobil()
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
            echo '<option value="' . $u->kode_unit . '">' . $u->nama_unit . '</option>';
        }
    }

    public function ajax_list()
    {

        date_default_timezone_set('Asia/Jakarta');
        $bulanAktifSekarang = date("Ym");
        if (isset($_POST['bulanAktif'])) {


            $_SESSION['bulanAktif'] = $_POST['bulanAktif'];
            // var_dump($_SESSION['bulanAktif']);
            // die();
        }
        $list = $this->Mobil_model->get_datatables();
        $data = array();
        $total = 0;
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();

            $row[] = $no;
           
            $row[] = $p->k_mobil;
            $row[] = $p->n_mobil;
            $row[] = $p->tahun;
            $row[] = $p->k_cabang;
            $row[] = $p->stnk;
            $row[] = $p->kir_mobil;
      
            





            // $row[] = '<a href="javascript:void(0);" class="fas fa-edit" onclick="get_data_po('.$p->id.')" title="Ubah data PO" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-trash" onclick="hapus_po('.$p->id.')" title="Hapus data PO" style="color:black;"></a>';
            $row[] = '<a href="#!" class="fas fa-edit edit_mobil" data-id="' . $p->no . '"  title="Ubah data PO" style="color:black;"></a> | <a href="#!" class="fas fa-trash deleteMobil" data-id="' . $p->no . '" title="Hapus data PO" style="color:black;"></a>';



            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mobil_model->count_all(),
            "recordsFiltered" => $this->Mobil_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



    function hapus_mobil()
    {
        $id = $_POST['idDelete'];

        $this->Mobil_model->hapus_mobil($id);
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


    function edit_mobil()
    {
        $no = $_POST['no'];
        $namaUnit = $_POST['namaUnit2'];
        $namaMobil = $_POST['namaMobil2'];
        $platNomor = $_POST['platNomor2'];
        $tahun = $_POST['tahun2'];
        $tanggalStnk = $_POST['tanggalStnk2'];
        $tanggalKirim = $_POST['tanggalKirim2'];

        $mobil_unik = $platNomor ."_". $namaUnit;
        




        $data = array(
            
            'n_mobil' => $namaMobil,
            'k_cabang' => $namaUnit,
            'tahun' => $tahun,
            'stnk' => $tanggalStnk,
            'kir_mobil' => $tanggalKirim,
            'k_mobil' => $platNomor,
            'mobil_unik' => $mobil_unik


        );
        // echo "<pre>";
        // print_r($data);
        //die();
        
        // var_dump($this->Mobil_model->check($mobil_unik));
        // die();
        if ($this->Mobil_model->check($mobil_unik, $no)) {
            $data = array(
                'status' => 'false',

            );
            echo json_encode($data);
            
        }
        else{

        $this->Mobil_model->edit_mobil($no, $data);
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

            echo json_encode($data);
        }
    }
    }


    //penting kalo mau nanti dibutuhin
    // function get_supir(){
        
    //     $unitMobil = $this->input->post("unitMobil");
        
    //  //   if($unitMobil != ""){
    //         $supir = $this->db->query("select * from supir where kd_unit = '$unitMobil' order by k_sales asc")->result();
    //   //  }
        
    //     if(empty($supir)){
    //         echo '<option value="">Belum ada data</option>';
    //     }else{
    //        // echo '<option value="">Nama Supir</option>';
    //     }
        
    //     foreach ($supir as $u){
    //         echo '<option value="'.$u->k_sales.'">'.$u->n_sales.' ('.$u->kd_unit.')</option>';
    //     }
        
    // }



}
