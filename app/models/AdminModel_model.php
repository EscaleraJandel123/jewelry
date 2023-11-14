<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminModel_model extends Model {
	public function getInfo()
    {
        return $this->db->table('prod')->get_all();
    }
    public function getCat()
    {
        return $this->db->table('cat')->get_all();
    }
}
?>
