<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Akun_User extends CI_Model{
	
	function tampil_data($where,$table){
		return $this->db->get_where($table,$where);
	}
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}