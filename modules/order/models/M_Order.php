<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model{

	function tampil_data(){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('orders');
        $query=$this->db->get();
        return $query->result_array();
	}
	public function getOrderItems($num){
        $this->db->select('*');
        $this->db->where('orders.order_num', $num); // <-- There is never any reason to write this line!
        $this->db->from('orderitems');
        $this->db->join('orders', 'orderitems.order_num = orders.order_num');
        $query=$this->db->get();
        return $query->result_array();
	}
	public function getDetailUser($id){
        $this->db->select('*');
        $this->db->where('orders.id_user', $id); // <-- There is never any reason to write this line!
        $this->db->from('users');
        $this->db->join('orders', 'users.id_user = orders.id_user');
        $query=$this->db->get();
        return $query->result_array();
    }
}