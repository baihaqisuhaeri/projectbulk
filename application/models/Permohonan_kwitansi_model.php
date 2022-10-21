<?php

class Permohonan_kwitansi_model extends CI_Model
{
    

    var $table_sj_detail = 'tb_sj';
    var $column_order_sj_detail = array(null, 'id', 'tgl_sj', 'no_sj', 'jumlah', 'k_barang', 'k_altk', 'alk_cus1'); //set column field database for datatable orderable
    var $column_search_sj_detail = array('id', 'tgl_sj', 'no_sj', 'jumlah', 'k_barang', 'k_altk', 'alk_cus1'); //set column field database for datatable searchable
    var $order_sj_detail = array('no_sj' => 'desc'); // default order
    public function get_data_tabel_sj_detail()
    {


        $k_cus = $_SESSION['k_cus'];
        $this->db->select('*');
        $this->db->where('k_cus', $k_cus);
        $this->db->where('flag_ver !=', "");
        $this->db->where('k_cus', $k_cus);
        $this->db->where('blnaktif', "");
        $this->db->where('no_mohon', "");
        $this->db->order_by('no_sj asc');

        $this->db->from($this->table_sj_detail);

        $i = 0;

        foreach ($this->column_search_sj_detail as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_sj_detail) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_sj_detail[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_sj_detail)) {
            $order = $this->order_sj_detail;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_sj_detail()
    {
        $this->get_data_tabel_sj_detail();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_sj_detail()
    {
        $this->get_data_tabel_sj_detail();
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all_sj_detail()
    {
        $this->db->from($this->table_sj_detail);
        return $this->db->count_all_results();
    }




    var $table_sj_detail_pilih = 'tb_sj';
    var $column_order_sj_detail_pilih = array(null, 'id', 'tgl_sj', 'no_sj', 'jumlah', 'k_barang', 'k_altk', 'alk_cus1'); //set column field database for datatable orderable
    var $column_search_sj_detail_pilih = array('id', 'tgl_sj', 'no_sj', 'jumlah', 'k_barang', 'k_altk', 'alk_cus1'); //set column field database for datatable searchable
    var $order_sj_detail_pilih = array('no_sj' => 'desc'); // default order
    public function get_data_tabel_sj_detail_pilih()
    {
        

        $id = $_SESSION['id'];
        // var_dump($id);
        // die();
        $this->db->select('*');
        $this->db->where('id', $id);
        // $this->db->where('flag_ver !=', "");
        // $this->db->where('k_cus', $k_cus);
        // $this->db->where('blnaktif', "");
        $this->db->order_by('no_sj asc');

        $this->db->from($this->table_sj_detail_pilih);

        $i = 0;

        foreach ($this->column_search_sj_detail_pilih as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_sj_detail_pilih) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_sj_detail_pilih[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_sj_detail_pilih)) {
            $order = $this->order_sj_detail_pilih;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_sj_detail_pilih()
    {
        $this->get_data_tabel_sj_detail_pilih();
        
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_sj_detail_pilih()
    {
        $this->get_data_tabel_sj_detail_pilih();
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all_sj_detail_pilih()
    {
        $this->db->from($this->table_sj_detail_pilih);
        return $this->db->count_all_results();
    }







    

    
    public function get_nama_customer($id)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_nama_barang($k_barang){
        $this->db->select('*');
        $this->db->from('dbm002');
        $this->db->where('k_barang', $k_barang);
        $query = $this->db->get();

        return $query->result();
    }


    public function get_alamat($id){
        $this->db->select('k_altk');
        $this->db->from('tb_sj');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_kd_unit($id_cus){
        $this->db->select('unit');
        $this->db->from('customer');
        $this->db->where('id', $id_cus);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_bulan_aktif($kd_unit)
    {
        $this->db->select('*');
        $this->db->from('tb_unit');
        $this->db->where('kd_unit', $kd_unit);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_sj_by_id($id){
        $this->db->select('*');
        $this->db->from('tb_sj');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kode_nomor($unit)
    {
        $this->db->select('*');
        $this->db->from('tb_unit');
        $this->db->where('kd_unit', $unit);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_last_permohonan_kwitansi($no_mohon)
    {
        $this->db->select('*');
        $this->db->from('tb_sj');
        $this->db->like('no_mohon', $no_mohon);
        $this->db->order_by('no_mohon', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->result();
    }


    public function tambah_permohonan_kwitansi($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_sj', $data);
    }

}












