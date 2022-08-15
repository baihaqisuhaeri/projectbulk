<?php
require FCPATH . 'vendor/autoload.php';
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



    function get_unit_sj()
    {

        $unit_edit = $this->input->post("unit");
        // var_dump($unit_edit);
        // die();
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
            if ($unit_edit == null) {


                echo '<option value="' . $u->kode_unit . '">' . $u->nama_unit . '</option>';
            } else {
                if ($unit_edit == $u->kode_unit) {
                    echo '<option selected value="' . $u->kode_unit . '">' . $u->nama_unit . '</option>';
                } else {
                    echo '<option value="' . $u->kode_unit . '">' . $u->nama_unit . '</option>';
                }
            }
        }
    }

    public function ajax_list()
    {


        $list = $this->Input_sj_model->get_datatables();
        $data = array();
        $total = 0;
        $no = $_POST['start'];
        foreach ($list as $p) {
            $no++;
            $row = array();

            $row[] = $no;

            $row[] = $p->no_sj;
            $row[] = $p->n_cus;
            $row[] = $p->k_cus;
            $row[] = $p->alk_cus1;
            $row[] = $p->alk_cus2;
            $row[] = $p->alk_cus3;
            $row[] = $p->npwp;
            $row[] = $p->kd_unit;
            $row[] = $p->no_urutspm;
            $row[] = $p->tgl_sj;
            $row[] = $p->no_po;
            $row[] = $p->tgl_po;
            $row[] = $p->ppn_persen;
            if ($p->tk == "T") {
                $row[] = "Tunai";
            } else if ($p->tk == "K") {
                $row[] = "Kredit";
            }
            $no_mobil = explode("_", $p->no_mobil);
            $row[] = $no_mobil[0];
            $row[] = $p->n_sales;
            $row[] = $p->k_sales;
            $row[] = $p->unit_mkt;
            $row[] = $p->k_barang;
            $row[] = $p->qty_kirim;
            $row[] = $p->kg_kirim . "kg";
            $row[] = $p->ket;
            $row[] = $p->n_supl;
            $row[] = $p->no_faktur;
            $row[] = $p->no_segel;
            $row[] = $p->awl_presur;
            $row[] = $p->awl_suhu;
            $row[] = $p->awal;
            $row[] = $p->akhir;
            $row[] = $p->k_supl;







            $row[] = '<a href="#!" class="fas fa-edit edit_sj" data-no_sj="' . $p->no_sj . '"  title="Ubah Surat Jalan" style="color:black;"></a> | <a href="#!" class="fas fa-trash deleteSj" data-no_sj="' . $p->no_sj . '" title="Hapus Surat Jalan" style="color:black;"></a>';
            $row[] = '<button class="btn btn-primary btn-small btn-primary btn-rounded cetak_sj" type="button">Cetak</button>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Input_sj_model->count_all(),
            "recordsFiltered" => $this->Input_sj_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



    function hapus_sj()
    {
        $no_sj = $_POST['no_sj'];

        $this->Input_sj_model->hapus_sj($no_sj);
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
        $supir_unik = $namaSupir2 . "_" . $namaUnit2;


        $data = array(

            'n_sales' => $namaSupir2,
            'kd_unit' => $namaUnit2,
            'supir_unik' => $supir_unik


        );
        if ($this->Input_sj_model->check($supir_unik)) {
            $data = array(
                'status' => 'false',

            );
            echo json_encode($data);
        } else {


            $this->Input_sj_model->edit_supir($id, $data);
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


    function get_customer()
    {

        $kode_cus_edit = $this->input->post("kode_cus");
        $unit_edit = $this->input->post("unit_edit");

        $unit = $this->input->post("unitSj");

        if ($kode_cus_edit == null) {
            $customer = $this->db->query("select DISTINCT * from customer where unit = '$unit' and flag_aktif = '' order by n_cus asc")->result();
        } else {
            $customer = $this->db->query("select DISTINCT * from customer where unit = '$unit_edit' and flag_aktif = '' order by n_cus asc")->result();
        }


        if (empty($customer)) {
            echo '<option value="">Belum ada data</option>';
        } else {
            echo '<option value="">Nama Customer (NPWP)(Kode Customer)</option>';
        }

        foreach ($customer as $u) {
            if ($kode_cus_edit == null) {


                echo '<option value="' . $u->k_Cus . "_" . $u->n_cus . "_" . $u->al1_cus . "_" . $u->al2_cus . "_" . $u->al3_cus . "_" . $u->k_wilayah . "_" . $u->npwp . '">' . $u->n_cus . ' (' . $u->npwp . ')(' . $u->k_Cus . ')</option>';
            } else {
                if ($kode_cus_edit == $u->k_Cus) {
                    echo '<option selected value="' . $u->k_Cus . "_" . $u->n_cus . "_" . $u->al1_cus . "_" . $u->al2_cus . "_" . $u->al3_cus . "_" . $u->k_wilayah . "_" . $u->npwp . '">' . $u->n_cus . ' (' . $u->npwp . ')(' . $u->k_Cus . ')</option>';
                } else {
                    echo '<option value="' . $u->k_Cus . "_" . $u->n_cus . "_" . $u->al1_cus . "_" . $u->al2_cus . "_" . $u->al3_cus . "_" . $u->k_wilayah . "_" . $u->npwp . '">' . $u->n_cus . ' (' . $u->npwp . ')(' . $u->k_Cus . ')</option>';
                }
            }
        }
    }


    public function get_alamat_kirim()
    {

        $k_cus = $this->input->post("k_cus");
        $status_edit = $this->input->post("status_edit");
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




            if ($status_edit == null) {


                $row[] = '<button type="button" id="pilih_alamat_kirim_modal"  class="btn btn-info">Pilih</button>';
            } else {
                $row[] = '<button type="button" id="pilih_alamat_kirim_modal_2"  class="btn btn-info">Pilih</button>';
            }
            $row[] = '<a href="#!" class="fas fa-edit editAlamatKirim" data-id="' . $p->id . '"  title="Ubah Surat Jalan" style="color:black;"></a> | <a href="#!" class="fas fa-trash deleteAlamatKirim" data-id="' . $p->id . '" title="Hapus Surat Jalan" style="color:black;"></a>';

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



    function get_nama_customer()
    {
        $k_cus = $this->input->post("k_cus");
        $unit = $this->input->post("unitSj");
        $data = $this->Input_sj_model->get_nama_customer($unit, $k_cus);

        $output = array(

            "data" => $data,
        );
        //output to json format
        echo json_encode($data);
    }

    function tambah_alamat_baru()
    {

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
        $no_spm = $this->input->post("no_spm");
        //var_dump($kodeCustomer);
        // die();
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
            foreach ($spmVol as $spVol) {
                if ($sp->no_urutspm == $spVol->no_urutspm) {
                    //echo $vol_kirim_spm . " | ".$spVol->kg_kirim.". ";
                    $vol_kirim_spm = $vol_kirim_spm - $spVol->kg_kirim;
                }
            }
            if ($vol_kirim_spm > 0) {
                if ($sp->no_urutspm == $no_spm) {
                    echo '<option selected value="' . $sp->no_urutspm . '">' . $sp->no_spm . '</option>';
                } else {


                    echo '<option value="' . $sp->no_urutspm . '">' . $sp->no_spm . '</option>';
                }
            }
        }
    }

    function get_volume_spm()
    {

        $no_surat_jalan = $this->input->post("no_surat_jalan");
        $status_edit = $this->input->post("status_edit");

        $noUrutSpm = $this->input->post("noUrutSpm");
        //$data = $this->Input_sj_model->get_volume_spm($noUrutSpm);
        $data =  $this->db->query("SELECT * FROM `tb_spm` WHERE no_urutspm = '$noUrutSpm'")->result();
        if ($status_edit == null) {
            $dataSj = $this->db->query("SELECT * FROM `tb_sj` WHERE no_urutspm = '$noUrutSpm'")->result();
        } else {
            $dataSj = $this->db->query("SELECT * FROM `tb_sj` WHERE no_urutspm = '$noUrutSpm' and no_sj != '$no_surat_jalan'")->result();
        }


        // echo "<pre>";
        // print_r($data);
        // die();

        $volume_spm = 0;
        foreach ($data as $d) {
            $volume_spm = $d->volume_krm;
        }
        foreach ($dataSj as $dsj) {
            $volume_spm -= $dsj->kg_kirim;
        }

        $output = array(

            "volume_spm" => $volume_spm,
        );
        //output to json format
        //echo($volume_spm);

        echo json_encode($output);
    }




    function get_mobil_sj()
    {


        $m_unik = $this->input->post("mobil_unik");
        $status_edit = $this->input->post("status_edit");
        $unit_edit = explode("_", $m_unik);
        $unit_edit = $unit_edit[1];


        $unit = $this->input->post("unitSj");


        if ($status_edit == null) {
            $mobil = $this->Input_sj_model->get_mobil_sj($unit);
        } else {

            $mobil = $this->Input_sj_model->get_mobil_sj($unit_edit);
        }


        // die();

        if (empty($mobil)) {
            echo '<option value="">Belum ada data</option>';
        } else {
            echo '<option value="">Nama Mobil (Kode Mobil)</option>';
        }

        foreach ($mobil as $m) {
            if ($status_edit == null) {
                echo '<option value="' . $m->mobil_unik . '">' . $m->n_mobil . " (" . $m->k_mobil . ')</option>';
            } else {
                var_dump($m_unik);
                if ($m->mobil_unik == $m_unik) {
                    echo '<option selected value="' . $m->mobil_unik . '">' . $m->n_mobil . " (" . $m->k_mobil . ')</option>';
                } else {
                    echo '<option value="' . $m->mobil_unik . '">' . $m->n_mobil . " (" . $m->k_mobil . ')</option>';
                }
            }
        }
    }

    function get_supir_sj()
    {
        $k_sales = $this->input->post("k_sales");
        $status_edit = $this->input->post("status_edit");

        $unit = $this->input->post("unitSj");


        $supir = $this->Input_sj_model->get_supir_sj($unit);


        if (empty($supir)) {
            echo '<option value="">Belum ada data</option>';
        } else {
            echo '<option value="">Nama Supir</option>';
        }

        foreach ($supir as $s) {

            if ($status_edit == null) {
                echo '<option value="' . $s->supir_unik . "_" . $s->n_sales . '">' . $s->n_sales . '</option>';
            } else {
                if ($s->supir_unik == ($k_sales . "_" . $unit)) {
                    echo '<option selected value="' . $s->supir_unik . "_" . $s->n_sales . '">' . $s->n_sales . '</option>';
                } else {
                    echo '<option value="' . $s->supir_unik . "_" . $s->n_sales . '">' . $s->n_sales . '</option>';
                }
            }
        }
    }

    function get_barang_sj()
    {
        $k_barang = $this->input->post("k_barang");
        $status_edit = $this->input->post("status_edit");

        $unit = $this->input->post("unitSj");


        $barang = $this->Input_sj_model->get_barang_sj($unit);


        if (empty($barang)) {
            echo '<option value="">Belum ada data</option>';
        } else {
            echo '<option value="">Nama Barang (Kode Barang)</option>';
        }

        foreach ($barang as $b) {
            if ($status_edit == null) {
                echo '<option value="' . $b->k_barang . "_" . $b->k_div . "_" . $b->kode_berat . "_" . $b->h_jual . "_" . $b->kode_tim . '">' . $b->n_barang . " (" . $b->k_barang . ')</option>';
            } else {
                if ($b->k_barang == $k_barang) {
                    echo '<option selected value="' . $b->k_barang . "_" . $b->k_div . "_" . $b->kode_berat . "_" . $b->h_jual . "_" . $b->kode_tim . '">' . $b->n_barang . " (" . $b->k_barang . ')</option>';
                } else {
                    echo '<option value="' . $b->k_barang . "_" . $b->k_div . "_" . $b->kode_berat . "_" . $b->h_jual . "_" . $b->kode_tim . '">' . $b->n_barang . " (" . $b->k_barang . ')</option>';
                }
            }
        }
    }


    function get_unit_marketing()
    {

        $unit_mkt = $this->input->post('unit_mkt');
        $status_edit = $this->input->post('status_edit');


        $unit_marketing = $this->Input_sj_model->get_unit_marketing();


        if (empty($unit_marketing)) {
            echo '<option value="">Belum ada data</option>';
        } else {
            echo '<option value="">Nama Unit Marketing </option>';
        }

        foreach ($unit_marketing as $u) {
            if ($status_edit == null) {
                echo '<option value="' . $u->unit_mkt . '">' . $u->unit_mkt . '</option>';
            } else {
                if ($u->unit_mkt == $unit_mkt) {
                    echo '<option selected value="' . $u->unit_mkt . '">' . $u->unit_mkt . '</option>';
                } else {
                    echo '<option value="' . $u->unit_mkt . '">' . $u->unit_mkt . '</option>';
                }
            }
        }
    }

    function get_kg_barang()
    {
        $kode_barang = $this->input->post('kode_barang');

        $query = $this->Input_sj_model->get_kg_barang($kode_barang);



        echo json_encode($query);
    }


    function get_suplier()
    {
        $k_supl = $this->input->post("k_supl");
        $status_edit = $this->input->post("status_edit");

        $suplier = $this->Input_sj_model->get_suplier();

        //var_dump($k_supl);


        if (empty($suplier)) {
            echo '<option value="">Belum ada data</option>';
        } else {
            echo '<option value="">Nama Suplier </option>';
        }

        foreach ($suplier as $s) {
            if ($status_edit == null) {
                echo '<option value="' . $s->k_supl . "_" . $s->n_supl . '">' . $s->n_supl . '</option>';
            } else {
                if ($s->k_supl == $k_supl) {
                    echo '<option selected value="' . $s->k_supl . "_" . $s->n_supl . '">' . $s->n_supl . '</option>';
                } else {
                    echo '<option value="' . $s->k_supl . "_" . $s->n_supl . '">' . $s->n_supl . '</option>';
                }
            }
        }
    }

    function get_ppn()
    {


        $query = $this->Input_sj_model->get_ppn();


        echo json_encode($query);
    }

    function get_data_spm()
    {
        $noUrutSpm = $this->input->post("noUrutSpm");

        $query = $this->Input_sj_model->get_data_spm($noUrutSpm);

        echo json_encode($query);
    }


    public function tambah_sj()
    {

        date_default_timezone_set('Asia/Jakarta');
        $tgl_io = date("Y-m-d");




        $unitSj = $_POST['unitSj'];
        $no_sj = "S";
        $kode_nomor = "";
        $query_kode_nomor = $this->Input_sj_model->get_kode_nomor($unitSj);
        foreach ($query_kode_nomor as $qkn) {
            $kode_nomor = $qkn->kode_nomor;
        }
        $no_sj .= $kode_nomor . substr(date("Y"), 2) . date("m");
        //var_dump($no_sj);
        $query_last_sj = $this->Input_sj_model->get_last_sj($no_sj);
        // var_dump($query_last_sj == null);
        // die();
        if ($query_last_sj == null) {
            $urut = "001";
        } else {


            foreach ($query_last_sj as $ls) {
                $urut = substr($ls->no_sj, 7);

                if ($urut > 0 && $urut < 9) {
                    $urut = "00" . ($urut + 1);
                } else if ($urut >= 9 && $urut < 99) {
                    $urut = "0" . ($urut + 1);
                } else if ($urut >= 99 && $urut <= 999) {
                    $urut = $urut + 1;
                }
            }
            var_dump($urut);
        }
        $no_sj .= $urut;




        // var_dump($no_sj);
        // die();




        $nama_customer = $_POST['nama_customer'];
        $kode_customer = $_POST['kode_customer'];
        $al1_cus = $_POST['al1_cus'];
        $al2_cus = $_POST['al2_cus'];
        $al3_cus = $_POST['al3_cus'];
        $alamat_kirim1 = $_POST['alamat_kirim1'];
        $alamat_kirim2 = $_POST['alamat_kirim2'];
        $alamat_kirim3 = $_POST['alamat_kirim3'];
        $k_wilayah = $_POST['k_wilayah'];
        // echo $alamat_kirim1;
        // echo $al1_cus;
        // echo $al2_cus;
        // die();
        $k_altk = $_POST['k_altk'];
        $npwp = $_POST['npwp'];
        $npwp_krm = $_POST['npwp_krm'];


        $no_po = $_POST['no_po'];
        $tgl_po = $_POST['tgl_po'];
        $ppn = $_POST['ppn'];

        $no_spm = $_POST['no_spm'];
        $spm_brlk = $_POST['spm_brlk'];

        $tanggal_surat_jalan = $_POST['tanggal_surat_jalan'];
        $tk = $_POST['tk'];
        $no_kendaraan = $_POST['no_kendaraan'];
        $unit_marketing = $_POST['unit_marketing'];
        $nama_supir = $_POST['nama_supir'];
        $kode_supir = $_POST['kode_supir'];
        $kode_barang = $_POST['kode_barang'];
        $jumlah = $_POST['jumlah'];
        $kg_kirim = $_POST['kg_kirim'];
        $keterangan = $_POST['keterangan'];
        $k_supl = $_POST['k_supl'];
        $n_supl = $_POST['n_supl'];
        $no_faktur = $_POST['no_faktur'];
        $no_segel = $_POST['no_segel'];
        $pressure = $_POST['pressure'];
        $temperatur = $_POST['temperatur'];
        $nilai_persen_pengambilan = $_POST['nilai_persen_pengambilan'];
        $nilai_persen_berangkat = $_POST['nilai_persen_berangkat'];
        $data = array(
            'no_sj' => $no_sj,
            'kd_unit' => $unitSj,
            'n_cus' => $nama_customer,
            'k_cus' => $kode_customer,
            'al1_cus' => $al1_cus,
            'al2_cus' => $al2_cus,
            'al3_cus' => $al3_cus,

            'alk_cus1' => $alamat_kirim1,
            'alk_cus2' => $alamat_kirim2,
            'alk_cus3' => $alamat_kirim3,
            'k_wil' => $k_wilayah,
            'k_altk' => $k_altk,
            'npwp_krm' => $npwp_krm,
            'npwp' => $npwp,

            'no_po' => $no_po,
            'tgl_po' => $tgl_po,
            'ppn_persen' => $ppn,

            'no_urutspm' => $no_spm,
            'spm_brlk' => $spm_brlk,
            'no_urut' => $no_spm,
            'tgl_sj' => $tanggal_surat_jalan,
            'tk' => $tk,
            'no_mobil' => $no_kendaraan,
            'unit_mkt' => $unit_marketing,
            'n_sales' => $nama_supir,
            'k_sales' => $kode_supir,
            'k_barang' => $kode_barang,
            'qty_kirim' => $jumlah,
            'kg_kirim' => $kg_kirim,
            'ket' => $keterangan,
            'k_supl' => $k_supl,
            'n_supl' => $n_supl,
            'no_faktur' => $no_faktur,
            'no_segel' => $no_segel,
            'awl_presur' => $pressure,
            'awl_suhu' => $temperatur,
            'awal' => $nilai_persen_pengambilan,
            'akhir' => $nilai_persen_berangkat,

            'tgl_io' => $tgl_io,

        );

        $this->Input_sj_model->tambah_surat_sj($data);
        $query = $this->db->affected_rows();

        //var_dump($query);
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
        //var_dump($data);

    }




    function get_sj()
    {
        $no_sj = $this->input->post('no_sj');
        $data = $this->Input_sj_model->get_sj($no_sj);


        $output = array(

            "data" => $data,
        );
        //output to json format
        echo json_encode($data);
    }



    function edit_sj()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_edit = date("Y-m-d");
        $unitSj = $_POST['unitSj'];
        $no_sj = $_POST['no_sj'];
        $nama_customer = $_POST['nama_customer'];
        $kode_customer = $_POST['kode_customer'];
        $al1_cus = $_POST['al1_cus'];
        $al2_cus = $_POST['al2_cus'];
        $al3_cus = $_POST['al3_cus'];
        $alamat_kirim1 = $_POST['alamat_kirim1'];
        $alamat_kirim2 = $_POST['alamat_kirim2'];
        $alamat_kirim3 = $_POST['alamat_kirim3'];
        $k_wilayah = $_POST['k_wilayah'];
        $k_altk = $_POST['k_altk'];
        $npwp = $_POST['npwp'];
        $npwp_krm = $_POST['npwp_krm'];
        $no_po = $_POST['no_po'];
        $tgl_po = $_POST['tgl_po'];
        $ppn = $_POST['ppn'];
        $no_spm = $_POST['no_spm'];
        $spm_brlk = $_POST['spm_brlk'];
        $tanggal_surat_jalan = $_POST['tanggal_surat_jalan'];
        $tk = $_POST['tk'];
        $no_kendaraan = $_POST['no_kendaraan'];
        $unit_marketing = $_POST['unit_marketing'];
        $nama_supir = $_POST['nama_supir'];
        $kode_supir = $_POST['kode_supir'];
        $kode_barang = $_POST['kode_barang'];
        $jumlah = $_POST['jumlah'];
        $kg_kirim = $_POST['kg_kirim'];
        $keterangan = $_POST['keterangan'];
        $k_supl = $_POST['k_supl'];
        $n_supl = $_POST['n_supl'];
        $no_faktur = $_POST['no_faktur'];
        $no_segel = $_POST['no_segel'];
        $pressure = $_POST['pressure'];
        $temperatur = $_POST['temperatur'];
        $nilai_persen_pengambilan = $_POST['nilai_persen_pengambilan'];
        $nilai_persen_berangkat = $_POST['nilai_persen_berangkat'];

        $data = array(

            'no_sj' => $no_sj,
            'kd_unit' => $unitSj,
            'n_cus' => $nama_customer,
            'k_cus' => $kode_customer,
            'al1_cus' => $al1_cus,
            'al2_cus' => $al2_cus,
            'al3_cus' => $al3_cus,

            'alk_cus1' => $alamat_kirim1,
            'alk_cus2' => $alamat_kirim2,
            'alk_cus3' => $alamat_kirim3,
            'k_wil' => $k_wilayah,
            'k_altk' => $k_altk,
            'npwp_krm' => $npwp_krm,
            'npwp' => $npwp,

            'no_po' => $no_po,
            'tgl_po' => $tgl_po,
            'ppn_persen' => $ppn,

            'no_urutspm' => $no_spm,
            'spm_brlk' => $spm_brlk,
            'no_urut' => $no_spm,
            'tgl_sj' => $tanggal_surat_jalan,
            'tk' => $tk,
            'no_mobil' => $no_kendaraan,
            'unit_mkt' => $unit_marketing,
            'n_sales' => $nama_supir,
            'k_sales' => $kode_supir,
            'k_barang' => $kode_barang,
            'qty_kirim' => $jumlah,
            'kg_kirim' => $kg_kirim,
            'ket' => $keterangan,
            'k_supl' => $k_supl,
            'n_supl' => $n_supl,
            'no_faktur' => $no_faktur,
            'no_segel' => $no_segel,
            'awl_presur' => $pressure,
            'awl_suhu' => $temperatur,
            'awal' => $nilai_persen_pengambilan,
            'akhir' => $nilai_persen_berangkat,

            'tgl_update' => $tgl_edit,

        );




        $this->Input_sj_model->edit_sj($no_sj, $data);
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

    function hapus_alamat_kirim()
    {
        $id = $_POST['id'];

        $this->Input_sj_model->hapus_alamat_kirim($id);
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


    function edit_alamat_kirim()
    {

        $id_alamat_edit = $_POST['id_alamat_edit'];
        $npwp_edit = $_POST['npwp_edit'];
        $alamat_kirim1_edit = $_POST['alamat_kirim1_edit'];
        $alamat_kirim2_edit = $_POST['alamat_kirim2_edit'];
        $alamat_kirim3_edit = $_POST['alamat_kirim3_edit'];



        $data = array(


            'npwp' => $npwp_edit,
            'alk_cus1' => $alamat_kirim1_edit,
            'alk_cus2' => $alamat_kirim2_edit,
            'alk_cus3' => $alamat_kirim3_edit,
        );




        $this->Input_sj_model->edit_alamat_kirim($id_alamat_edit, $data);
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

    function print()
    {
        $no_sj = $_POST['cetak_no_sj'];
        $tes = "tes";
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<p style="margin-left: 580px; padding-top: -30px; line-height: 0.4;font-size: 12px;">31-05-2022</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">' . $no_sj . '</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">B4532SMK</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">00032</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">segel12</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">PO2</p>');

        $mpdf->WriteHTML('<p style="margin-left: 20px; font-size: 12px;"><b>PT.BAYER INDONESIA TBK </b></p>');
        $mpdf->WriteHTML('<p style="margin-left: 20px; font-size: 12px;">JL.JEND SUDIRMAN KAV 10-11 JAKARTA GD.MID PLAZA LT.14-16, JAKARTA</p>');
        $mpdf->WriteHTML('<br><br><br>');
        $mpdf->WriteHTML('<p style="margin-left: -25px; font-size: 12px;">1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        ODOURLESS TR 50 KG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 100</p>');

        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">15</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">20</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">5</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">10</p>');
        $mpdf->WriteHTML('<br>');
        $mpdf->WriteHTML('<p style="margin-left: 25px; font-size: 12px;">KET2</p>');


        $mpdf->Output();
    }
}
