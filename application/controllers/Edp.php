<?php

class Edp extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        if(!isset($_SESSION['nama'])){
            redirect('Login');
        }else{
            if($_SESSION['role'] != "administrator"){
                redirect('input-customer');
            }
        }

        $this->load->model('Edp_model');
        
    }
    
    function index(){
        
        $this->load->view("Edp_view");
        
    }
    
    function hapus_hak_akses(){
        
        date_default_timezone_set('Asia/Jakarta');
        
        $kode_unit = $this->input->post('kode_unit');
        $nama_unit = $this->input->post('nama_unit');
        $nama = $this->input->post('nama');
        
        //histori
        $hist = array(
                'id_user' => $_SESSION['id'],
                'nama_user' => $_SESSION['nama'],
                'role' => $_SESSION['role'],
                'aksi' => "Menghapus akses $kode_unit untuk $nama",
                'waktu' => date('Y-m-d H:i:s')
            );
        $this->db->insert('tb_history',$hist);
        //-------------------------

        //delete
        $this->db->query('delete from hak_akses where kode_unit = "'.$kode_unit.'" ');
        //-------------------------

        $data['hasil'] = 'sukses_hapus';
        
        echo json_encode($data);
        
    }
    
    function tambah_hak_akses(){
        
        date_default_timezone_set('Asia/Jakarta');
        
        $kode_unit = $this->input->post('kode_unit');
        $nama_unit = $this->input->post('nama_unit');
        $nama = $this->input->post('nama');
        
        //histori
        $hist = array(
                'id_user' => $_SESSION['id'],
                'nama_user' => $_SESSION['nama'],
                'role' => $_SESSION['role'],
                'aksi' => "Menambah akses $kode_unit untuk $nama",
                'waktu' => date('Y-m-d H:i:s')
            );
        $this->db->insert('tb_history',$hist);
        //-------------------------

        //insert
        $input = array(
                'kode_unit' => $kode_unit,
                'nama_unit' => $nama_unit,
                'nama_user' => $nama
            );
        $this->db->insert('hak_akses',$input);
        //-------------------------

        $data['hasil'] = 'sukses_tambah';
        
        echo json_encode($data);
        
    }
    
    function hapus_data_pengguna(){
        date_default_timezone_set('Asia/Jakarta');
        
        $id = $this->uri->segment(3);
        
        $data_pengguna = $this->db->query("select * from user where id = $id")->row();
        
        if(empty($data_pengguna)){
            
            $data['hasil'] = "dihapus";
            
        }else if(!empty($data_pengguna)){
            
            //histori
            $hist = array(
                'id_user' => $_SESSION['id'],
                'nama_user' => $_SESSION['nama'],
                'role' => $_SESSION['role'],
                'aksi' => "Menghapus pengguna : ".$data_pengguna->nama,
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('tb_history',$hist);
            //-------------------------

            $this->db->query("delete from hak_akses where nama_user = '$data_pengguna->nama' ");
            $this->db->query("delete from user where id = $id");
            
            $data['hasil'] = "sukses";
            
        }
        
        echo json_encode($data);
        
    }
    
    function get_data_pengguna(){
        
        $id = $this->uri->segment(3);
        $pengguna = $this->db->query("select * from user where id = $id")->row();
        
        if(empty($pengguna)){
            
            $data['hasil'] = "dihapus";
            
        }else if(!empty($pengguna)){
            
            $data['hasil'] = "ada";
            
            $data['nama'] = $pengguna->nama;
            $data['username'] = $pengguna->username;
            $data['role'] = $pengguna->role;
            $data['no_hp'] = $pengguna->no_hp;
            $data['email'] = $pengguna->email;

        }
        
        echo json_encode($data);
        
    }
    
    function simpan(){
        
        date_default_timezone_set('Asia/Jakarta');
        
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $id = $this->input->post('id');

        // validasi seadanya :v\
        if ($nama == '') {
            $data['error']['nama'] = 'Nama pengguna tidak boleh kosong!';
        }
        
        if ($username == '') {
            $data['error']['username'] = 'Username tidak boleh kosong!';
        }
        
        if($id == ''){
            if($password == ''){
                $data['error']['password'] = 'Password tidak boleh kosong!';
            }else if (strlen($password) < 8) {
                $data['error']['password'] = 'Password tidak boleh kurang dari 8 karakter!';
            }
        }else if($id != ''){
            if ($password != '' && strlen($password) < 8) {
                $data['error']['password'] = 'Password tidak boleh kurang dari 8 karakter!';
            }
        }
        
        if ($role == '') {
            $data['error']['role'] = 'Role tidak boleh kosong!';
        }
        
        if ($no_hp == '') {
            $data['error']['no_hp'] = 'No HP tidak boleh kosong!';
        }
        
        if ($email == '') {
            $data['error']['email'] = 'E-mail tidak boleh kosong!';
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['error']['email'] = 'Format e-mail salah!';
        }
        
        if (empty($data['error'])) {
            
            if($id == ""){ //tambah
                
                //histori
                $hist = array(
                        'id_user' => $_SESSION['id'],
                        'nama_user' => $_SESSION['nama'],
                        'role' => $_SESSION['role'],
                        'aksi' => "Tambah pengguna",
                        'waktu' => date('Y-m-d H:i:s')
                    );
                $this->db->insert('tb_history',$hist);
                //-------------------------
                
                //insert
                $pengguna = array(
                        'username' => $username,
                        'nama' => $nama,
                        'password' => md5($password),
                        'role' => $role,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'waktu' => date('Y-m-d H:i:s')
                    );
                $this->db->insert('user',$pengguna);
                //-------------------------
                
                $data['hasil'] = 'sukses_tambah';
                
            }else if($id != ""){ //update
                
                //histori
                $hist = array(
                        'id_user' => $_SESSION['id'],
                        'nama_user' => $_SESSION['nama'],
                        'role' => $_SESSION['role'],
                        'aksi' => "Ubah pengguna",
                        'waktu' => date('Y-m-d H:i:s')
                    );
                $this->db->insert('tb_history',$hist);
                //-------------------------
                
                //update
                if($password == ""){
                    $pengguna = array(
                        'username' => $username,
                        'nama' => $nama,
                        'role' => $role,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'waktu' => date('Y-m-d H:i:s')
                    );
                }else{
                    $pengguna = array(
                        'username' => $username,
                        'nama' => $nama,
                        'password' => md5($password),
                        'role' => $role,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'waktu' => date('Y-m-d H:i:s')
                    );
                }
                
                $this->db->where('id',$id);
                $this->db->update('user',$pengguna);
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
        
    public function ajax_list(){

        $list = $this->Edp_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $l) {
                $no++;
                $row = array();
                $row[] = "<strong>".$no.". ".$l->nama."</strong>";
                $row[] = $l->username;
                $row[] = $l->role;
                $row[] = $l->no_hp;
                $row[] = $l->email;
                $row[] = '<a href="javascript:void(0);" class="fas fa-edit" onclick="ubah_user('.$l->id.')" title="Ubah data pengguna" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-trash" onclick="hapus_data_pengguna('.$l->id.')" title="Hapus data pengguna" style="color:black;"></a> | <a href="javascript:void(0);" class="fas fa-user-secret" onclick="hak_akses(\''.$l->username.'\')" title="Hak akses pengguna" style="color:black;"></a>';
                                
                $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Edp_model->count_all(),
                        "recordsFiltered" => $this->Edp_model->count_filtered(),
                        "data" => $data,
                        );
        //output to json format
        echo json_encode($output);
    }
    
}