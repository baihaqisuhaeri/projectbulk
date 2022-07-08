<?php

class Input extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        if(!isset($_SESSION['nama'])){
            redirect('Login');
        }
        
        $this->load->model('Input_model');

    }
    
    function index(){
        
        $this->load->view("Input_view");
        //number_format($data_customer->skbdn, 0, ".", ",");
    }
    
    function get_nama_unit(){
        
        $unit = $this->input->post('unit');
        $data_unit = $this->db->query("select * from tb_unit where kd_unit = '$unit'")->row();
        
        $data['unit'] = $data_unit->nm_unit;
        
        echo json_encode($data);
        
    }
            
    function get_unit(){
        
        $daftar_unit = "";
        $unit_akses = $this->db->query("select * from hak_akses where nama_user = '". $_SESSION['nama']."' ")->result();            
        foreach ($unit_akses as $unit){
            $daftar_unit .= " OR kd_unit = '$unit->kode_unit'";
        }
        $daftar_unit = substr($daftar_unit, 4);
        
        $unit = $this->db->query("select * from tb_unit where (".$daftar_unit.") order by nm_unit asc ")->result();        
        
        if(empty($unit)){
            echo '<option value="kosong">Belum ada data</option>';
        }else{
            echo '<option value="">Pilih Unit</option>';
        }
        
        foreach ($unit as $u){
            echo '<option value="'.$u->kd_unit.'">'.$u->nm_unit.'</option>';
        }
                
    }
    
    function input_customer(){
        
        date_default_timezone_set('Asia/Jakarta');
        
        $tipe_cus = $this->input->post('tipe_cus');
        $nama_customer = $this->input->post('nama_customer');
        $alamat_customer = $this->input->post('alamat_customer');
        $alamat_pengiriman = $this->input->post('alamat_pengiriman');
        $alamat_fp1 = $this->input->post('alamat_fp1');
        $alamat_fp2 = $this->input->post('alamat_fp2');
        $alamat_fp3 = $this->input->post('alamat_fp3');
        
        $npwp = $this->input->post('npwp');
        $ktp_pemilik = $this->input->post('ktp_pemilik');
        $no_telp = $this->input->post('no_telp');
        $no_hp_pemilik = $this->input->post('no_hp_pemilik');
        $kontak_person = $this->input->post('kontak_person');
        $jabatan_kontak_person = $this->input->post('jabatan_kontak_person');
        $credit_term = $this->input->post('credit_term');
        $cara_pembayaran = $this->input->post('cara_pembayaran');
        $nilai_plafon = str_replace(",", "", $this->input->post('nilai_plafon'));
        $status_blacklist = $this->input->post('status_blacklist');
        $kode_global = $this->input->post('kode_global');
        $kode_grup_customer = $this->input->post('kode_grup_customer');
        $ttk = $this->input->post('ttk');
        $kelompok_customer = $this->input->post('kelompok_customer');
        $unit = $this->input->post('unit');
        $nama_unit = $this->input->post('nama_unit');
        $jenis_produk = $this->input->post('jenis_produk');
        $cabang = $this->input->post('cabang');
        $wilayah_customer = $this->input->post('wilayah_customer');
        $akta_pt = $this->input->post('akta_pt');
        $tgl_akta = $this->input->post('tgl_akta_pendirian_pt');
        
        $nib = $this->input->post('nib');
        $tgl_nib = $this->input->post('tgl_nib');
        $sk_kemenhumkam = $this->input->post('sk_kemenhumkam');
        $nama_direksi = $this->input->post('nama_direksi');
        $merk_dagang = $this->input->post('merk_dagang');
        $kebutuhan_volume = str_replace(",", "", $this->input->post('kebutuhan_volume'));
        
        if($kebutuhan_volume == ""){
            $satuan_volume = "";
        }else{
            $satuan_volume = $this->input->post('satuan_volume');
        }
        
        $norek_perusahaan = $this->input->post('norek_perusahaan');
        $nama_bank_rekening = $this->input->post('nama_bank_rekening');
        $web_perusahaan = $this->input->post('web_perusahaan');
        $cus_gabung = $this->input->post('cus_gabung');
        $pakta = $this->input->post('pakta');
        $akta_pengurus = $this->input->post('akta_pengurus');
        $tgl_pengurus = $this->input->post('tgl_pengurus');
        $keterangan = $this->input->post('keterangan');
        $guna_kon = $this->input->post('guna_kon');
        
        if($jenis_produk != "" && $unit != "" && $tipe_cus != ""){
            $kode_customer = $this->Input_model->get_k_cus($jenis_produk,$unit,$tipe_cus);
        }
        
        // validasi seadanya :v\
        if ($tipe_cus == '') {
            $data['error']['tipe_cus'] = 'Tipe customer harus dipilih!';
        }
        
        if($tipe_cus == '*'){
            if ($nama_customer == '') {
                $data['error']['nama_customer'] = 'Nama customer tidak boleh kosong!';
            }

            if ($alamat_customer == '') {
                $data['error']['alamat_customer'] = 'Alamat customer tidak boleh kosong!';
            }

            if ($alamat_pengiriman == '') {
                $data['error']['alamat_pengiriman'] = 'Alamat pengiriman tidak boleh kosong!';
            }

            if ($alamat_fp1 == '' || $alamat_fp2 == '' || $alamat_fp3 == '') {
                $data['error']['alamat_fp'] = 'Alamat FP tidak boleh kosong!';
            }

            if ($unit == '') {
                $data['error']['unit'] = 'Unit tidak boleh kosong!';
            }

            if ($nama_unit == '') {
                $data['error']['nama_unit'] = 'Nama unit tidak boleh kosong!';
            }

            if ($no_telp == '') {
                $data['error']['no_telp'] = 'No telp tidak boleh kosong!';
            }

            if ($kontak_person == '') {
                $data['error']['kontak_person'] = 'Kontak person tidak boleh kosong!';
            }
        }else if($tipe_cus == "-"){
            if ($nama_customer == '') {
                $data['error']['nama_customer'] = 'Nama customer tidak boleh kosong!';
            }

            if ($alamat_customer == '') {
                $data['error']['alamat_customer'] = 'Alamat customer tidak boleh kosong!';
            }

            if ($alamat_pengiriman == '') {
                $data['error']['alamat_pengiriman'] = 'Alamat pengiriman tidak boleh kosong!';
            }

            if ($alamat_fp1 == '' || $alamat_fp2 == '' || $alamat_fp3 == '') {
                $data['error']['alamat_fp'] = 'Alamat FP tidak boleh kosong!';
            }

            if ($npwp == '') {
                $data['error']['npwp'] = 'NPWP tidak boleh kosong!';
            }

            if ($cara_pembayaran == '') {
                $data['error']['cara_pembayaran'] = 'Cara pembayaran tidak boleh kosong!';
            }

            if ($status_blacklist == '') {
                $data['error']['status_blacklist'] = 'Status blacklist tidak boleh kosong!';
            }

            if ($kode_global == '') {
                $data['error']['kode_global'] = 'Kode jatra tidak boleh kosong!';
            }

            if ($kode_grup_customer == '') {
                $data['error']['kode_grup_customer'] = 'Kode grup customer tidak boleh kosong!';
            }

            if ($ttk == '') {
                $data['error']['ttk'] = 'TTK tidak boleh kosong!';
            }

            if ($unit == '') {
                $data['error']['unit'] = 'Unit tidak boleh kosong!';
            }

            if ($nama_unit == '') {
                $data['error']['nama_unit'] = 'Nama unit tidak boleh kosong!';
            }

            if ($jenis_produk == '') {
                $data['error']['jenis_produk'] = 'Jenis produk tidak boleh kosong!';
            }

            if ($no_telp == '') {
                $data['error']['no_telp'] = 'No telp tidak boleh kosong!';
            }

            if ($kontak_person == '') {
                $data['error']['kontak_person'] = 'Kontak person tidak boleh kosong!';
            }
        }
                
        if (empty($data['error'])) {
            
            if($tipe_cus == "-"){
                $tipe_cus = "";
            }
            
            $input = array(
                    
                    'k_Cus' => $kode_customer,                    
                    'n_cus' => $nama_customer,                    
                    'al1_cus' => $alamat_fp1,
                    'al2_cus' => $alamat_fp2,
                    'al3_cus' => $alamat_fp3,
                    'al_cus' => $alamat_customer,
                    'al_kirim' => $alamat_pengiriman,
                    'npwp' => $npwp,                    
                    'ktp' => $ktp_pemilik,                    
                    'telp' => $no_telp,                    
                    'no_hp' => $no_hp_pemilik,                    
                    'kontak_per' => $kontak_person,                    
                    'jabkon_per' => $jabatan_kontak_person,                    
                    'credit_ter' => $credit_term,                    
                    'tk' => $cara_pembayaran,                    
                    'plaf_aju' => $nilai_plafon,                    
                    'blacklist' => $status_blacklist,                    
                    'kcus_jti' => $kode_global,                    
                    'kd_group' => $kode_grup_customer,                    
                    'ttk' => $ttk,                    
                    'kel_cus' => $kelompok_customer,                    
                    'unit' => $unit,                    
                    'n_unit' => $nama_unit,                    
                    'jns_Produk' => $jenis_produk,                    
                    'nmcab' => $cabang,                    
                    'n_wilayah' =>$wilayah_customer,                    
                    'akta_pt' => $akta_pt,
                    'nib' => $nib,                   
                    'tgl_nib' => $tgl_nib,
                    'sk_humkam' => $sk_kemenhumkam,                    
                    'n_dir' => $nama_direksi,
                    'merk_dgang' => $merk_dagang,
                    'vol' => $kebutuhan_volume,
                    'satuan_vol' => $satuan_volume,
                    'rek_per' => $norek_perusahaan,                    
                    'web_per' => $web_perusahaan,
                    'tgl_aktapt' => $tgl_akta,
                    'bank_rek' => $nama_bank_rekening,
                    'cus_gabung' => $cus_gabung,
                    'pakta' => $pakta,
                    'akta_peng' => $akta_pengurus,
                    'tgl_peng' => $tgl_pengurus,
                    'ket' => nl2br($keterangan),
                    'guna_kon' => $guna_kon,
                    'tgl_upload' => date('Y-m-d H:i:s'),
                    'prospek' => $tipe_cus
                );
            $this->db->insert('customer',$input);
            
            $input_hist = array(
                    
                    'k_Cus' => $kode_customer,                    
                    'n_cus' => $nama_customer,                    
                    'al1_cus' => $alamat_fp1,
                    'al2_cus' => $alamat_fp2,
                    'al3_cus' => $alamat_fp3,
                    'al_cus' => $alamat_customer,
                    'al_kirim' => $alamat_pengiriman,
                    'npwp' => $npwp,                    
                    'ktp' => $ktp_pemilik,                    
                    'telp' => $no_telp,                    
                    'no_hp' => $no_hp_pemilik,                    
                    'kontak_per' => $kontak_person,                    
                    'jabkon_per' => $jabatan_kontak_person,                    
                    'credit_ter' => $credit_term,                    
                    'tk' => $cara_pembayaran,                    
                    'plaf_aju' => $nilai_plafon,                    
                    'blacklist' => $status_blacklist,                    
                    'kcus_jti' => $kode_global,                    
                    'kd_group' => $kode_grup_customer,                    
                    'ttk' => $ttk,                    
                    'kel_cus' => $kelompok_customer,                    
                    'unit' => $unit,                    
                    'n_unit' => $nama_unit,                    
                    'jns_Produk' => $jenis_produk,                    
                    'nmcab' => $cabang,                    
                    'n_wilayah' =>$wilayah_customer,                    
                    'akta_pt' => $akta_pt,
                    'nib' => $nib,                   
                    'tgl_nib' => $tgl_nib,
                    'sk_humkam' => $sk_kemenhumkam,                    
                    'n_dir' => $nama_direksi,
                    'merk_dgang' => $merk_dagang,
                    'vol' => $kebutuhan_volume,
                    'satuan_vol' => $satuan_volume,
                    'rek_per' => $norek_perusahaan,                    
                    'web_per' => $web_perusahaan,
                    'tgl_aktapt' => $tgl_akta,
                    'bank_rek' => $nama_bank_rekening,
                    'cus_gabung' => $cus_gabung,
                    'pakta' => $pakta,
                    'akta_peng' => $akta_pengurus,
                    'tgl_peng' => $tgl_pengurus,
                    'ket' => nl2br($keterangan),
                    'guna_kon' => $guna_kon,
                    'tgl_upload' => date('Y-m-d H:i:s'),
                    'prospek' => $tipe_cus,
                    'pelaku' => $_SESSION['nama'],
                    'kapan' => date('Y-m-d H:i:s'),
                    'ngapain' => "Membuat customer baru"
                );
            $this->db->insert('customer_hist',$input_hist);
            
            $data['hasil'] = 'sukses_tambah';
                        
        } else {
            // jika validasi gagal
            $data['hasil'] = 'gagal';
        }

        // tampilkan response dalam format json
        echo json_encode($data);
        
    }
    
    function keluar(){
        
        //histori
        date_default_timezone_set('Asia/Jakarta');
        $hist = array(
                'id_user' => $_SESSION['id'],
                'nama_user' => $_SESSION['nama'],
                'role' => $_SESSION['role'],
                'aksi' => "Keluar Web",
                'waktu' => date('Y-m-d H:i:s')
            );
        $this->db->insert('tb_history',$hist);
        //------
        
        $this->session->sess_destroy();
        redirect('masuk');
        
    }
    
}