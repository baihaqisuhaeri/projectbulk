<?php

class Supir extends CI_Controller
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
        $this->load->view("Supir_view");
    }

    public function tambahSupir()
    {
        $namaUnit = $_POST['namaUnit'];
        $namaSupir = $_POST['namaSupir'];






        $data = array(
            'k_sales' => "23",
            'n_sales' => $namaSupir,
            'kd_unit' => $namaUnit


        );
        $this->Supir_model->tambah_supir('supir', $data);
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

    function get_unit_supir()
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
        $list = $this->Supir_model->get_datatables();
        $data = array();
        $total = 0;
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();

            $row[] = $no;
           
            $row[] = $p->n_sales;
            $row[] = $p->k_sales;
            $row[] = $p->kd_unit;
      
            





            // $row[] = '<a href="javascript:void(0);" class="fas fa-edit" onclick="get_data_po('.$p->id.')" title="Ubah data PO" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-trash" onclick="hapus_po('.$p->id.')" title="Hapus data PO" style="color:black;"></a>';
            $row[] = '<a href="#!" class="fas fa-edit edit_supir" data-id="' . $p->id . '"  title="Ubah data PO" style="color:black;"></a> | <a href="#!" class="fas fa-trash deleteSupir" data-id="' . $p->id . '" title="Hapus data PO" style="color:black;"></a>';



            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Supir_model->count_all(),
            "recordsFiltered" => $this->Supir_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



    function hapus_supir()
    {
        $id = $_POST['id'];

        $this->Supir_model->hapus_supir($id);
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


    function edit_supir()
    {
        $id = $_POST['id'];
        $namaUnit2 = $_POST['namaUnit2'];
        $namaSupir2 = $_POST['namaSupir2'];
        
        

        $data = array(
           
            'n_sales' => $namaSupir2,
            'kd_unit' => $namaUnit2,
            

        );
        $this->Supir_model->edit_supir($id, $data);
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
