<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Author : Anugrah Sakti - Sibil 2014
	 */
	public function index(){

		$data['pagetitle']	= 'Griya Bangun Asri - Home';
		$data['contents']	= $this->m_data->getContents();
		//print_r($data['contents']);

		$this->load->view('home/v_header',$data);
		$this->load->view('home/v_navbar',$data);
		$this->load->view('home/v_content',$data);
		$this->load->view('home/v_footer',$data);
		
	}

	public function profile($username=null){
		if ($username !== null) {
			
			$data['pagetitle']	= 'Griya Bangun Asri - Profile ' . ucwords($username);
			$data['uname']		= $username;
			$data['userdata']	= $this->m_data->getUserdataByUsername($username);
			if (!empty($data['userdata'])) {
				
				$this->load->view('home/v_header',$data);
				$this->load->view('home/v_navbar',$data);	
				$this->load->view('dashboard/v_profile',$data);
				$this->load->view('home/v_footer',$data);

			}else{
				redirect('404');
			}	

		}else{
			redirect('dashboard/profile');

		}
	}

	public function about(){
		$data['pagetitle']	= 'Griya Bangun Asri - Portofolio';

		$this->load->view('home/v_header',$data);
		$this->load->view('home/v_navbar',$data);	
		//$this->load->view('home/v_portofolio',$data);
		$this->load->view('home/v_footer',$data);
		
	}

	public function make_appointment($username=null){

		if ($username !== null) {
			
			if (!empty($this->session->userdata('username'))) {
				
				if (isset($_POST) && !empty($_POST)) {
					
					$status = $this->m_data->make_appointment($_POST);
					$this->session->set_flashdata('status', '<div class="alert alert-info"><strong>'.$status.'</strong></div>');
					redirect('home/profile/'.$username);

				}else{

					$start 		= "08:00";
					$end 		= "17:00";

					$tStart 	= strtotime($start);
					$tEnd 		= strtotime($end);
					$tNow 		= $tStart;

					while($tNow <= $tEnd){
					  $times[] = date("H:i",$tNow);
					  $tNow = strtotime('+30 minutes',$tNow);
					}

					$data['pagetitle']	= 'Griya Bangun Asri - Buat Janji Temu Dengan ' . ucwords($username);
					$data['uname']		= $username;
					$data['userdata']	= $this->m_data->getUserdataByUsername($this->session->userdata('username'));
					$data['sianu']		= $this->m_data->getUserdataByUsername($username);
					$data['timerange']	= $times;


					if ($data['sianu'][0]['level'] == '2') {

						$type = 'Arsitek';

					}elseif ($data['sianu'][0]['level'] == '3') {
						
						$type = 'Mandor Tukang';

					}else{
						$type	= '';
					}

					$data['type']		= $type;

					if (!empty($data['sianu'])) {

						if (!$this->session->userdata('username') == '') {
							$this->load->view('home/v_header',$data);
							$this->load->view('home/v_navbar',$data);	
							$this->load->view('home/v_janji_temu',$data);
							$this->load->view('home/v_footer',$data);
						}else{

							redirect('home/profile/'.$username);
						}	
					
					}else{

						redirect('404');
					
					}
				
				}
			
			}else{
				$this->session->set_flashdata('status', '<div class="alert alert-danger"><strong>Anda harus Login untuk Membuat Janji Temu!</strong></div>');
				redirect('login');			
			}		
		}else{

			redirect('dashboard/profile');

		}
	}

	public function check_appointment(){
		if (isset($_POST) && !empty($_POST)) {

			$data = $this->m_data->checkJadwal($_POST['id'], $_POST['checkdate']);
			$available1 =[];
			$available2	=[];
			$start 		= "08:00";
			$end 		= "17:00";

			$tStart 	= strtotime($start);
			$tEnd 		= strtotime($end);
			$tNow 		= $tStart;

			while($tNow <= $tEnd){
				$times[] = date("H:i",$tNow);
				$tNow = strtotime('+30 minutes',$tNow);
			}

			$i=0;

			foreach ($times as $key => $value ) {
				$available1[ $value.':00']['jam'] 		= $value.':00';
				$available1[ $value.':00']['status']	= 'Available';
				$i++;
			}

			foreach ($data as $row) {
				$available2[ $row['waktu']]['jam'] 		= $row['waktu'];
				$available2[ $row['waktu']]['status'] 	= 'Not Available';
				$i++;
			}

			$status = array_merge($available1,$available2);

			foreach ($status as $key) {

				if ($key['status']=='Not Available') {
					$red = 'style="color:red;"';
				}else{
					$red = 'style="color:green;"';
				}

				echo "<tr>";
				echo "<td ".$red.">";
				echo $key['jam'];
				echo "</td>";
				echo "<td ".$red.">";
				echo $key['status'];
				echo "</td>";
				echo "</tr>";
			}

		}	
	}

	public function post($title){

		$title		= str_replace('-', ' ', $title);
		$id 		= $this->getUserData('portofolio','id = '.$id); 

		//$contents 	= $this->getUserData('portofolio','id = '.$id); 


	}
}
