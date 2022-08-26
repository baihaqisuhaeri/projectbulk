<?php

class Utility extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

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
        
    }

}
