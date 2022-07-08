<?php

class Login extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        
    }
    
    function index(){
        
        if(isset($_SESSION['nama'])){
            redirect('input-customer');
        }else{
            $this->load->view('Login_view');
        }
        
    }
    
    function masuk(){
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // validasi seadanya :v
        if ($username == '') {
            $data['error']['username'] = 'Username tidak boleh kosong!';
        }
        
        if($password == ''){
            $data['error']['password'] = 'Password tidak boleh kosong!';
        }else if (strlen($password) < 8) {
            $data['error']['password'] = 'Password tidak boleh kurang dari 8 karakter!';
        }

        if (empty($data['error'])) {
            
            $data_user = $this->db->query("select * from user where username = '$username' and password = '".md5($password)."'")->row();
            
            if(!empty($data_user->id)){
                
                //-------------------------
                $_SESSION['id'] = $data_user->id;
                $_SESSION['username'] = $data_user->username;
                $_SESSION['nama'] = $data_user->nama;
                $_SESSION['role'] = $data_user->role;
                                
                //histori
                date_default_timezone_set('Asia/Jakarta');
                $hist = array(
                        'id_user' => $_SESSION['id'],
                        'nama_user' => $_SESSION['nama'],
                        'role' => $_SESSION['role'],
                        'aksi' => "Masuk Web",
                        'waktu' => date('Y-m-d H:i:s')
                    );
                $this->db->insert('tb_history',$hist);
                //-------------------------
                
                $data['hasil'] = 'sukses'; //final
            }else{
                
                $data['hasil'] = 'gagal';
                
                $cek_user = $this->db->query("select * from user where username = '$username'")->row();
                $cek_password = $this->db->query("select * from user where password = '".md5($password)."' ")->row();
                
                if(empty($cek_user->id)){
                    $data['error']['username'] = 'Username Anda salah, silahkan coba lagi!';
                }
                
                if(empty($cek_password->id)){
                    $data['error']['password'] = 'Password Anda salah, silahkan coba lagi!';
                }
                
            }
                        
        } else {
            // jika validasi gagal
            $data['hasil'] = 'gagal';
        }

        // tampilkan response dalam format json
        echo json_encode($data);
        
    }
    
}