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

    public function update_blnaktif($bln, $unit)
    {
    //     $this->db->where('CONCAT(SUBSTRING(tgl_sj, 3, 2), SUBSTRING(tgl_sj, 6,2) )',$bln);
    //     $this->db->where('blnaktif',"");
    //    // $this->db->set('blnaktif', 'CONCAT(SUBSTRING(tgl_sj, 3, 2), SUBSTRING(tgl_sj, 6,2) )', FALSE);
    //     $this->db->set('blnaktif', 'CONCAT(SUBSTRING(tgl_sj, 3, 2),\',\',\''.' SUBSTRING(tgl_sj, 6,2)'.'\')', FALSE);
    //     $this->db->update('tb_sj');
       $query =  $this->db->query('update tb_sj set blnaktif = CONCAT(SUBSTRING(tgl_sj, 3, 2), SUBSTRING(tgl_sj, 6,2) )
        where CONCAT(SUBSTRING(tgl_sj, 3, 2), SUBSTRING(tgl_sj, 6,2) ) = '."'$bln'". ' and blnaktif = "" and kd_unit = '."'$unit'");
        if($query){
            return true;
        }else{
            return false;
        }

    }
    //update tb_sj set blnaktif = CONCAT(SUBSTRING(tgl_sj, 3, 2), SUBSTRING(tgl_sj, 6,2) )
    // where CONCAT(SUBSTRING(tgl_sj, 3, 2), SUBSTRING(tgl_sj, 6,2) ) = "2205" and blnaktif = ""
}
