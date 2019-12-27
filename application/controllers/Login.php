<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Author : Anugrah Sakti - Sibil 2014
     */
 
    public function index() {

        if (!$this->session->userdata('username')) {
         
            $data['pagetitle'] = "Griya Bangun Asri - Login Page";
            
            $valid = $this->form_validation;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $valid->set_rules('username','Username','required');
            $valid->set_rules('password','Password','required');
     
            if($valid->run()) {
                $this->simple_login->login($username,$password);
            }
            $this->load->view('login/v_header',$data);
            $this->load->view('home/v_navbar');   
            $this->load->view('login/v_login');
            $this->load->view('login/v_footer');   

        } else {

            $username = $this->session->userdata('username');
            $data = $this->m_login->get_role($username);
             
            foreach ($data as $row) {
                $level = $row['level'];
                if ($level == '0') {
                    redirect('admin');
                } else {
                    redirect('home');
                }
            }
        }
    }
    public function logout(){
        $this->simple_login->logout();

    }

    public function register(){
        
        $data['pagetitle'] = "Griya Bangun Asri - Register Page";

        if (!$this->session->userdata('username')) {

            $this->load->view('login/v_header',$data);
            $this->load->view('home/v_navbar');   
            $this->load->view('login/v_register');
            $this->load->view('login/v_footer');   
        } else {
            $username = $this->session->userdata('username');
            $data = $this->m_login->get_role($username);
             
            foreach ($data as $row) {
                $level = $row['level'];
                if ($level == '0') {
                    redirect('admin');
                } else {
                    redirect('home');
                }
            }
        }
  
    } 

    public function registerAction(){

        if (!isset($_REQUEST)|| empty($_REQUEST)) {
            redirect('home');
        }
        
        $valid = $this->form_validation;
    
        $valid->set_rules('fname','Nama Depan','required');
        $valid->set_rules('lname','Nama Belakang','required');
        $valid->set_rules('email', 'Email', 'required');
        $valid->set_rules('username','Username','required');
        $valid->set_rules('password','Password','required');
        $valid->set_rules('confirm_password','Confirm Password','required|matches[password]');
        $valid->set_error_delimiters('<div class="alert alert-danger"><strong>','</strong></div>');

        if($valid->run()) {
            $this->simple_login->register($this->input->post());
        }else{
            $this->register();
        }

    }


    public function forgot(){

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
         
        if($this->form_validation->run() == FALSE) {  
            $data['pagetitle'] = 'Griya Bangun Assri - Forgot Password'; 
            $this->load->view('login/v_header',$data);
            $this->load->view('home/v_navbar');   
            $this->load->view('login/v_forgot');  
            $this->load->view('login/v_footer');    
            
        }else{  
            $email      = $this->input->post('email');   
            $clean      = $this->security->xss_clean($email);  
            $userInfo   = $this->m_account->getUserInfoByEmail($clean);  
               
            if(!$userInfo){  
               $this->session->set_flashdata('forgot', '<div class="alert alert-danger"><strong>Email yang dimasukkan salah/tidak terdaftar, silakan coba lagi.</strong></div>');
               redirect('login/forgot');
            }else{
                $token      = $this->m_account->insertToken($userInfo->id); 
                $qstring    = $this->base64url_encode($token);           
                $url        = base_url( 'login/reset_password/' . $qstring);  
                $link       = '<a href="' . $url . '">' . $url . '</a>';   
               
                $message    = '';             
                $message    .= '<strong>Hello, Silahkan klik link dibawah ini untuk mengubah password Anda. Jika ini bukan Anda, harap abaikan saja.</strong><br>';  
                $message    .= '<strong>Silakan klik link berikut ini untuk mengubah password:</strong> ' . $link;         
   
                //echo $message; //send this through mail  
                $this->load->library('email');
                $config  =  array  (
                                    'protocol'  => "smtp",
                                    'smtp_host' => "ssl://smtp.gmail.com",
                                    'smtp_port' => "465",
                                    'smtp_user' => "griyabangunasri@gmail.com",
                                    'smtp_pass' => "ikxtvxldapzeuwpk",
                                    'mailtype'  => 'html',
                                    'charset'   => 'utf-8',
                                    'priority'  => '1',
                                    'newline'   => "\r\n"
                                );

                $this->send_email($config);

                $this->session->set_flashdata('forgot', '<div class="alert alert-success"><strong>Email penggantian password telah terkirim. Silahkan cek email Anda.</strong></div>');
                
                redirect('login/forgot');
            }                
        }  
    }

    public function reset_password(){  
        

        $token       = $this->base64url_decode($this->uri->segment(3));          
        $cleanToken  = $this->security->xss_clean($token);  
        
        $user_info   = $this->m_account->isTokenValid($cleanToken); //either false or array();  

        if(!$user_info){  
            $this->session->set_flashdata('forgot', '<div class="alert alert-danger"><strong>Token tidak valid atau sudah kadaluarsa</strong></div>');  
            redirect('login/forgot');  
        }    
  
        $data       = array(  
                            'pagetitle' => 'Griya Bangun Asri - Reset Password',  
                            'nama'  => $user_info->fname .' '. $user_info->lname,  
                            'email' =>$user_info->email,  
                            'token' =>$this->base64url_encode($token)  
        );  
        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');    
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>','</strong></div>');    
        
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('login/v_header',$data);
            $this->load->view('home/v_navbar');    
            $this->load->view('login/v_reset', $data);
            $this->load->view('login/v_footer');    
        }else{  
            $post                   = $this->input->post(NULL, TRUE);          
            $cleanPost              = $this->security->xss_clean($post);          
            $hashed                 = md5($cleanPost['password']);          
            $cleanPost['password']  = $hashed;  
            $cleanPost['id']        = $user_info->id;  
            unset($cleanPost['passconf']); 

            $this->m_account->deleteToken(substr($token, 0, 30));              

            if(!$this->m_account->updatePassword($cleanPost)){  
                $this->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Update password gagal. Hubungi Admin atau coba lagi</strong></div>');  
            }else{  
                $this->session->set_flashdata('status', '<div class="alert alert-success"><strong>Password anda sudah  
             diperbaharui. Silakan login.</strong></div>'); 
            }  
            redirect('login');        
        }  
    }  
      
    public function base64url_encode($data) {  
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');  
    }  
  
    public function base64url_decode($data) {  
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));  
    } 

    private function send_email($config){

        $this->email->initialize($config);
        $this->email->from('admin@griyabangunasri.com', 'Forgot Password Mail');
        $this->email->to($email);
        $this->email->subject('Password Recovery Mail');
        $this->email->message($message);
        $result     =   $this->email->send();
    }

}
