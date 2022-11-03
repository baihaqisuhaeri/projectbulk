<?php

class Data extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        error_reporting(0);
        $this->load->library("session");
        $this->load->helper('url');
        if(!isset($_SESSION['nama'])){
            redirect('Login');
        }
        
        $this->load->model('Data_model');

    }
    
    function index(){
        
        $this->load->view("Data_view");
        //number_format($data_customer->skbdn, 0, ".", ",");
    }
    
    function status(){
        
        date_default_timezone_set('Asia/Jakarta');
        
        $id = $this->input->post('id_status');
        $status = $this->input->post('status');
        
        $cus = $this->db->query("select * from customer where id = $id")->row();
        
        if($status == "non aktif" && ($cus->piutang + $cus->spb_blmkwt) == 0){
            
            //update           
            $inputan = array(
                'status' => $status
            );
            $this->db->where('id',$id);
            $this->db->update('customer',$inputan);

            $hasil['hasil'] = 'sukses_tambah';
            
        }else{
            
            $hasil['hasil'] = 'gagal';
            
        }
                
        if($status == "aktif"){
            
            //update           
            $inputan = array(
                'status' => $status
            );
            $this->db->where('id',$id);
            $this->db->update('customer',$inputan);

            $hasil['hasil'] = 'sukses_tambah';
            
        }
        
        echo json_encode($hasil);

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
    
    function get_data_customer(){
        
        $id = $this->uri->segment(3);
        $customer = $this->db->query("select * from customer where id = $id")->row();
                
        if(empty($customer)){
            
            $data['hasil'] = "dihapus";
            
        }else if(!empty($customer)){
            
            if($customer->prospek == ""){
                $tipe_cus = "-";
            }else{
                $tipe_cus = $customer->prospek;
            }
            
            if (substr($customer->k_Cus, 0, 2) == "AS") { 
                $data['asal'] = "web";
            }else if (substr($customer->k_Cus, 0, 2) == "TB") { 
                $data['asal'] = "web";
            }else if (substr($customer->k_Cus, 0, 2) == "BL") { 
                $data['asal'] = "web";
            }else if (substr($customer->k_Cus, 0, 2) == "AB") { 
                $data['asal'] = "web";
            }else if (substr($customer->k_Cus, 0, 2) == "SB") { 
                $data['asal'] = "web";
            }else{
                $data['asal'] = "vfp";
                
                if(!empty($customer) && $customer->prospek != "*"){
                    $customer2 = $this->db->query("select * from customer_hist where k_Cus = '$customer->k_Cus' and unit = '$customer->unit' and jns_Produk = '$customer->jns_Produk' order by id asc")->row();
                    
                    if(!empty($customer2)){
                        
                        if($customer2->prospek == ""){
                            $tipe_cus2 = "-";
                        }else{
                            $tipe_cus2 = $customer2->prospek;
                        }
                        
                        $data['tipe_cus2'] = $tipe_cus2;
                        $data['kode_customer2'] = $customer2->k_Cus;
                        $data['nama_customer2'] = $customer2->n_cus;
                        $data['alamat_customer2'] = $customer2->al_cus;
                        $data['npwp2'] = $customer2->npwp;
                        $data['ktp2'] = $customer2->ktp;
                        $data['no_telp2'] = $customer2->telp;
                        $data['no_hp_pemilik2'] = $customer2->no_hp;
                        $data['kontak_person2'] = $customer2->kontak_per;
                        $data['jabatan_kontak_person2'] = $customer2->jabkon_per;
                        $data['credit_term2'] = $customer2->credit_ter;
                        $data['cara_pembayaran2'] = $customer2->tk;
                        $data['nilai_plafon2'] = number_format($customer2->plaf_aju, 2, ".", ",");
                        $data['status_blacklist2'] = $customer2->blacklist;
                        $data['kode_global2'] = $customer2->kcus_jti;
                        $data['kode_grup_customer2'] = $customer2->kd_group;
                        $data['ttk2'] = $customer2->ttk;
                        $data['kelompok_customer2'] = $customer2->kel_cus;
                        $data['unit2'] = $customer2->unit;
                        $data['nama_unit2'] = $customer2->n_unit;
                        $data['jenis_produk2'] = $customer2->jns_Produk;
                        $data['cabang2'] = $customer2->nmcab;
                        $data['wilayah_customer2'] = $customer2->n_wilayah;
                        $data['akta_pt2'] = $customer2->akta_pt;
                        $data['nib2'] = $customer2->nib;
                        $data['tgl_nib2'] = $customer2->tgl_nib;
                        $data['sk_kemenhumkam2'] = $customer2->sk_humkam;
                        $data['nama_direksi2'] = $customer2->n_dir;
                        $data['norek_perusahaan2'] = $customer2->rek_per;
                        $data['web_perusahaan2'] = $customer2->web_per;
                        $data['merk_dagang2'] = $customer2->merk_dgang;
                        $data['vol2'] = number_format($customer2->vol, 2, ".", ",");
                        $data['satuan_vol2'] = $customer2->satuan_vol;
                        $data['alamat_pengiriman2'] = $customer2->al_kirim;
                        $data['alamat_fp12'] = $customer2->al1_cus;
                        $data['alamat_fp22'] = $customer2->al2_cus;
                        $data['alamat_fp32'] = $customer2->al3_cus;
                        $data['tgl_akta2'] = $customer2->tgl_aktapt;
                        $data['bank_rek2'] = $customer2->bank_rek;
                        $data['cus_gabung2'] = $customer2->cus_gabung;
                        $data['pakta2'] = $customer2->pakta;
                        $data['akta_peng2'] = $customer2->akta_peng;
                        $data['tgl_peng2'] = $customer2->tgl_peng;
                        $data['ket2'] = $customer2->ket;
                        $data['guna_kon2'] = $customer2->guna_kon;                        
                    }
                    
                }
                
            }
            
            $data['hasil'] = "ada";
            $data['id'] = $id;
            $data['tipe_cus'] = $tipe_cus;
            $data['kode_customer'] = $customer->k_Cus;
            $data['nama_customer'] = $customer->n_cus;
            $data['alamat_customer'] = $customer->al_cus;
            $data['npwp'] = $customer->npwp;
            $data['ktp'] = $customer->ktp;
            $data['no_telp'] = $customer->telp;
            $data['no_hp_pemilik'] = $customer->no_hp;
            $data['kontak_person'] = $customer->kontak_per;
            $data['jabatan_kontak_person'] = $customer->jabkon_per;
            $data['credit_term'] = $customer->credit_ter;
            $data['cara_pembayaran'] = $customer->tk;
            $data['nilai_plafon'] = number_format($customer->plaf_aju, 2, ".", ",");
            $data['status_blacklist'] = $customer->blacklist;
            $data['kode_global'] = $customer->kcus_jti;
            $data['kode_grup_customer'] = $customer->kd_group;
            $data['ttk'] = $customer->ttk;
            $data['kelompok_customer'] = $customer->kel_cus;
            $data['unit'] = $customer->unit;
            $data['nama_unit'] = $customer->n_unit;
            $data['jenis_produk'] = $customer->jns_Produk;
            $data['cabang'] = $customer->nmcab;
            $data['wilayah_customer'] = $customer->n_wilayah;
            $data['akta_pt'] = $customer->akta_pt;
            $data['nib'] = $customer->nib;
            $data['tgl_nib'] = $customer->tgl_nib;
            $data['sk_kemenhumkam'] = $customer->sk_humkam;
            $data['nama_direksi'] = $customer->n_dir;
            $data['norek_perusahaan'] = $customer->rek_per;
            $data['web_perusahaan'] = $customer->web_per;
            $data['merk_dagang'] = $customer->merk_dgang;
            $data['vol'] = number_format($customer->vol, 2, ".", ",");
            $data['satuan_vol'] = $customer->satuan_vol;
            $data['alamat_pengiriman'] = $customer->al_kirim;
            $data['alamat_fp1'] = $customer->al1_cus;
            $data['alamat_fp2'] = $customer->al2_cus;
            $data['alamat_fp3'] = $customer->al3_cus;
            $data['tgl_akta'] = $customer->tgl_aktapt;
            $data['bank_rek'] = $customer->bank_rek;
            $data['cus_gabung'] = $customer->cus_gabung;
            $data['pakta'] = $customer->pakta;
            $data['akta_peng'] = $customer->akta_peng;
            $data['tgl_peng'] = $customer->tgl_peng;
            $data['ket'] = $customer->ket;
            $data['guna_kon'] = $customer->guna_kon;
            
        }
        
        echo json_encode($data);
        
    }
    
    function edit_customer(){
        
        date_default_timezone_set('Asia/Jakarta');
               
        $tipe_cus = $this->input->post('tipe_cus');$tipe_cus_c = $this->input->post('tipe_cus_c');
        //$nama_customer = $this->input->post('nama_customer');
        $alamat_customer = $this->input->post('alamat_customer');$alamat_customer_c = $this->input->post('alamat_customer_c');
        $alamat_pengiriman = $this->input->post('alamat_pengiriman');$alamat_pengiriman_c = $this->input->post('alamat_pengiriman_c');
        //$alamat_fp1 = $this->input->post('alamat_fp1');
        //$alamat_fp2 = $this->input->post('alamat_fp2');
        //$alamat_fp3 = $this->input->post('alamat_fp3');
        
        //$npwp = $this->input->post('npwp');
        $ktp_pemilik = $this->input->post('ktp_pemilik');$ktp_pemilik_c = $this->input->post('ktp_pemilik_c');
        $no_telp = $this->input->post('no_telp');$no_telp_c = $this->input->post('no_telp_c');
        $no_hp_pemilik = $this->input->post('no_hp_pemilik');$no_hp_pemilik_c = $this->input->post('no_hp_pemilik_c');
        $kontak_person = $this->input->post('kontak_person');$kontak_person_c = $this->input->post('kontak_person_c');
        $jabatan_kontak_person = $this->input->post('jabatan_kontak_person');$jabatan_kontak_person_c = $this->input->post('jabatan_kontak_person_c');
        $credit_term = $this->input->post('credit_term');$credit_term_c = $this->input->post('credit_term_c');
        $cara_pembayaran = $this->input->post('cara_pembayaran');$cara_pembayaran_c = $this->input->post('cara_pembayaran_c');
        $nilai_plafon = str_replace(",", "", $this->input->post('nilai_plafon'));$nilai_plafon_c = $this->input->post('nilai_plafon_c');
        $status_blacklist = $this->input->post('status_blacklist');$status_blacklist_c = $this->input->post('status_blacklist_c');
        $kode_global = $this->input->post('kode_global');$kode_global_c = $this->input->post('kode_global_c');
        $kode_grup_customer = $this->input->post('kode_grup_customer');$kode_grup_customer_c = $this->input->post('kode_grup_customer_c');
        $ttk = $this->input->post('ttk');$ttk_c = $this->input->post('ttk_c');
        $kelompok_customer = $this->input->post('kelompok_customer');$kelompok_customer_c = $this->input->post('kelompok_customer_c');
        $unit = $this->input->post('unit');$unit_c = $this->input->post('unit_c');
        $nama_unit = $this->input->post('nama_unit');$nama_unit_c = $this->input->post('nama_unit_c');
        //$jenis_produk = $this->input->post('jenis_produk');
        $cabang = $this->input->post('cabang');$cabang_c = $this->input->post('cabang_c');
        $wilayah_customer = $this->input->post('wilayah_customer');$wilayah_customer_c = $this->input->post('wilayah_customer_c');
        $akta_pt = $this->input->post('akta_pt');$akta_pt_c = $this->input->post('akta_pt_c');
        $tgl_akta = $this->input->post('tgl_akta_pendirian_pt');$tgl_akta_c = $this->input->post('tgl_akta_pendirian_pt_c');
        
        $nib = $this->input->post('nib');$nib_c = $this->input->post('nib_c');
        $tgl_nib = $this->input->post('tgl_nib');$tgl_nib_c = $this->input->post('tgl_nib_c');
        $sk_kemenhumkam = $this->input->post('sk_kemenhumkam');$sk_kemenhumkam_c = $this->input->post('sk_kemenhumkam_c');
        $nama_direksi = $this->input->post('nama_direksi');$nama_direksi_c = $this->input->post('nama_direksi_c');
        $merk_dagang = $this->input->post('merk_dagang');$merk_dagang_c = $this->input->post('merk_dagang_c');
        $kebutuhan_volume = str_replace(",", "", $this->input->post('kebutuhan_volume'));$kebutuhan_volume_c = $this->input->post('kebutuhan_volume_c');
        
        if($kebutuhan_volume == ""){
            $satuan_volume = "";
        }else{
            $satuan_volume = $this->input->post('satuan_volume');$satuan_volume_c = $this->input->post('satuan_volume_c');
        }
        
        $norek_perusahaan = $this->input->post('norek_perusahaan');$norek_perusahaan_c = $this->input->post('norek_perusahaan_c');
        $nama_bank_rekening = $this->input->post('nama_bank_rekening');$nama_bank_rekening_c = $this->input->post('nama_bank_rekening_c');
        $web_perusahaan = $this->input->post('web_perusahaan');$web_perusahaan_c = $this->input->post('web_perusahaan_c');
        $cus_gabung = $this->input->post('cus_gabung');$cus_gabung_c = $this->input->post('cus_gabung_c');
        $pakta = $this->input->post('pakta');$pakta_c = $this->input->post('pakta_c');
        $akta_pengurus = $this->input->post('akta_pengurus');$akta_pengurus_c = $this->input->post('akta_pengurus_c');
        $tgl_pengurus = $this->input->post('tgl_pengurus');$tgl_pengurus_c = $this->input->post('tgl_pengurus_c');
        $keterangan = $this->input->post('keterangan');
        $guna_kon = $this->input->post('guna_kon');$guna_kon_c = $this->input->post('guna_kon_c');
        
        $id = $this->input->post('id');
        
        /*$tes = array(
                'isi' => $tipe_cus_c." ".$kode_global." ".$kode_global_c
            );
        $this->db->insert('tes',$tes);*/
        
        
        // validasi seadanya :v\
        if ($tipe_cus == '' && ($tipe_cus_c != "-" && $tipe_cus_c != "*")) {
            $data['error']['tipe_cus'] = 'Tipe customer harus dipilih!';
        }
        
        if($tipe_cus == '*' || $tipe_cus_c == '*'){
            /*if ($nama_customer == '') {
                $data['error']['nama_customer'] = 'Nama customer tidak boleh kosong!';
            }*/

            if ($alamat_customer == '') {
                $data['error']['alamat_customer'] = 'Alamat customer tidak boleh kosong!';
            }

            if ($alamat_pengiriman == '') {
                $data['error']['alamat_pengiriman'] = 'Alamat pengiriman tidak boleh kosong!';
            }

            /*if ($alamat_fp1 == '' || $alamat_fp2 == '' || $alamat_fp3 == '') {
                $data['error']['alamat_fp'] = 'Alamat FP tidak boleh kosong!';
            }*/

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
        }else if($tipe_cus == '-' || $tipe_cus_c == "-"){
            /*if ($nama_customer == '') {
                $data['error']['nama_customer'] = 'Nama customer tidak boleh kosong!';
            }*/

            if ($alamat_customer == '' && $alamat_customer_c != 'ya') {
                $data['error']['alamat_customer'] = 'Alamat customer tidak boleh kosong!';
            }

            if ($alamat_pengiriman == '' && $alamat_pengiriman_c != 'ya') {
                $data['error']['alamat_pengiriman'] = 'Alamat pengiriman tidak boleh kosong!';
            }

            /*if ($alamat_fp1 == '' || $alamat_fp2 == '' || $alamat_fp3 == '') {
                $data['error']['alamat_fp'] = 'Alamat FP tidak boleh kosong!';
            }*/

            /*if ($npwp == '') {
                $data['error']['npwp'] = 'NPWP tidak boleh kosong!';
            }*/

            if ($cara_pembayaran == '' && $cara_pembayaran_c != 'ya') {
                $data['error']['cara_pembayaran'] = 'Cara pembayaran tidak boleh kosong!';
            }

            if ($status_blacklist == '' && $status_blacklist_c != 'ya') {
                $data['error']['status_blacklist'] = 'Status blacklist tidak boleh kosong!';
            }

            if ($kode_global == '' && $kode_global_c != 'ya') {
                $data['error']['kode_global'] = 'Kode jatra tidak boleh kosong!';
            }

            if ($kode_grup_customer == '' && $kode_grup_customer_c != 'ya') {
                $data['error']['kode_grup_customer'] = 'Kode grup customer tidak boleh kosong!';
            }

            if ($ttk == '' && $ttk_c != 'ya') {
                $data['error']['ttk'] = 'TTK tidak boleh kosong!';
            }

            if ($unit == '' && $unit_c != 'ya') {
                $data['error']['unit'] = 'Unit tidak boleh kosong!';
            }

            if ($nama_unit == '' && $nama_unit_c != 'ya') {
                $data['error']['nama_unit'] = 'Nama unit tidak boleh kosong!';
            }

            /*if ($jenis_produk == '') {
                $data['error']['jenis_produk'] = 'Jenis produk tidak boleh kosong!';
            }*/

            if ($no_telp == '' && $no_telp_c != 'ya') {
                $data['error']['no_telp'] = 'No telp tidak boleh kosong!';
            }

            if ($kontak_person == '' && $kontak_person_c != 'ya') {
                $data['error']['kontak_person'] = 'Kontak person tidak boleh kosong!';
            }
        }
                
        if (empty($data['error'])) {
            
            //==================================================================
            if($tipe_cus == '*' || $tipe_cus_c == '*'){
                
                $tipe_cus = "*";
                
                $input = array(
                        //'n_cus' => $nama_customer,                    
                        //'al1_cus' => $alamat_fp1,
                        //'al2_cus' => $alamat_fp2,
                        //'al3_cus' => $alamat_fp3,
                        'al_cus' => $alamat_customer,
                        'al_kirim' => $alamat_pengiriman,
                        //'npwp' => $npwp,                    
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
                        //'jns_Produk' => $jenis_produk,                    
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
                        'prospek' => $tipe_cus,
                        'tgl_update' => date('Y-m-d H:i:s'),
                        'flag_vfp' => "*"
                    );

                $this->db->where('id',$id);
                $this->db->update('customer',$input);
                
                //--------------------------------------------------------------
                
                $data_update = $this->db->query("select * from customer where id = $id")->row();
                
                $input_hist = array(
                    
                        'k_Cus' => $data_update->k_Cus,                    
                        'n_cus' => $data_update->n_cus,
                        'al1_cus' => $data_update->al1_cus,
                        'al2_cus' => $data_update->al2_cus,
                        'al3_cus' => $data_update->al3_cus,
                        'al_cus' => $data_update->al_cus,
                        'al_kirim' => $data_update->al_kirim,
                        'npwp' => $data_update->npwp,
                        'ktp' => $data_update->ktp,
                        'telp' => $data_update->telp,
                        'no_hp' => $data_update->no_hp,
                        'kontak_per' => $data_update->kontak_per,
                        'jabkon_per' => $data_update->jabkon_per,
                        'credit_ter' => $data_update->credit_ter,
                        'tk' => $data_update->tk,
                        'plaf_aju' => $data_update->plaf_aju,
                        'blacklist' => $data_update->blacklist,
                        'kcus_jti' => $data_update->kcus_jti,
                        'kd_group' => $data_update->kd_group,
                        'ttk' => $data_update->ttk,
                        'kel_cus' => $data_update->kel_cus,
                        'unit' => $data_update->unit,
                        'n_unit' => $data_update->n_unit,
                        'jns_Produk' => $data_update->jns_Produk,
                        'nmcab' => $data_update->nmcab,
                        'n_wilayah' => $data_update->n_wilayah,
                        'akta_pt' => $data_update->akta_pt,
                        'nib' => $data_update->nib,
                        'tgl_nib' => $data_update->tgl_nib,
                        'sk_humkam' => $data_update->sk_humkam,
                        'n_dir' => $data_update->n_dir,
                        'merk_dgang' => $data_update->merk_dgang,
                        'vol' => $data_update->vol,
                        'satuan_vol' => $data_update->satuan_vol,
                        'rek_per' => $data_update->rek_per,
                        'web_per' => $data_update->web_per,
                        'tgl_aktapt' => $data_update->tgl_aktapt,
                        'bank_rek' => $data_update->bank_rek,
                        'cus_gabung' => $data_update->cus_gabung,
                        'pakta' => $data_update->pakta,
                        'akta_peng' => $data_update->akta_peng,
                        'tgl_peng' => $data_update->tgl_peng,
                        'ket' => $data_update->ket,
                        'guna_kon' => $data_update->guna_kon,
                        'tgl_upload' => $data_update->tgl_upload,
                        'prospek' => $data_update->prospek,
                        'tgl_update' => $data_update->tgl_update,
                        'flag_vfp' => $data_update->flag_vfp,
                        'pelaku' => $_SESSION['nama'],
                        'kapan' => date('Y-m-d H:i:s'),
                        'ngapain' => "Edit customer"
                    );
                $this->db->insert('customer_hist',$input_hist);

                $data['hasil'] = 'sukses_tambah';   
                
            }else if($tipe_cus == "-" || $tipe_cus_c == "-"){
                
                $tipe_cus = "";
                
                if($alamat_customer_c != "ya"){
                    $input = array( 'al_cus' => $alamat_customer ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($alamat_pengiriman_c != "ya"){
                    $input = array( 'al_kirim' => $alamat_pengiriman ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($ktp_pemilik_c != "ya"){
                    $input = array( 'ktp' => $ktp_pemilik ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($no_telp_c != "ya"){
                    $input = array( 'telp' => $no_telp ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($no_hp_pemilik_c != "ya"){
                    $input = array( 'no_hp' => $no_hp_pemilik ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($kontak_person_c != "ya"){
                    $input = array( 'kontak_per' => $kontak_person ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($jabatan_kontak_person_c != "ya"){
                    $input = array( 'jabkon_per' => $jabatan_kontak_person ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($credit_term_c != "ya"){
                    $input = array( 'credit_ter' => $credit_term ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($cara_pembayaran_c != "ya"){
                    $input = array( 'tk' => $cara_pembayaran ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($nilai_plafon_c != "ya"){
                    $input = array( 'plaf_aju' => $nilai_plafon ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($status_blacklist_c != "ya"){
                    $input = array( 'blacklist' => $status_blacklist ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($kode_global_c != "ya"){
                    $input = array( 'kcus_jti' => $kode_global ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($kode_grup_customer_c != "ya"){
                    $input = array( 'kd_group' => $kode_grup_customer ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($ttk_c != "ya"){
                    $input = array( 'ttk' => $ttk ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($kelompok_customer_c != "ya"){
                    $input = array( 'kel_cus' => $kelompok_customer ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($unit_c != "ya"){
                    $input = array( 'unit' => $unit ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($nama_unit_c != "ya"){
                    $input = array( 'n_unit' => $nama_unit ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($cabang_c != "ya"){
                    $input = array( 'nmcab' => $cabang ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($wilayah_customer_c != "ya"){
                    $input = array( 'n_wilayah' => $wilayah_customer ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($akta_pt_c != "ya"){
                    $input = array( 'akta_pt' => $akta_pt ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($nib_c != "ya"){
                    $input = array( 'nib' => $nib ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($tgl_nib_c != "ya"){
                    $input = array( 'tgl_nib' => $tgl_nib ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($sk_kemenhumkam_c != "ya"){
                    $input = array( 'sk_humkam' => $sk_kemenhumkam ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($nama_direksi_c != "ya"){
                    $input = array( 'n_dir' => $nama_direksi ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($merk_dagang_c != "ya"){
                    $input = array( 'merk_dgang' => $merk_dagang ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($kebutuhan_volume_c != "ya"){
                    $input = array( 'vol' => $kebutuhan_volume ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($satuan_volume_c != "ya"){
                    $input = array( 'satuan_vol' => $satuan_volume ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($norek_perusahaan_c != "ya"){
                    $input = array( 'rek_per' => $norek_perusahaan ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($web_perusahaan_c != "ya"){
                    $input = array( 'web_per' => $web_perusahaan ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($tgl_akta_c != "ya"){
                    $input = array( 'tgl_aktapt' => $tgl_akta ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($nama_bank_rekening_c != "ya"){
                    $input = array( 'bank_rek' => $nama_bank_rekening ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($cus_gabung_c != "ya"){
                    $input = array( 'cus_gabung' => $cus_gabung ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($pakta_c != "ya"){
                    $input = array( 'pakta' => $pakta ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($akta_pengurus_c != "ya"){
                    $input = array( 'akta_peng' => $akta_pengurus ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($tgl_pengurus_c != "ya"){
                    $input = array( 'tgl_peng' => $tgl_pengurus ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($keterangan != ""){
                    $input = array( 'ket' => nl2br($keterangan) ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($guna_kon_c != "ya"){
                    $input = array( 'guna_kon' => $guna_kon ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                if($tipe_cus_c != "ya"){
                    $input = array( 'prospek' => $tipe_cus ); $this->db->where('id',$id); $this->db->update('customer',$input);
                }
                
                $input2 = array(
                        'tgl_update' => date('Y-m-d H:i:s'),
                        'flag_vfp' => "*"
                    );

                $this->db->where('id',$id);
                $this->db->update('customer',$input2);
                
                //--------------------------------------------------------------
                
                $data_update = $this->db->query("select * from customer where id = $id")->row();
                
                $input_hist = array(
                    
                        'k_Cus' => $data_update->k_Cus,                    
                        'n_cus' => $data_update->n_cus,
                        'al1_cus' => $data_update->al1_cus,
                        'al2_cus' => $data_update->al2_cus,
                        'al3_cus' => $data_update->al3_cus,
                        'al_cus' => $data_update->al_cus,
                        'al_kirim' => $data_update->al_kirim,
                        'npwp' => $data_update->npwp,
                        'ktp' => $data_update->ktp,
                        'telp' => $data_update->telp,
                        'no_hp' => $data_update->no_hp,
                        'kontak_per' => $data_update->kontak_per,
                        'jabkon_per' => $data_update->jabkon_per,
                        'credit_ter' => $data_update->credit_ter,
                        'tk' => $data_update->tk,
                        'plaf_aju' => $data_update->plaf_aju,
                        'blacklist' => $data_update->blacklist,
                        'kcus_jti' => $data_update->kcus_jti,
                        'kd_group' => $data_update->kd_group,
                        'ttk' => $data_update->ttk,
                        'kel_cus' => $data_update->kel_cus,
                        'unit' => $data_update->unit,
                        'n_unit' => $data_update->n_unit,
                        'jns_Produk' => $data_update->jns_Produk,
                        'nmcab' => $data_update->nmcab,
                        'n_wilayah' => $data_update->n_wilayah,
                        'akta_pt' => $data_update->akta_pt,
                        'nib' => $data_update->nib,
                        'tgl_nib' => $data_update->tgl_nib,
                        'sk_humkam' => $data_update->sk_humkam,
                        'n_dir' => $data_update->n_dir,
                        'merk_dgang' => $data_update->merk_dgang,
                        'vol' => $data_update->vol,
                        'satuan_vol' => $data_update->satuan_vol,
                        'rek_per' => $data_update->rek_per,
                        'web_per' => $data_update->web_per,
                        'tgl_aktapt' => $data_update->tgl_aktapt,
                        'bank_rek' => $data_update->bank_rek,
                        'cus_gabung' => $data_update->cus_gabung,
                        'pakta' => $data_update->pakta,
                        'akta_peng' => $data_update->akta_peng,
                        'tgl_peng' => $data_update->tgl_peng,
                        'ket' => $data_update->ket,
                        'guna_kon' => $data_update->guna_kon,
                        'tgl_upload' => $data_update->tgl_upload,
                        'prospek' => $data_update->prospek,
                        'tgl_update' => $data_update->tgl_update,
                        'flag_vfp' => $data_update->flag_vfp,
                        'pelaku' => $_SESSION['nama'],
                        'kapan' => date('Y-m-d H:i:s'),
                        'ngapain' => "Edit customer"
                    );
                $this->db->insert('customer_hist',$input_hist);

                $data['hasil'] = 'sukses_tambah';
                
            }
            
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
    
    public function ajax_list(){

        $list = $this->Data_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $l) {
                $no++;
                $row = array();
                
                /*if(substr($l->blnaktif, 4) == "01"){ $bulan = "Januari"; }
                if(substr($l->blnaktif, 4) == "02"){ $bulan = "Februari"; }
                if(substr($l->blnaktif, 4) == "03"){ $bulan = "Maret"; }
                if(substr($l->blnaktif, 4) == "04"){ $bulan = "April"; }
                if(substr($l->blnaktif, 4) == "05"){ $bulan = "Mei"; }
                if(substr($l->blnaktif, 4) == "06"){ $bulan = "Juni"; }
                if(substr($l->blnaktif, 4) == "07"){ $bulan = "Juli"; }
                if(substr($l->blnaktif, 4) == "08"){ $bulan = "Agustus"; }
                if(substr($l->blnaktif, 4) == "09"){ $bulan = "September"; }
                if(substr($l->blnaktif, 4) == "10"){ $bulan = "Oktober"; }
                if(substr($l->blnaktif, 4) == "11"){ $bulan = "November"; }
                if(substr($l->blnaktif, 4) == "12"){ $bulan = "Desember"; }*/
                
                if($l->prospek == "*"){
                    $tipe_cus = "Prospek";
                }else{
                    $tipe_cus = "Join";
                }
                
                $row[] = $no;
                $row[] = '<a href="javascript:void(0);" class="fas fa-power-off" onclick="ubah_status('.$l->id.')" title="Ubah status" style="color:black;"></a> <a href="javascript:void(0);" class="fas fa-edit" onclick="edit('.$l->id.')" title="Edit"></a>';
                $row[] = $tipe_cus." ".$l->status;
                $row[] = $l->unit;
                $row[] = $l->k_Cus;
                
                if($l->status == "non aktif"){
                    $row[] = "<span style='color:green;'><strong>".$l->n_cus."</strong></span>";
                }else{
                    $row[] = $l->n_cus;
                }                
                
                $row[] = number_format(($l->piutang + $l->spb_blmkwt), 0, ".", ",");
                $row[] = $l->al_cus;
                $row[] = $l->al_kirim;
                $row[] = $l->al1_cus." ".$l->al2_cus." ".$l->al3_cus;
                $row[] = $l->npwp;
                $row[] = $l->ktp;
                $row[] = $l->telp;
                $row[] = $l->no_hp;
                $row[] = $l->kontak_per;
                $row[] = $l->jabkon_per;
                $row[] = $l->credit_ter;
                $row[] = $l->tk;
                $row[] = number_format($l->plaf_aju, 0, ".", ",");
                $row[] = $l->blacklist;
                $row[] = $l->kcus_jti;
                $row[] = $l->kd_group;
                $row[] = $l->ttk;
                $row[] = $l->kel_cus;
                $row[] = $l->n_unit;
                $row[] = $l->jns_Produk;
                $row[] = $l->nmcab;
                $row[] = $l->n_wilayah;
                $row[] = $l->akta_pt;
                $row[] = $l->tgl_aktapt;
                
                $row[] = $l->nib;
                $row[] = $l->tgl_nib;
                $row[] = $l->sk_humkam;
                $row[] = $l->n_dir;
                $row[] = $l->merk_dgang;
                $row[] = number_format($l->vol, 0, ".", ",")." ".$l->satuan_vol;
                $row[] = $l->rek_per;
                $row[] = $l->bank_rek;
                $row[] = $l->web_per;
                $row[] = $l->cus_gabung;
                $row[] = $l->pakta;
                $row[] = $l->akta_peng;
                $row[] = $l->tgl_peng;
                $row[] = $l->guna_kon;
                $row[] = $l->ket;
                
                $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Data_model->count_all(),
                        "recordsFiltered" => $this->Data_model->count_filtered(),
                        "data" => $data,
                        );
        //output to json format
        echo json_encode($output);
    }
    
}