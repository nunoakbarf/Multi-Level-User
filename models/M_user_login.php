<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_login extends CI_Model{
    
    public function get($username){
        $this->db->where('username', $username); 
        // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('users')->row(); 
        // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
        }
}
?>