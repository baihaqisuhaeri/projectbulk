<?php

class Barang_model extends CI_Model
{
    var $table = 'dbm002';
    var $column_order = array(null, 'k_barang', 'n_barang', 'k_div', 'kode_berat', 'jml_kg', 'h_pokok', 'h_jual', 'kode_jual', 'kode_tim', 'dbm002.id'); //set column field database for datatable orderable
    var $column_search = array('k_barang', 'n_barang', 'k_div', 'kode_berat', 'jml_kg', 'h_pokok', 'h_jual', 'kode_jual', 'kode_tim', 'dbm002.id'); //set column field database for datatable searchable
    var $order = array('k_barang' => 'desc'); // default order
    public function get_data_tabel_barang()
    {
        date_default_timezone_set('Asia/Jakarta');
        // $bulanAktifSekarang = date("Ym");
        // $unit = $this->input->post('unit');
        // $no_urut = $this->input->post('no_urut');
        $nama = $_SESSION['nama'];
        // if(isset($_SESSION['bulanAktif'])){
        //     // var_dump($_SESSION['bulanAktif']);
        //     // die();
        //     $bulanAktif = $_SESSION['bulanAktif'];
        //     $this->db->where('blnaktif', $bulanAktif);
        // }else{
        //     $this->db->where('blnaktif', $bulanAktifSekarang);
        // }

        //  $where = "hak_akses.nama_user = '$nama' and no_urut = '$no_urut'";
        // $where = "unit = '$unit' and no_urut = '$no_urut'";
        // $this->db->where($where);
        $this->db->select('*, dbm002.id as id');
        $this->db->join('hak_akses', 'dbm002.kd_unit = hak_akses.kode_unit');
        //$this->db->join('dbm003', 'dbm002.kd_unit = dbm003.k_cabang');
        $this->db->where('hak_akses.nama_user', $nama);
        //  $this->db->where('dbm003.flag_aktif !=', '*');
        $this->db->order_by('k_barang asc');

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

    public function tambah_barang($table, $data)
    {
        $this->db->insert($table, $data);
    }


    public function hapus_barang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function edit_barang($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('dbm002', $data);
    }
}
