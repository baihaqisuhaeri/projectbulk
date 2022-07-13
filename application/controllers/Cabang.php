<?php

class Cabang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['nama'])) {
            redirect('masuk');
        }

        $this->load->model('Cabang_model');

        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('sukses');

      //  $this->load->library('pdf');
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
        $this->load->view("Cabang_view");
    }

    public function tambahCabang(){
        $namaCabang = $_POST['namaCabang'];
        $alamat1Cabang = $_POST['alamat1Cabang'];
        $alamat2Cabang = $_POST['alamat2Cabang'];
        $alamat3Cabang = $_POST['alamat3Cabang'];
        $nomorTelepon = $_POST['nomorTelepon'];
        $namaKontak = $_POST['namaKontak'];
        $namaKepalaCabang = $_POST['namaKepalaCabang'];
        $jabatan = $_POST['jabatan'];
        $npwp = $_POST['npwp'];
        $sk = $_POST['sk'];
        $tanggalSk = $_POST['tanggalSk'];
        $namaFp = $_POST['namaFp'];
        $lokasi = $_POST['lokasi'];
        $kodeNomor = $_POST['kodeNomor'];
      
        $tanggalAktif = $_POST['tanggalAktif'];
       
        $namaPt = $_POST['namaPt'];
        $alamatPjk1 = $_POST['alamatPjk1'];
        $alamatPjk2 = $_POST['alamatPjk2'];
        $kodeSpm = $_POST['kodeSpm'];
        $plafonUnit = $_POST['plafonUnit'];


        

        $data = array(
            'n_cabang' => $namaCabang,
            'al1_cab' => $alamat1Cabang,
            'al2_cab' => $alamat2Cabang,
            'al3_cab' => $alamat3Cabang,
            'telp' => $nomorTelepon,
            'kontak' => $namaKontak,
            'n_kacab' => $namaKepalaCabang,
            'j_kacab' => $jabatan,
            'npwp' => $npwp,
            'sk' => $sk,
            'tgl_sk' => $tanggalSk,
            'nama_fp' => $namaFp,
            'lokasi' => $lokasi,
            'kode_nomor' => $kodeNomor,
            
            'tgl_aktif' => $tanggalAktif,
            'ttpbln' => 0,
            'n_pt' => $namaPt,
            'al_pjk' => $alamatPjk1,
            'al_pjk2' => $alamatPjk2,
            'kode_spm' => $kodeSpm,
            'plaf_unit' => $plafonUnit 
            
    );
     $this->Cabang_model->tambah_cabang('dbm003', $data);
     $query = $this->db->affected_rows();


if($query)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );
    
    echo json_encode($data);
} 
    }

 
    public function ajax_list(){

        date_default_timezone_set('Asia/Jakarta');
        $bulanAktifSekarang = date("Ym");
        if(isset($_POST['bulanAktif'])){

        
        $_SESSION['bulanAktif'] = $_POST['bulanAktif'];
        // var_dump($_SESSION['bulanAktif']);
        // die();
        }
        $list = $this->Cabang_model->get_datatables();
        $data = array();
        $total = 0;
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();

            $row[] = $no;
           // $row[] = $p->k_cabang;
            $row[] = $p->n_cabang;
            $row[] = $p->al1_cab;
            $row[] = $p->al2_cab;
            $row[] = $p->al3_cab;
            $row[] = $p->telp;
            $row[] = $p->kontak;
            $row[] = $p->n_kacab;
            $row[] = $p->j_kacab;
            $row[] = $p->npwp;
            $row[] = $p->sk;
            $row[] = $p->tgl_sk;
            $row[] = $p->nama_fp;
            $row[] = $p->lokasi;
            $row[] = $p->kode_nomor;
            
            $row[] = $p->tgl_aktif;
            $row[] = $p->ttpbln;
            $row[] = $p->n_pt;
            $row[] = $p->al_pjk;
            $row[] = $p->al_pjk2;
            $row[] = $p->kode_spm;
            $row[] = $p->plaf_unit;
           
            
            

                
           // $row[] = '<a href="javascript:void(0);" class="fas fa-edit" onclick="get_data_po('.$p->id.')" title="Ubah data PO" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-trash" onclick="hapus_po('.$p->id.')" title="Hapus data PO" style="color:black;"></a>';
            $row[] = '<a href="#!" class="fas fa-edit edit_cabang" data-id="' . $p->id . '"  title="Ubah data PO" style="color:black;"></a> | <a href="#!" class="fas fa-trash deleteCabang" data-id="' . $p->id . '" title="Hapus data PO" style="color:black;"></a>';
            
               
            
            $data[] = $row;
        }
        
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Cabang_model->count_all(),
                        "recordsFiltered" => $this->Cabang_model->count_filtered(),
                        "data" => $data,
                        );
        //output to json format
        echo json_encode($output);
    }

   

    function hapus_cabang(){
        $id = $_POST['id'];
        
        $this->Cabang_model->hapus_cabang($id);
        $query = $this->db->affected_rows();
        if($query==true)
        {
	    $data = array(
        'status'=>'success',
       
            );

         echo json_encode($data);
        }
        else
        {
         $data = array(
        'status'=>'failed',
      
    );

            echo json_encode($data);
    } 
    }


    function edit_cabang(){
        $id = $_POST['id'];
        $namaCabang2 = $_POST['namaCabang2'];
        $alamat1Cabang2 = $_POST['alamat1Cabang2'];
        $alamat2Cabang2 = $_POST['alamat2Cabang2'];
        $alamat3Cabang2 = $_POST['alamat3Cabang2'];
        $nomorTelepon2 = $_POST['nomorTelepon2'];
        $namaKontak2 = $_POST['namaKontak2'];
        $namaKepalaCabang2 = $_POST['namaKepalaCabang2'];
        $jabatan2 = $_POST['jabatan2'];
        $npwp2 = $_POST['npwp2'];
        $sk2 = $_POST['sk2'];
        $tanggalSk2 = $_POST['tanggalSk2'];
        $namaFp2 = $_POST['namaFp2'];
        $lokasi2 = $_POST['lokasi2'];
        $kodeNomor2 = $_POST['kodeNomor2'];
        
        $tanggalAktif2 = $_POST['tanggalAktif2'];
        
        $namaPt2 = $_POST['namaPt2'];
        $alamatPjk12 = $_POST['alamatPjk12'];
        $alamatPjk22 = $_POST['alamatPjk22'];
        $kodeSpm2 = $_POST['kodeSpm2'];
        $plafonUnit2 = $_POST['plafonUnit2'];

        $data = array(
            'n_cabang' => $namaCabang2,
            'al1_cab' => $alamat1Cabang2,
            'al2_cab' => $alamat2Cabang2,
            'al3_cab' => $alamat3Cabang2,
            'telp' => $nomorTelepon2,
            'kontak' => $namaKontak2,
            'n_kacab' => $namaKepalaCabang2,
            'j_kacab' => $jabatan2,
            'npwp' => $npwp2,
            'sk' => $sk2,
            'tgl_sk' => $tanggalSk2,
            'nama_fp' => $namaFp2,
            'lokasi' => $lokasi2,
            'kode_nomor' => $kodeNomor2,
            
            'tgl_aktif' => $tanggalAktif2,
            
            'n_pt' => $namaPt2,
            'al_pjk' => $alamatPjk12,
            'al_pjk2' => $alamatPjk22,
            'kode_spm' => $kodeSpm2,
            'plaf_unit' => $plafonUnit2 
            
    );
     $this->Cabang_model->edit_cabang($id, $data);
     $query = $this->db->affected_rows();

     


if($query)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );
    
    echo json_encode($data);
} 
    }


    }
