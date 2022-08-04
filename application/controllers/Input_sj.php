<?php

class Input_sj extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Input_sj_model');

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
        $this->load->view("Input_sj_view");
    }

    public function tambahSupir()
    {
        $namaUnit = $_POST['namaUnit'];
        $namaSupir = $_POST['namaSupir'];


        $query = $this->db->query("SELECT AUTO_INCREMENT
        FROM information_schema.TABLES
        WHERE TABLE_SCHEMA = 'itjticom_input_cust'
        AND TABLE_NAME = 'supir'");
       $hasil = $query->result();
       $k_supir = "";
       $kodeSupir = $hasil[0]->AUTO_INCREMENT;
       if ($kodeSupir > 0 && $kodeSupir < 10) {
        $k_supir =  "0000" . $kodeSupir;
    } else if ($kodeSupir >= 10 && $kodeSupir < 100) {
        $k_supir =   "000" . $kodeSupir;
    } else if ($kodeSupir >= 100 && $kodeSupir < 1000) {
        $k_supir =   "00" . $kodeSupir;
    } else if ($kodeSupir >= 1000 && $kodeSupir < 10000) {
        $k_supir = "0" . $kodeSupir;
    } else if ($kodeSupir >= 10000 && $kodeSupir < 100000) {
        $k_supir =  $kodeSupir;
    }

        $supir_unik = $namaSupir ."_". $namaUnit;

        $data = array(
            'k_sales' => $k_supir,
            'n_sales' => $namaSupir,
            'kd_unit' => $namaUnit,
            'supir_unik' => $supir_unik


        );

        if ($this->Supir_model->check($supir_unik)) {
            $data = array(
                'status' => 'false',

            );
            echo json_encode($data);
        }else{

        

        $insert = $this->Supir_model->tambah_supir('supir', $data);
        $query = $this->db->affected_rows();

        


        //if ($query) {

            $data = array(
                'status' => 'true',

            );

            echo json_encode($data);
      //  } 
        // else {
        //     $data = array(
        //         'status' => 'false',

        //     );

        //     echo json_encode($data);
        // }
    }
    }

    function get_unit_sj()
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
        $supir_unik = $namaSupir2 ."_". $namaUnit2;
        

        $data = array(
           
            'n_sales' => $namaSupir2,
            'kd_unit' => $namaUnit2,
            'supir_unik' => $supir_unik
            

        );
        if ($this->Supir_model->check($supir_unik)) {
            $data = array(
                'status' => 'false',

            );
            echo json_encode($data);
        }
        else{

        
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


    function get_customer(){
        
        $unit = $this->input->post("unitSj");
        
      
        $customer = $this->db->query("select DISTINCT * from customer where unit = '$unit' and flag_aktif = '' order by n_cus asc")->result();
       
        
        if(empty($customer)){
            echo '<option value="">Belum ada data</option>';
        }else{
            echo '<option value="">Nama Customer (NPWP)(Kode Customer)</option>';
        }
        
        foreach ($customer as $u){
            echo '<option value="'.$u->k_Cus."|".$u->n_cus.'">'.$u->n_cus.' ('.$u->npwp.')('.$u->k_Cus.')</option>';
          
        }

    }


    public function get_alamat_kirim()
    {

        $k_cus = $this->input->post("k_cus");
        $list = $this->Input_sj_model->get_datatables_alamat_kirim($k_cus);
        $data = array();
        $total = 0;
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();

            $row[] = $no;
           
            $row[] = $p->nmcab;
            $row[] = $p->npwp;
            $row[] = $p->k_altk;
            $row[] = $p->alk_cus1;
            $row[] = $p->alk_cus2;
            $row[] = $p->alk_cus3;
            
            
      
            // $row[] = '<a href="javascript:void(0);" class="fas fa-edit" onclick="get_data_po('.$p->id.')" title="Ubah data PO" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-trash" onclick="hapus_po('.$p->id.')" title="Hapus data PO" style="color:black;"></a>';
           // $row[] = '<a href="#!" class="fas fa-edit edit_supir" data-id="' . $p->id . '"  title="Ubah alamat kirim" style="color:black;"></a> | <a href="#!" class="fas fa-trash deleteSupir" data-id="' . $p->id . '" title="Hapus alamat kirim" style="color:black;"></a>';
            $row[] = '<button type="button" id="pilih_alamat_kirim_modal"  class="btn btn-info">Pilih</button>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Input_sj_model->count_all_alamat_kirim(),
            "recordsFiltered" => $this->Input_sj_model->count_filtered_alamat_kirim($k_cus),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



    function get_nama_customer(){
        $k_cus = $this->input->post("k_cus");
        $unit = $this->input->post("unitSj");
        $data = $this->Input_sj_model->get_nama_customer($unit, $k_cus);

        $output = array(
           
            "data" => $data,
        );
        //output to json format
        echo json_encode($data);
    }
    
    function tambah_alamat_baru(){
        
        $kodeCustomerBaru = $_POST['kodeCustomerBaru'];
        $namaCustomerBaru = $_POST['namaCustomerBaru'];
        $alamatKirimKeBaru = $_POST['alamatKirimKeBaru'];
        $namaCabangBaru = $_POST['namaCabangBaru'];
        $npwpBaru  = $_POST['npwpBaru'];
        $alamat1CustomerBaru = $_POST['alamat1CustomerBaru'];
        $alamat2CustomerBaru = $_POST['alamat2CustomerBaru'];
        $alamat3CustomerBaru = $_POST['alamat3CustomerBaru'];
        $alamatKirim1 = $_POST['alamatKirim1'];
        $alamatKirim2 = $_POST['alamatKirim2'];
        $alamatKirim3 = $_POST['alamatKirim3'];
        date_default_timezone_set('Asia/Jakarta');
        $tgl_input = date("Y-m-d h:i:s");
        
        $data = array(
            'k_cus'  =>  $kodeCustomerBaru,
            'n_cus'  =>  $namaCustomerBaru,
            'k_altk' => $alamatKirimKeBaru,
            'nmcab'  =>  $namaCabangBaru,
            'npwp'   =>   $npwpBaru,
            'al1_cus'   => $alamat1CustomerBaru,
            'al2_cus'   => $alamat2CustomerBaru,
            'al3_cus'   => $alamat3CustomerBaru,
            'alk_cus1'  => $alamatKirim1,
            'alk_cus2'  => $alamatKirim2,
            'alk_cus3'  => $alamatKirim3,
            'tgl_input' => $tgl_input
        );
 
        $this->Input_sj_model->tambah_alamat_baru($data);
        $query = $this->db->affected_rows();

            $data = array(
                'status' => 'true',
            );

            echo json_encode($data);
        
    }

    function get_no_spm()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_sekarang = date("Y-m-d");
        $kodeCustomer = $this->input->post("kodeCustomer");
        $spm = $this->db->query("SELECT * FROM tb_spm WHERE k_cus = '$kodeCustomer'  and spm_brlk >= '2022-07-01' ")->result();

        // echo "<pre>";
        // print_r($spm);
        // die();

        if (empty($spm)) {
            echo '<option value="kosong">Belum ada data</option>';
        } else {
            echo '<option value="">Pilih No SPM</option>';
        }
        $vol_kirim_spm = 0;
        foreach ($spm as $sp) {
            $spmVol = $this->db->query("SELECT * FROM `tb_sj` WHERE no_urutspm = '$sp->no_urutspm'")->result();
            $vol_kirim_spm = $sp->volume_krm;
            foreach($spmVol as $spVol){
                if($sp->no_urutspm == $spVol->no_urutspm){
                    //echo $vol_kirim_spm . " | ".$spVol->kg_kirim.". ";
                    $vol_kirim_spm = $vol_kirim_spm - $spVol->kg_kirim;
                }
            }
            if($vol_kirim_spm>0){
                echo '<option value="' . $sp->no_urutspm . '">' . $sp->no_spm . '</option>';
          
            }
           
            
        }
    }

    function get_volume_spm(){
        $noUrutSpm = $this->input->post("noUrutSpm");
        //$data = $this->Input_sj_model->get_volume_spm($noUrutSpm);
        $data =  $this->db->query("SELECT * FROM `tb_spm` WHERE no_urutspm = '$noUrutSpm'")->result();
        $dataSj = $this->db->query("SELECT * FROM `tb_sj` WHERE no_urutspm = '$noUrutSpm'")->result();;

        // echo "<pre>";
        // print_r($data);
        // die();
        
        $volume_spm = 0;
        foreach($data as $d){
            $volume_spm = $d->volume_krm;
        }
        foreach($dataSj as $dsj){
            $volume_spm -= $dsj->kg_kirim;
        }
        
        $output = array(
           
            "volume_spm" => $volume_spm,
        );
        //output to json format
        //echo($volume_spm);
        
        echo json_encode($output);
        
    }




    function get_mobil_sj(){
        
        $unit = $this->input->post("unitSj");
        
      
        $mobil = $this->Input_sj_model->get_mobil_sj($unit);
       
        
        if(empty($mobil)){
            echo '<option value="">Belum ada data</option>';
        }else{
            echo '<option value="">Nama Mobil (Kode Mobil)</option>';
        }
        
        foreach ($mobil as $m){
            echo '<option value="'.$m->mobil_unik.'">'.$m->n_mobil." (".$m->k_mobil.')</option>';
          
        }

    }

    function get_supir_sj(){
        
        $unit = $this->input->post("unitSj");
        
      
        $supir = $this->Input_sj_model->get_supir_sj($unit);
       
        
        if(empty($supir)){
            echo '<option value="">Belum ada data</option>';
        }else{
            echo '<option value="">Nama Supir</option>';
        }
        
        foreach ($supir as $s){
            echo '<option value="'.$s->supir_unik.'">'.$s->n_sales.'</option>';
          
        }

    }

    function get_barang_sj(){
        
        $unit = $this->input->post("unitSj");
        
      
        $barang = $this->Input_sj_model->get_barang_sj($unit);
       
        
        if(empty($barang)){
            echo '<option value="">Belum ada data</option>';
        }else{
            echo '<option value="">Nama Barang (Kode Barang)</option>';
        }
        
        foreach ($barang as $b){
            echo '<option value="'.$b->k_barang.'">'.$b->n_barang." (".$b->k_barang.')</option>';
          
        }

    }


    function get_unit_marketing(){
        
        
        
      
        $unit_marketing = $this->Input_sj_model->get_unit_marketing();
       
        
        if(empty($unit_marketing)){
            echo '<option value="">Belum ada data</option>';
        }else{
            echo '<option value="">Nama Unit Marketing </option>';
        }
        
        foreach ($unit_marketing as $u){
            echo '<option value="'.$u->nourut.'">'.$u->unit_mkt.'</option>';
          
        }

    }

    function get_kg_barang(){
        $kode_barang = $this->input->post('kode_barang');

        $query = $this->Input_sj_model->get_kg_barang($kode_barang);

        
        echo json_encode($query);
        
    }

    
    function get_suplier(){
        $suplier = $this->Input_sj_model->get_suplier();
       
        
        if(empty($suplier)){
            echo '<option value="">Belum ada data</option>';
        }else{
            echo '<option value="">Nama Suplier </option>';
        }
        
        foreach ($suplier as $s){
            echo '<option value="'.$s->k_supl.'">'.$s->n_supl.'</option>';
          
        }
    }

    function get_ppn(){
        

        $query = $this->Input_sj_model->get_ppn();

        
        echo json_encode($query);
        
    }

    function get_data_spm(){
        $noUrutSpm = $this->input->post("noUrutSpm");

        $query = $this->Input_sj_model->get_data_spm($noUrutSpm);

        echo json_encode($query);

    }


    public function tambah_sj()
    {
        
          $uniSj = $_POST['unitSj'];
          $unitSj = $_POST['unitSj'];
          $nama_customer = $_POST['nama_customer'];
          $kode_customer = $_POST['kode_customer'];
          var_dump($kode_customer);
          die();
          $no_spm = $_POST['no_spm'];
          $no_surat_jalan = $_POST['no_surat_jalan'];
          $tanggal_surat_jalan = $_POST['tanggal_surat_jalan'];
          $no_kendaraan = $_POST['no_kendaraan'];
          $unit_marketing = $_POST['unit_marketing'];
          $nama_supir = $_POST['nama_supir'];
          $kode_barang = $_POST['kode_barang'];
          $jumlah = $_POST['jumlah'];
          $keterangan = $_POST['keterangan'];
          $suplier = $_POST['suplier'];
          $no_faktur = $_POST['no_faktur'];
          $no_segel = $_POST['no_segel'];
          $pressure = $_POST['pressure'];
          $temperatur = $_POST['temperatur'];
          $nilai_persen_pengambilan = $_POST['nilai_persen_pengambilan'];
          $nilai_persen_berangkat = $_POST['nilai_persen_berangkat'];
        // $data = array(
        //     '' => $,
        // );
            
        $this->Input_sj_model->tambah_surat_sj('tb_sj', $data);
        $query = $this->db->affected_rows();

            $data = array(
                'status' => 'true',
            );

            echo json_encode($data);
    }

}
