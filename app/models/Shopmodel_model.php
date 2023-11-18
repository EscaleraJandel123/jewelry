<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Shopmodel_model extends Model
{
    public function getInfo()
    {
        return $this->db->table('prod')->get_all();
    }
    public function getCat()
    {
        return $this->db->table('cat')->get_all();
    }
    public function searchInfo($id)
    {
        return $this->db->table('prod')->where('id', $id)->get();
    }


    public function getInfoById($id)
    {
        return $this->db->table('prod')->select('*')->where('id', $id)->get();
    }

}
?>