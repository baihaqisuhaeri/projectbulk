<?php

class Kontrak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['nama'])) {
            redirect('Login');
        }

        $this->load->model('Kontrak_model');
    }

    function index()
    {

        $this->load->view("Kontrak_view");
        //number_format($data_customer->skbdn, 0, ".", ",");
    }

    function get_customer()
    {

        $data = $this->db->query("select distinct n_cus,unit,k_Cus,jns_Produk,n_jobsite,tk from customer where RIGHT(k_Cus, 6) != '000000' and flag_aktif = '' and status = 'aktif' and unit = 'GBU' and jns_Produk = 'ASPAL' ORDER BY n_cus asc")->result();

        echo '<option value="">Nama Customer</option>';
        foreach ($data as $d) {
            echo '<option value="' . $d->k_Cus . '">' . $d->n_cus . ' (' . $d->k_Cus . ') (' . $d->jns_Produk . ')</option>';
        }

        echo json_encode($output);
    }

    function get_cus()
    {

        $unit = $this->uri->segment(3);
        $jenis_produk = $this->uri->segment(4);
        $output = "";

        $data = $this->db->query("select distinct n_cus,unit,k_Cus,jns_Produk,n_jobsite,tk from customer where RIGHT(k_Cus, 6) != '000000' and flag_aktif = '' and status = 'aktif' and unit = '" . $unit . "' and jns_Produk = '" . $jenis_produk . "' and guna_kon = 'Ya' ORDER BY n_cus asc")->result();

        $output .= '<option value="">Nama Customer</option>';
        foreach ($data as $d) {
            $output .= '<option value="' . $d->k_Cus . '">' . $d->n_cus . ' (' . $d->k_Cus . ') (' . $d->jns_Produk . ')</option>';
        }

        echo json_encode($output);
    }

    function get_unit()
    {

        $daftar_unit = "";
        $unit_akses = $this->db->query("select * from hak_akses where nama_user = '" . $_SESSION['nama'] . "' ")->result();
        foreach ($unit_akses as $unit) {
            $daftar_unit .= " OR kd_unit = '$unit->kode_unit'";
        }
        $daftar_unit = substr($daftar_unit, 4);

        $unit = $this->db->query("select * from tb_unit where (" . $daftar_unit . ") order by nm_unit asc ")->result();

        if (empty($unit)) {
            echo '<option value="kosong">Belum ada data</option>';
        } else {
            echo '<option value="">Pilih Unit</option>';
        }

        foreach ($unit as $u) {
            echo '<option value="' . $u->kd_unit . '">' . $u->nm_unit . '</option>';
        }
    }

    function cek_selesai()
    {

        date_default_timezone_set('Asia/Jakarta');

        $waktu = date('Y-m');
        $get_data = $this->db->query("select * from kontrak where per2 like '%" . $waktu . "%'")->result();

        foreach ($get_data as $d) {

            if ($d->per2 >= $waktu . "-02") {

                $input = array(
                    'status' => "y"
                );
                $this->db->where('id', $d->id);
                $this->db->update('kontrak', $input);
            }
        }
    }

    function input_kontrak()
    {

        date_default_timezone_set('Asia/Jakarta');

        $id = $this->input->post('id_kontrak');
        $tgl_periode1 = $this->input->post('tgl_periode1');
        $tgl_periode2 = $this->input->post('tgl_periode2');
        $no_kontrak = $this->input->post('no_kontrak');
        $unit = $this->input->post('unit');
        $jenis_produk = $this->input->post('jenis_produk');
        $k_cus = $this->input->post('nama_customer');

        // validasi seadanya :v\
        if ($unit == '') {
            $data['error']['unit'] = 'Unit tidak boleh kosong!';
        }

        if ($jenis_produk == '') {
            $data['error']['jenis_produk'] = 'Jenis produk tidak boleh kosong!';
        }

        if ($k_cus == '') {
            $data['error']['nama_customer'] = 'Nama customer tidak boleh kosong!';
        }

        if ($no_kontrak == '') {
            $data['error']['no_kontrak'] = 'No kontrak tidak boleh kosong!';
        }

        if ($tgl_periode1 == '') {
            $data['error']['tgl_periode1'] = 'Tgl periode 1 tidak boleh kosong!';
        }

        if ($tgl_periode2 == '') {
            $data['error']['tgl_periode2'] = 'Tgl periode 2 tidak boleh kosong!';
        }

        if ($tgl_periode1 != '' && $tgl_periode2 != '') {
            if ($tgl_periode1 > $tgl_periode2) {
                $data['error']['tgl_periode1'] = 'Tgl periode 1 tidak boleh lebih besar dari tgl periode 2!';
            }
        }

        if (empty($data['error'])) {

            $customer = $this->db->query("select * from customer where k_Cus = '$k_cus'")->row();

            if ($id == "") {
                $input = array(
                    'no_kontrak' => $no_kontrak,
                    'per1' => $tgl_periode1,
                    'per2' => $tgl_periode2,
                    'status' => "x",
                    'k_cus' => $k_cus,
                    'n_cus' => $customer->n_cus,
                    'unit' => $unit,
                    'jns_produk' => $jenis_produk
                );
                $this->db->insert('kontrak', $input);

                //histori
                $hist = array(
                    'id_user' => $_SESSION['id'],
                    'nama_user' => $_SESSION['nama'],
                    'role' => $_SESSION['role'],
                    'aksi' => "Input data kontrak " . $no_kontrak,
                    'waktu' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tb_history', $hist);
                //-------------------------

                $data['hasil'] = 'sukses_tambah';
            } else {
                $input = array(
                    'no_kontrak' => $no_kontrak,
                    'per1' => $tgl_periode1,
                    'per2' => $tgl_periode2,
                    'status' => "x",
                    'k_cus' => $k_cus,
                    'n_cus' => $customer->n_cus,
                    'unit' => $unit,
                    'jns_produk' => $jenis_produk
                );
                $this->db->where('id', $id);
                $this->db->update('kontrak', $input);

                //histori
                $hist = array(
                    'id_user' => $_SESSION['id'],
                    'nama_user' => $_SESSION['nama'],
                    'role' => $_SESSION['role'],
                    'aksi' => "Ubah data kontrak | " . $id . " | " . $no_kontrak,
                    'waktu' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tb_history', $hist);
                //-------------------------

                $data['hasil'] = 'sukses_ubah';
            }
        } else {
            // jika validasi gagal
            $data['hasil'] = 'gagal';
        }

        // tampilkan response dalam format json
        echo json_encode($data);
    }

    function hapus_data_kontrak()
    {
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->uri->segment(3);

        $data_kontrak = $this->db->query("select * from kontrak where id = $id")->row();

        if (empty($data_kontrak)) {

            $data['hasil'] = "dihapus";
        } else if (!empty($data_kontrak)) {

            //histori
            $hist = array(
                'id_user' => $_SESSION['id'],
                'nama_user' => $_SESSION['nama'],
                'role' => $_SESSION['role'],
                'aksi' => "Menghapus kontrak : " . $id . " | " . $data_kontrak->no_kontrak,
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('tb_history', $hist);
            //-------------------------

            $this->db->query("delete from kontrak where id = $id");

            $data['hasil'] = "sukses";
        }

        echo json_encode($data);
    }

    function get_data_kontrak()
    {

        $id = $this->uri->segment(3);
        $kontrak = $this->db->query("select * from kontrak where id = $id")->row();

        if (empty($kontrak)) {

            $data['hasil'] = "dihapus";
        } else if (!empty($kontrak)) {

            $data['hasil'] = "ada";

            $data['no_kontrak'] = $kontrak->no_kontrak;
            $data['per1'] = $kontrak->per1;
            $data['per2'] = $kontrak->per2;
            $data['unit'] = $kontrak->unit;
            $data['nama_customer'] = $kontrak->k_cus;
            $data['jenis_produk'] = $kontrak->jns_produk;
        }

        echo json_encode($data);
    }

    function keluar()
    {

        //histori
        date_default_timezone_set('Asia/Jakarta');
        $hist = array(
            'id_user' => $_SESSION['id'],
            'nama_user' => $_SESSION['nama'],
            'role' => $_SESSION['role'],
            'aksi' => "Keluar Web",
            'waktu' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tb_history', $hist);
        //------

        $this->session->sess_destroy();
        redirect('masuk');
    }

    public function ajax_list()
    {

        $list = $this->Kontrak_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();

            $nm_unit = $this->db->query("select * from tb_unit where kd_unit = '$l->unit'")->row();

            $row[] = $no;
            $row[] = $l->no_kontrak;
            $row[] = $l->n_cus . "(" . $l->k_cus . ")";
            $row[] = $nm_unit->nm_unit . " (" . $l->unit . ")";
            $row[] = $l->jns_produk;
            $row[] = $l->per1;
            $row[] = $l->per2;

            if ($l->status == "x") {
                $row[] = "Belum Selesai";
            } else {
                $row[] = "Selesai";
            }

            $row[] = '<a href="javascript:void(0);" class="fas fa-edit" onclick="ubah_kontrak(' . $l->id . ')" title="Ubah kontrak" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-trash" onclick="hapus_kontrak(' . $l->id . ')" title="Hapus kontrak" style="color:black;"></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Kontrak_model->count_all(),
            "recordsFiltered" => $this->Kontrak_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
