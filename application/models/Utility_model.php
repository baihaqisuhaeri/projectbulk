<?php

class Utility_model extends CI_Model
{
    

    public function get_bulan_aktif($kd_unit)
    {
        $this->db->select('*');
        $this->db->from('tb_unit');
        $this->db->where('kd_unit', $kd_unit);
        $query = $this->db->get();

        return $query->result();
    }

    public function tutup_bulan($unit, $data)
    {
        $this->db->where('kd_unit', $unit);
        $this->db->update('tb_unit', $data);
    }
   
}
