<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Author : Anugrah Sakti - Sibil 2014
	 */

	public function __construct(){	

		parent::__construct();

		if ($this->session->userdata('username') == '') {

			$this->simple_login->cek_users();
		}	
	}

	public function index(){

		$data['pagetitle']	= 'Griya Bangun Asri - Dashboard';

		$this->load->view('dashboard/v_header',$data);
		$this->load->view('home/v_navbar',$data);
		$this->load->view('dashboard/v_content',$data);
		$this->load->view('dashboard/v_footer',$data);
		
	}

	public function profile($param = null){
		if ($param !== null) {
			redirect('home/profile/'.$param);
		}

		$username 	= $this->session->userdata('username');

		$data['pagetitle']	= 'Griya Bangun Asri - Profile';
		$data['uname']		= $username;
		$data['userdata']	= $this->m_data->getUserdataByUsername($username);
		$data['listtukang'] = $this->m_data->getListTukang();
		$data['portofolio'] = $this->m_data->getUserData('portofolio','user_id = '.$data['userdata'][0]['id']);

		$data['level']		= $data['userdata'][0]['level'];

		if (!$this->session->userdata('username') == '') {
			$this->load->view('dashboard/v_header',$data);
			$this->load->view('home/v_navbar',$data);	
			$this->load->view('dashboard/v_profile',$data);
			$this->load->view('dashboard/v_footer',$data);
		}else{

			$this->simple_login->cek_users();
		}	
	}

	public function edit_profile(){

		if (!$this->session->userdata('username') == '') {
		
			$username 		= $this->session->userdata('username');
			$check 			= $this->m_data->checkUsername($username);
			if ($check == null || empty($check)) {
				$username 	= $this->session->userdata('username');
			}else{
				$username 	= $check[0]['username'];
			}

			$data['pagetitle']	= 'Griya Bangun Asri - Portofolio';
			$data['userdata']	= $this->m_data->getUserdataByUsername($username);


			$this->load->view('dashboard/v_header',$data);
			$this->load->view('home/v_navbar',$data);	
			$this->load->view('dashboard/v_edit_profile',$data);
			$this->load->view('dashboard/v_footer',$data);
		}else{

			$this->simple_login->cek_users();
		}	
	}

	public function update_profile(){

		$id = $this->m_data->getIDByUsername($this->session->userdata('username'));

		if (isset($_POST) && !empty($_POST)) {
			if ($this->m_data->update_data($id[0]['id'], $_POST) === true){
				$this->session->set_flashdata('status', '<div class="alert alert-success"><strong>Profile Telah Diperbaharui!</strong></div>');  
				redirect('dashboard/profile');
			}else{
				$this->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Profile gagal Diperbaharui! Harap hubungi administrator.</strong></div>');
			redirect('dashboard/edit_profile');
			}
		}else{
			
			$this->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Profile gagal Diperbaharui! Harap hubungi administrator.</strong></div>');
			redirect('dashboard/edit_profile');

		}
	}

	public function change_password(){

		
		$data['pagetitle']	= 'Griya Bangun Asri - Change Password';

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');    
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><strong>','</strong></div>');    
        
        if ($this->form_validation->run() == FALSE) { 

            $this->load->view('dashboard/v_header',$data);
			$this->load->view('home/v_navbar',$data);	
			$this->load->view('dashboard/v_change_password');
			$this->load->view('dashboard/v_footer',$data);   
        }else{  

			$id = $this->m_data->getIDByUsername($this->session->userdata('username'));
            $post                   = $this->input->post(NULL, TRUE);          
            $cleanPost              = $this->security->xss_clean($post);          
            $hashed                 = md5($cleanPost['password']);          
            $cleanPost['password']  = $hashed;  
 
            unset($cleanPost['passconf']);

            if ($this->m_data->update_data($id[0]['id'], $cleanPost) === true){
				$this->session->set_flashdata('status', '<div class="alert alert-success"><strong>Password telah diganti, harap login ulang!</strong></div>');
				$this->m_login->setLoggedIn('0');
        		$this->session->unset_userdata('username');  
				redirect('login');

			}else{
				$this->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Profile gagal Diperbaharui! Harap hubungi administrator.</strong></div>');
				redirect('dashboard/change_password');

			}
		}
	}


	public function add_portofolio(){
		
		if (isset($_FILES['img_url']['name']) && !empty($_FILES) && isset($_POST) && !empty($_POST) ) {
			
			$username 	= $this->session->userdata('username');
			$id 		= $this->m_data->getIDByUsername($username);
			$paths 		= './assets/img/upload/';
			$count      = count($this->m_data->countpost($id[0]['id']));
			$ext 		= pathinfo($_FILES['img_url']['name'], PATHINFO_EXTENSION);
			$new_name 	= $username.'_portofolio_'.$count.'.'.$ext;
			$url 		= str_replace('+', '-', urlencode($_POST['title'])).'-'.$id[0]['id'];

			$_POST['url'] 		= base_url('home/post/'.strtr(base64_encode($url), '+/=', '._-')); 
			$_POST['img_url']	= $paths.$new_name;
			$_POST['user_id']	= $id[0]['id'];

			$config['upload_path'] 		= $paths;
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$config['file_name'] 		= $new_name;
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('img_url')){
				$this->session->set_flashdata('status', '<div class="alert alert-success"><strong>Portofolio Ditambahkan!</strong></div>');
				redirect('dashboard/profile');
				
			}else{

				$datax = $this->upload->data();
			    //Compress Image
			    $config['image_library']='gd2';
			    $config['source_image']	= $paths.$datax['file_name'];
			    $config['create_thumb']	= FALSE;
			    //$config['remove_spaces']= FALSE;
			    $config['maintain_ratio']= FALSE;
			    $config['quality']		= '60%';
			    // $config['width']		= 500;
			    // $config['height']	= 500;
			    $config['new_image']	= $paths.$datax['file_name'];
			    $this->load->library('image_lib', $config);

			    //$this->image_lib->resize();
			    if (!$this->image_lib->resize()){
				    echo $this->image_lib->display_errors();
				}
				
				//$this->image_lib->crop();
			   	if ($this->m_data->save_portofolio($id[0]['id'],$_POST) === true) {
			   		$this->session->set_flashdata('status', '<div class="alert alert-success"><strong>Portofolio Ditambahkan!</strong></div>');
					redirect('dashboard/profile');

			   	}else{
			   		$this->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Gagal Tambah Portofolio </strong></div>');
					redirect('dashboard/profile');
			   	}
			}
		}
	}

	public function checkjadwal(){
		if (isset($_POST) && !empty($_POST)) {

			$data = $this->m_data->checkJadwal($_POST['id'], $_POST['checkdate']);
			


			print_r($data);
			//foreach ($status as $key) {

				// echo "<tr>";
				// echo "<td>";
				// echo $key['jam'];
				// echo "</td>";
				// echo "<td>";
				// echo $key['status'];
				// echo "</td>";
				// echo "</tr>";
			//}

		}	
	}

	public function upload_photo(){


		if (isset($_FILES['photopath']['name']) && !empty($_FILES)) {

			$username 	= $this->session->userdata('username');
			$id 		= $this->m_data->getIDByUsername($username);
			$oldpath	= $this->m_data->getUserdataByUsername($username);

			if (isset($oldpath[0]['photopath'])) {
				unlink($oldpath[0]['photopath']);				
			}

			$path 	= $_FILES['photopath']['name'];
			$ext 	= pathinfo($path, PATHINFO_EXTENSION);


			$config['upload_path'] 		= './assets/img/upload/';
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$new_name 					= $username.'.'.$ext;
			$config['file_name'] 		= $new_name;
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('photopath')){
				$this->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Gagal Upload Photo! Error : '.$this->upload->display_errors().'</strong></div>');
				return FALSE;
				redirect('dashboard/edit_profile');
			}else{

				$datax = $this->upload->data();
			    //Compress Image
			    $config['image_library']='gd2';
			    $config['source_image']	='./assets/img/upload/'.$datax['file_name'];
			    $config['create_thumb']	= FALSE;
			    //$config['remove_spaces']= FALSE;
			    $config['maintain_ratio']= FALSE;
			    $config['quality']		= '60%';
			    $config['width']		= 500;
			    $config['height']		= 500;
			    $config['new_image']	= './assets/img/upload/'.$datax['file_name'];
			    $this->load->library('image_lib', $config);

			    //$this->image_lib->resize();
			    if (!$this->image_lib->crop()){
				    echo $this->image_lib->display_errors();
				}

				//$this->image_lib->crop();
			   	if ($this->m_data->update_data($id[0]['id'],array('photopath'=> $config['new_image']))===true) {
			   		$this->session->set_flashdata('status', '<div class="alert alert-success"><strong>Foto berhasil diganti!</strong></div>');
					redirect('dashboard/profile');

			   	}
			}
		}
		
	}
}
