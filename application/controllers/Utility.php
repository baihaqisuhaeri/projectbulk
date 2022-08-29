<?php

class Utility extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Utility_model');

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


    function get_unit()
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



    public function get_bulan_aktif()
    {
        $kd_unit = $_POST['kd_unit'];



        $query = $this->Utility_model->get_bulan_aktif($kd_unit);

        foreach ($query as $q) {
            $bln_aktif = $q->tgl_aktif;
        }
        $bln_aktif = substr($bln_aktif, 0, 7);
        $data = array(
            'tgl_aktif' => $bln_aktif,
        );
        echo json_encode($data);
    }

    public function tutup_bulan(){
        
        $unit = $_POST['unit'];
        $bulanSekarang = date("Y-m-d");
        
        $queryBulanSekarang = $this->Utility_model->get_bulan_aktif($unit);
        foreach($queryBulanSekarang as $bs){
            $bulanAktif = $bs->tgl_aktif;
        }
        $bulanSekarang = date_create($bulanSekarang);
        $bulanAktif = date_create($bulanAktif);  
        $interval = date_diff($bulanSekarang, $bulanAktif); 
        
        // //var_dump($interval->m);
        $selisih = $interval->m;

        if($bulanSekarang> $bulanAktif){

        

        if($selisih==0){
            $data = array(
                'status' => "failed",
            );
            echo json_encode($data);
        }else if($selisih==1){
            $bulanAktif = $bulanAktif->format("Y-m-d");
            $bulanAktif = date('Y-m-d', strtotime('+'.$selisih.' month', strtotime( $bulanAktif )));
            $data = array(
                'tgl_aktif' => $bulanAktif,
            );
            $query = $this->Utility_model->tutup_bulan($unit, $data);
            $data = array(
                'status' => "success",
            );
            echo json_encode($data);
        }else if($selisih>1){
            $bulanAktif = $bulanAktif->format("Y-m-d");
            $selisih = $selisih - ($selisih-1);
            // var_dump($selisih);
            // die();
            $bulanAktif = date('Y-m-d', strtotime('+'.$selisih.' month', strtotime( $bulanAktif )));
            $data = array(
                'tgl_aktif' => $bulanAktif,
            );
            $query = $this->Utility_model->tutup_bulan($unit, $data);
            $data = array(
                'status' => "success",
            );
            echo json_encode($data);
        }
        
    }
    else{
        $data = array(
            'status' => "failed",
        );
        echo json_encode($data);
    }
        
        
        


    }

}
