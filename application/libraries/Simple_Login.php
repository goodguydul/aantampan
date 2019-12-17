<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    
    var $CI = NULL;
    
    /**
     * Class constructor
     *
     * @return   void
     */
    public function __construct(){
        $this->CI =& get_instance();
    }
    
    public function login($username, $password){
        
        //cek username dan password
        $query = $this->CI->db->get_where('user', array(
            'username' => $username,
            'password' => md5($password)
        ));
        
        if ($query->num_rows() == 1) {

            $this->CI->session->set_userdata('username', $username);

            //update logged in status
            $datas = array(
                'logged_in' => 1
            );

            $this->CI->db->where('username', $username);
            $this->CI->db->update('user', $datas);
            
            //get user data

            $this->CI->db->select('*');
            $this->CI->db->from('user');
            $this->CI->db->where('username', $username);
            $query = $this->CI->db->get();
            
            foreach ($query->result_array() as $row) {
                $level = $row['level'];
                $this->CI->session->set_userdata('roles', $level);
                if ($level == '0') {
                    redirect(site_url('admin'));
                } else {
                    redirect(site_url('home'));
                }
            }
        } else {
            
            $this->CI->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Username atau password anda salah</strong>, silakan coba lagi!</div>');
            
            redirect(site_url('login'));
        }
        return false;
    }
    
    public function cek_users(){
        
        //cek session username
        $username = $this->CI->session->userdata('username');
        if ($this->CI->session->userdata('username') == '') {
            
            $this->CI->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Sesi Anda sudah habis!</strong>, silahkan login kembali!</div>');
            
            redirect(site_url('login'));
        }
    }
    
    public function logout(){
        
        $this->CI->m_login->setLoggedIn('0');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->set_flashdata('status', '<div class="alert alert-success"><strong>Berhasil!</strong> Anda telah logout</div>');
        redirect('login');
    }

    public function register($data){

        $ada    = 0;
        $adaa   = "";
        
        $this->CI->db->select('*');
        $this->CI->db->from('user');
        $this->CI->db->where('username',$data['username'] );
        $query = $this->CI->db->get();

        if ($query->num_rows() > 0) {
            $ada +=1;
            $ada .= "username,";
        } 

        $this->CI->db->select('*');
        $this->CI->db->from('user');
        $this->CI->db->where('email',$data['email'] );
        $query = $this->CI->db->get();

        if ($query->num_rows() > 0) {
            $ada += 1;
            $ada .= "email";

        } 

        if ($ada == 1 && $adaa == "username,") {       
            $this->CI->session->set_flashdata('register', '<div class="alert alert-danger"><strong>Username telah digunakan</strong>, silahkan coba lagi!</div>');
            redirect('login/register');
        }
        else if($ada == 1 && $adaa == "email"){

            $this->CI->session->set_flashdata('register', '<div class="alert alert-danger"><strong>Email telah digunakan</strong>, silahkan coba lagi!</div>');
            redirect('login/register');


        }else if($ada == 2){

            $this->CI->session->set_flashdata('register', '<div class="alert alert-danger"><strong>Username dan Email telah digunakan</strong>, silahkan coba lagi!</div>');
            redirect('login/register');

        }
        // else{
        //     $this->CI->session->set_flashdata('register', '<div class="alert alert-success"><strong>Registrasi Berhasil!</strong>, Silahkan login!</div>');
        //     redirect('login/register');
        // }

        unset($data['confirm_password']);
        $data['password'] = md5($data['password']);
        $merged = array_merge($data, ['logged_in' => 0, 'level' => 1]);

        if ($ada == 0) {
            $this->CI->m_login->register($merged);
            $this->CI->session->set_flashdata('register', '<div class="alert alert-success"><strong>Registrasi Berhasil!</strong>, Silahkan login!</div>');
            redirect('login/register');
        }
    }
}