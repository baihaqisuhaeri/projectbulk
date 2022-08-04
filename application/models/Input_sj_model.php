<?php

class Input_sj_model extends CI_Model
{
    

    
    // var $table = 'supir';
    // var $column_order = array(null, 'id', 'k_sales', 'n_sales', 'kd_unit'); //set column field database for datatable orderable
    // var $column_search = array('id', 'k_sales', 'n_sales', 'kd_unit'); //set column field database for datatable searchable
    // var $order = array('k_sales' => 'desc'); // default order

    //untuk alamat kirim
    var $tableAlamat = 'almt_krm';
    var $column_order_alamat_kirim = array(null, 'id', 'k_cus','n_cus','nmcab','npwp','al1_cus','al2_cus','al3_cus','k_altk','alk_cus1','alk_cus2','alk_cus3','flag_aktif','tgl_input','pc_input','tgl_edit'); 
    var $column_search_alamat_kirim = array('id', 'k_cus','n_cus','nmcab','npwp','al1_cus','al2_cus','al3_cus','k_altk','alk_cus1','alk_cus2','alk_cus3','flag_aktif','tgl_input','pc_input','tgl_edit'); 
    var $order_alamat_kirim = array('k_cus' => 'desc'); // default order
    public function get_data_tabel_alamat_kirim($k_cus)
    {


        
        $this->db->select('*');
        $this->db->where('k_cus', $k_cus);
        $this->db->order_by('k_altk asc');

        $this->db->from($this->tableAlamat);

        $i = 0;

        foreach ($this->column_search_alamat_kirim as $item) // loop column 
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

                if (count($this->column_search_alamat_kirim) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_alamat_kirim[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_alamat_kirim = $this->order_alamat_kirim;
            $this->db->order_by(key($order_alamat_kirim), $order_alamat_kirim[key($order_alamat_kirim)]);
        }
    }

    public function get_datatables_alamat_kirim($k_cus)
    {
        $this->get_data_tabel_alamat_kirim($k_cus);
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
        $this->db->from($this->tableAlamat);
        return $this->db->count_all_results();
    }

    public function count_filtered_alamat_kirim($k_cus)
    {
        $this->get_data_tabel_alamat_kirim($k_cus);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all_alamat_kirim()
    {
        $this->db->from($this->tableAlamat);
        return $this->db->count_all_results();
    }

    public function hapus_supir($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableAlamat);
    }

    public function edit_supir($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('supir', $data);
    }

    function check($supir_unik){

        $this->db->select();
        $query = $this->db->get_where('supir', array('supir_unik' => $supir_unik));
        $result = $query->result_array();
        
        $count = count($result);
        
        if(empty($count)){
        return false;
        }
        else{
        return true;
        }
        }

      //  function get_customer

    //   function tambah_alamat_baru($unitSj, $k_cus){
    //     $this->db->insert("almt_krm", $data);
    //   }

      function get_nama_customer($unit, $k_cus){
        $this->db->select('*');

        $this->db->from('customer');

        $this->db->where('unit', $unit );
        $this->db->where('k_Cus', $k_cus );
        $this->db->where('flag_aktif', '' );


    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
        $row = $query->row_array();
        return $row;
    }
      }

      public function tambah_alamat_baru($data)
    {
       $insert = $this->db->insert("almt_krm", $data);
        
        
    }

    public function get_volume_spm($noUrutSpm){
        $this->db->select('*');

        $this->db->from('tb_spm');

        $this->db->where('no_urutspm', $noUrutSpm );
        


    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
        $row = $query->row_array();
        return $row;
    }

    }


    public function get_volume_spm_sj($noUrutSpm){
        $this->db->select('*');

        $this->db->from('tb_sj');

        $this->db->where('no_urutspm', $noUrutSpm );
        


    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
        $row = $query->row_array();
        return $row;
    }

    }


    public function get_mobil_sj($unitSj){
        $row = $this->db->query("select * from mobil where kd_unit = '$unitSj'  order by n_mobil asc")->result();
        return $row;
    }

    public function get_supir_sj($unitSj){
        $row = $this->db->query("select * from supir where kd_unit = '$unitSj'  order by n_sales asc")->result();
        return $row;
    }

    public function get_barang_sj($unitSj){
        $row = $this->db->query("select * from dbm002 where kd_unit = '$unitSj'  order by n_barang asc")->result();
        return $row;
    }

    public function get_unit_marketing(){
        $row = $this->db->query("select * from unit_mkt order by unit_mkt asc")->result();
        return $row;
    }

    

    public function get_kg_barang($kode_barang){
        $this->db->select('*');
        $this->db->from('dbm002');
        $this->db->where('k_barang', $kode_barang);
        $query=$this->db->get();

        return $query->result();
    }

    public function get_suplier(){
        $this->db->select('*');
        $this->db->from('tb_suplier');
        $query=$this->db->get();

        return $query->result();
    }

    public function get_ppn(){
        $this->db->select('*');
        $this->db->from('tb_ppn');
        $query=$this->db->get();

        return $query->result();
    }

    public function get_data_spm($noUrutSpm){
        $this->db->select('*');
        $this->db->from('tb_spm');
        $this->db->where('no_urutspm', $noUrutSpm);
        $query=$this->db->get();

        return $query->result();

    }

}
