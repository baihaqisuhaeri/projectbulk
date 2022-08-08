<?php

class Mobil_model extends CI_Model
{
    public function tambah_mobil($table, $data)
    {
        $this->db->insert($table, $data);
    }

    var $table = 'mobil';
    var $column_order = array(null, 'k_mobil', 'n_mobil', 'kd_unit', 'tahun', 'stnk', 'kir_mobil'); //set column field database for datatable orderable
    var $column_search = array('k_mobil', 'n_mobil', 'kd_unit', 'tahun', 'stnk', 'kir_mobil'); //set column field database for datatable searchable
    var $order = array('n_mobil' => 'desc'); // default order
    public function get_data_tabel_mobil()
    {
        $nama = $_SESSION['nama'];

        $this->db->select('*');
        $this->db->join('hak_akses', 'mobil.kd_unit = hak_akses.kode_unit');
        $this->db->where('hak_akses.nama_user', $nama);
        $this->db->order_by('n_mobil asc');

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
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

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->get_data_tabel_mobil();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->get_data_tabel_mobil();
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function hapus_mobil($no)
    {
        $this->db->where('no', $no);
        $this->db->delete($this->table);
    }

    public function edit_mobil($no, $data)
    {
        $this->db->where('no', $no);
        $this->db->update('mobil', $data);
    }

    function check($mobil_unik){

        $this->db->select();
        $query = $this->db->get_where('mobil', array('mobil_unik' => $mobil_unik));
        $result = $query->result_array();
        
        $count = count($result);
        // var_dump($count);
        // die();
        
        if(empty($count)){
        return false;
        }
        else{
        return true;
        }
        }

}
