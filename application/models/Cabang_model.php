<?php

class Cabang_model extends CI_Model
{
    public function tambah_cabang($table, $data){
        $this->db->insert($table, $data);
    }

    var $table = 'dbm003';    
    var $column_order = array(null,'id','k_cabang','n_cabang','al1_cab','al2_cab','al3_cab','telp','kontak','n_kacab','j_kacab','npwp','sk','tgl_sk','nama_fp','lokasi','kode_nomor','tgl_aktif','ttpbln','n_pt','al_pjk','al_pjk2','kode_spm','plaf_unit'); //set column field database for datatable orderable
    var $column_search = array('id','k_cabang','n_cabang','al1_cab','al2_cab','al3_cab','telp','kontak','n_kacab','j_kacab','npwp','sk','tgl_sk','nama_fp','lokasi','kode_nomor','tgl_aktif','ttpbln','n_pt','al_pjk','al_pjk2','kode_spm','plaf_unit'); //set column field database for datatable searchable
    var $order = array('k_cabang' => 'desc'); // default order
    public function get_data_tabel_barang(){
        
        
        $this->db->select('*');      
        $this->db->order_by('k_cabang asc');
        
        $this->db->from($this->table);
        
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                        $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    public function get_datatables()
    {
        $this->get_data_tabel_barang();
        if($_POST['length'] != -1)
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

    public function hapus_cabang($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function edit_cabang($id, $data){
        $this->db->where('id', $id);
$this->db->update('dbm003', $data);
    }

}
