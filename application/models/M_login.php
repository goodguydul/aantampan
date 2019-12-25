<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login extends CI_Model{


	public function get_role($username){
		$this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$username);
        $query=$this->db->get();
        
        return $query->result_array();
	}

	function cekuser($username) {
        $this->db->select('level');
        $this->db->from('user');
        $this->db->where('username',$username);

        $query = $this->db->get();

        return $query->result_array();
    }
    
    function ceklogin(){
        $username = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$username);
        return $query=$this->db->get();
    }

    function register($data){
        $this->db->insert('user', array_merge($data,['tgldaftar' => date('Y/m/d')]));
    }

    function setLoggedIn($set){
        $username = $this->session->userdata('username');
        $datas    = array(
            'logged_in' => $set
        );
        $this->db->where('username', $username);
        $this->db->update('user', $datas);
    }
}