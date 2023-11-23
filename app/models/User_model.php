<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	public function getusers()
    {
        return $this->db->table('users')->get_all();
    }
     public function addUser($data)
     {
        return $this->db->table('users')->insert($data);
     }
     public function getEmail($email)
     {
         return $this->db->table('users')->where('email', $email)->get();
     }

     public function getUserById($userId)
     {
         return $this->db->table('users')->where('id', $userId)->get();
     }

}
?>
