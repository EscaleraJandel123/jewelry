<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Shopmodel_model extends Model {
	public function getInfo()
    {
        return $this->db->table('prod')->get_all();
    }

}
?>
