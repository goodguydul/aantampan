<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_data extends CI_Model{

    
    function getUsernameByID($id){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id',$id);
        $query  =   $this->db->get();
        return $query->result_array();
    }

    function getContents(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level > 1 ');
        $query  =   $this->db->get();
        return $query->result_array();
    }

    function getIDByUsername($username){

        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('username',$username);
        $query  =   $this->db->get();
        return $query->result_array();
    }

    function save_data($data){
        $this->db->insert('user', $data); 
    }

    function update_data($id,$data){

        $this->db->trans_start();

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }else{
            return true;
        }        
    }

    function checkUsername($username){

        $this->db->select('username');
        $this->db->from('user');
        $this->db->where('username',$username);
        $query      = $this->db->get();
        return $query->result_array();
    }

    function getUserdataByUsername($username){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$username);
        $query = $this->db->get();
        return $query->result_array();
    }

    function make_appointment($data){


        $where  = [
                    'sianu_id'  => $data['sianu_id'], 
                    'tanggal'   => $data['tanggal'],
                    'waktu'     => $data['waktu']
                  ];

        $check  = $this->getUserData('janjitemu',$where);
        if (!empty($check)) {

            $data['waktu'] = date('H:i:s',strtotime($data['waktu']));

            foreach ($check as $row) {

                if ($row['waktu'] !== $data['waktu'] && $row['tanggal'] !== $data['tanggal']) {

                    $this->db->insert('janjitemu', $data);

                    return "Jadwal telah diatur! Silahkan hubungi pihak yang bersangkutan.";

                }elseif ($row['waktu'] == $data['waktu'] && $row['tanggal'] == $data['tanggal'] ) {
                    
                    return "Mohon Maaf, Tanggal dan Waktu temu yang dipilih tidak tersedia";

                } elseif ($row['waktu'] === $data['waktu'] ) {
                    
                    return "Mohon Maaf,  Waktu Temu yang dipilih tidak tersedia";

                }elseif ( $row['tanggal'] === $data['tanggal'] ) {

                    return "Mohon Maaf,  Tanggal temu yang dipilih tidak tersedia";
                }
            }   
        }else{
            
            $this->db->insert('janjitemu', $data);

            return "Jadwal telah diatur! Silahkan hubungi pihak yang bersangkutan.";

        }
    }

    function getUserData($table,$where){

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query  =   $this->db->get();
        return $query->result_array();
    }

    function checkJadwal($id,$date){
        $this->db->select('*');
        $this->db->from('janjitemu');
        $this->db->where('sianu_id',$id);
        $this->db->where('tanggal',$date);
        $query  =   $this->db->get();
        return $query->result_array();
    }

    function save_portofolio($id,$data){
        if ($this->db->insert('portofolio',$data)) {
            return true;
        }else{
            return false;
        }
        
    }

    function countpost($id){
        $this->db->select('*');
        $this->db->from('portofolio');
        $this->db->where('user_id',$id);
        $query      = $this->db->get();
        return $query->result_array();
    }

    function getListTukang(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level','3');
        $query  =   $this->db->get();
        return $query->result_array();
    }
    
    function getPortofolioData($id,$title){

        $this->db->select('*');
        $this->db->from('portofolio');
        $this->db->where('portofolio.user_id',$id);
        $this->db->where('portofolio.title',$title);
        $this->db->join('user','user.id = portofolio.user_id');
        //$this->db->join('user','user.id = portofolio.related_id','left');
        $query  =   $this->db->get();
        return $query->result_array();

    }

    function getPostContent($id){

        $this->db->select(' *');
        $this->db->from('portofolio');
        $this->db->where('portofolio.id_port',$id);
        $this->db->join('user','user.id = portofolio.user_id','cross');
        //$this->db->join('user','user.id = portofolio.related_id','left');
        $query  =   $this->db->get();
        return $query->result_array();
    }

    function countInvoice(){
        $this->db->select('*');
        $this->db->from('invoice');
        $query      = $this->db->get();
        return count($query->result_array());
    }
}