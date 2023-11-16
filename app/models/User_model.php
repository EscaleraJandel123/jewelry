<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	public function user()
    {
        return $this->db->table('users')->get_all();
    }
}
?>
