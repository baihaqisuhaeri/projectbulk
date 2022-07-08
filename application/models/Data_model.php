<?php

class Data_model extends CI_Model{
    
    var $table = 'customer';
    var $column_order = array(null, 'id','piutang','spb_blmkwt','k_Cus','n_cus','al1_cus','npwp','ktp','telp','no_hp','kontak_per','jabkon_per','credit_ter','tk','plaf_aju','blacklist','kcus_jti','kd_group','ttk','kel_cus','unit','n_unit','jns_Produk','nmcab','n_wilayah','akta_pt','no_siup','t_blk_siup','no_tdp','t_blk_tdp','nib','tgl_nib','sk_dmsli','t_sk_dmsli','sk_kuasa','sk_humkam','n_dir','rek_per','web_per','merk_dgang','al2_cus','al3_cus','tgl_aktapt','bank_rek','cus_gabung','pakta','akta_peng','tgl_peng','ket','guna_kon','status','al_cus','al_kirim'); //set column field database for datatable orderable
    var $column_search = array('id','piutang','spb_blmkwt','k_Cus','n_cus','al1_cus','npwp','ktp','telp','no_hp','kontak_per','jabkon_per','credit_ter','tk','plaf_aju','blacklist','kcus_jti','kd_group','ttk','kel_cus','unit','n_unit','jns_Produk','nmcab','n_wilayah','akta_pt','no_siup','t_blk_siup','no_tdp','t_blk_tdp','nib','tgl_nib','sk_dmsli','t_sk_dmsli','sk_kuasa','sk_humkam','n_dir','rek_per','web_per','merk_dgang','al2_cus','al3_cus','tgl_aktapt','bank_rek','cus_gabung','pakta','akta_peng','tgl_peng','ket','guna_kon','status','al_cus','al_kirim'); //set column field database for datatable searchable 
    var $order = array('id' => 'desc'); // default order
    
    private function _get_datatables_query()
    {
            
        /*if($this->input->post('no_rencana') != "")
        {
            $this->db->where('no_rencana', $this->input->post('no_rencana'));
        }
        else
        {
            $this->db->where('no_rencana', $this->input->post('no_rencana'));
        }*/
        
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
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
}