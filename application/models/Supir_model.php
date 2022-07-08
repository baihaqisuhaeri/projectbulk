<?php

class Supir_model extends CI_Model
{
    public function tambah_supir($table, $data)
    {
        $this->db->insert($table, $data);
    }

    var $table = 'supir';
    var $column_order = array(null, 'id', 'k_sales', 'n_sales', 'kd_unit'); //set column field database for datatable orderable
    var $column_search = array('id', 'k_sales', 'n_sales', 'kd_unit'); //set column field database for datatable searchable
    var $order = array('k_sales' => 'desc'); // default order
    public function get_data_tabel_barang()
    {


        $this->db->select('*');
        $this->db->order_by('k_sales asc');

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
        $this->get_data_tabel_barang();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->get_data_tabel_barang();
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function hapus_supir($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function edit_supir($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('supir', $data);
    }
}
