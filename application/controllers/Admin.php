<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Author : Anugrah Sakti - Sibil 2014
	 */

	public function __construct(){	

		parent::__construct();

		if ($this->session->userdata('username') == '' ) {

			$this->simple_login->cek_users();
		}else{
			
            $cekuser = $this->m_login->cekuser($this->session->userdata('username'));

            foreach ($cekuser as $row) {
                $level = $row['level'];
                $this->session->set_userdata('roles', $level);
                if ($level != '0') {
                    redirect('home');
                }
            }
		}	
	}

	public function index(){

		$data['pagetitle'] 			= "Admin Dashboard - Griya Bangun Asri";
		$data['paidDesign']			= $this->m_data->getPaidInvoice();
		$data['notValidatedDesign']	= $this->m_data->getNeedValidateInvoice();
		$data['notModeratedDesign']	= $this->m_data->getNeedModeratedDesign();
		$data['allAppointment']		= $this->m_data->getAllAppointment();
		$data['allUsers']			= $this->m_data->getAllUsers();
		$data['allDesign']			= $this->m_data->getAllDesign();

		$this->load->view('admin/v_header',$data);
		$this->load->view('admin/v_navbar',$data);
		$this->load->view('admin/v_content',$data);
		$this->load->view('admin/v_footer',$data);
		
	}

	public function appointment(){
		$data['pagetitle'] 			= "Manage Penjadwalan - Griya Bangun Asri";
		$temp 						= $this->m_data->getAllAppointment();
		$i 							= 0;
		
		for ($i=0; $i < count($temp); $i++) { 
			$temp1[$i] 	= $this->m_data->getUsernameByID($temp[$i]['user_id']);
			$temp2[$i] 	= $this->m_data->getUsernameByID($temp[$i]['sianu_id']);
		}

		$temp1 = array_column($temp1,0);
		$temp2 = array_column($temp2,0);

		for ($i=0; $i < count($temp1); $i++) { 

			$temp[$i]['pembuat'] = $temp1[$i]['fname'].' '.$temp1[$i]['lname'];
			$temp[$i]['upembuat'] = $temp1[$i]['username'];
			$temp[$i]['penerima'] = $temp2[$i]['fname'].' '.$temp2[$i]['lname'];
			$temp[$i]['upenerima'] = $temp2[$i]['username'];
		}
		
		$data['appointmentList']		= $temp;

		$this->load->view('admin/v_header',$data);
		$this->load->view('admin/v_navbar',$data);
		$this->load->view('admin/v_penjadwalan',$data);
		$this->load->view('admin/v_footer',$data);
	}


	public function manage_sale(){
		$data['pagetitle'] 			= "Manage Penjualan - Griya Bangun Asri";
		$temp 						= $this->m_data->getPaidInvoice();
		$i 							= 0;
		
		for ($i=0; $i < count($temp); $i++) { 
			$temp1[$i] 	= $this->m_data->getUsernameByID($temp[$i]['id_user']);
			$temp2[$i] 	= $this->m_data->getUsernameByID($temp[$i]['id_sianu']);
		}

		$temp1 = array_column($temp1,0);
		$temp2 = array_column($temp2,0);

		for ($i=0; $i < count($temp1); $i++) { 

			$temp[$i]['pembeli'] = $temp1[$i]['fname'].' '.$temp1[$i]['lname'];
			$temp[$i]['penjual'] = $temp2[$i]['fname'].' '.$temp2[$i]['lname'];
		}
		

		$data['paidDesign']		= $temp;


		$this->load->view('admin/v_header',$data);
		$this->load->view('admin/v_navbar',$data);
		$this->load->view('admin/v_manage_sale',$data);
		$this->load->view('admin/v_footer',$data);
	}

	public function manage_invoice(){
		$data['pagetitle'] 			= "Manage Penjualan - Griya Bangun Asri";
		$temp 						= $this->m_data->getNeedValidateInvoice();
		$i 							= 0;
			
		if (!empty($temp)) {
			for ($i=0; $i < count($temp); $i++) { 
				$temp1[$i] 	= $this->m_data->getUsernameByID($temp[$i]['id_user']);
				$temp2[$i] 	= $this->m_data->getUsernameByID($temp[$i]['id_sianu']);
			}

				$temp1 = array_column($temp1,0);
				$temp2 = array_column($temp2,0);

			for ($i=0; $i < count($temp1); $i++) { 

				$temp[$i]['pembeli'] = $temp1[$i]['fname'].' '.$temp1[$i]['lname'];
				$temp[$i]['penjual'] = $temp2[$i]['fname'].' '.$temp2[$i]['lname'];
			}

			$data['paidDesign']		= $temp;

		}else{

			$data['paidDesign']		= [];
		}


		$this->load->view('admin/v_header',$data);
		$this->load->view('admin/v_navbar',$data);
		$this->load->view('admin/v_manage_invoice',$data);
		$this->load->view('admin/v_footer',$data);
	}

	public function manage_portofolio(){
		$data['pagetitle'] 			= "Manage Portofolio - Griya Bangun Asri";

		$temp 						= $this->m_data->getAllDesign();
		$i 							= 0;
			
		if (!empty($temp)) {
			for ($i=0; $i < count($temp); $i++) { 
				$temp1[$i] 	= $this->m_data->getUsernameByID($temp[$i]['user_id']);
				$temp2[$i] 	= $this->m_data->getUsernameByID($temp[$i]['related_id']);
			}

				$temp1 = array_column($temp1,0);
				$temp2 = array_column($temp2,0);

			for ($i=0; $i < count($temp1); $i++) { 

				$temp[$i]['arsitek'] = $temp1[$i]['fname'].' '.$temp1[$i]['lname'];
				$temp[$i]['tukang'] = $temp2[$i]['fname'].' '.$temp2[$i]['lname'];
			}

			$data['portofolioList']		= $temp;

		}else{

			$data['portofolioList']		= [];
		}

		$this->load->view('admin/v_header',$data);
		$this->load->view('admin/v_navbar',$data);
		$this->load->view('admin/v_portofolio',$data);
		$this->load->view('admin/v_footer',$data);
	}

	public function manage_portofolio_moderate(){
		$data['pagetitle'] 			= "Manage Portofolio - Griya Bangun Asri";

		$temp 						= $this->m_data->getNeedModeratedDesign();
		$i 							= 0;
			
		if (!empty($temp)) {
			for ($i=0; $i < count($temp); $i++) { 
				$temp1[$i] 	= $this->m_data->getUsernameByID($temp[$i]['user_id']);
				$temp2[$i] 	= $this->m_data->getUsernameByID($temp[$i]['related_id']);
			}

				$temp1 = array_column($temp1,0);
				$temp2 = array_column($temp2,0);

			for ($i=0; $i < count($temp1); $i++) { 

				$temp[$i]['arsitek'] = $temp1[$i]['fname'].' '.$temp1[$i]['lname'];
				$temp[$i]['tukang'] = $temp2[$i]['fname'].' '.$temp2[$i]['lname'];
			}

			$data['portofolioList']		= $temp;

		}else{

			$data['portofolioList']		= [];
		}

		$this->load->view('admin/v_header',$data);
		$this->load->view('admin/v_navbar',$data);
		$this->load->view('admin/v_portofolio',$data);
		$this->load->view('admin/v_footer',$data);
	}

	public function manage_user(){
		
		$data['pagetitle'] 			= "Admin Dashboard - Griya Bangun Asri";
		$data['userList']			= $this->m_data->getAllUsers();

		$this->load->view('admin/v_header',$data);
		$this->load->view('admin/v_navbar',$data);
		$this->load->view('admin/v_manage_user',$data);
		$this->load->view('admin/v_footer',$data);
	}


	public function delete_invoice($id){
		if (!empty($this->session->userdata('username'))){

			$userdata 	= $this->m_data->getUserdataByUsername($this->session->userdata('username'));
			$set  = array('status' => 3 ); // 3 dihapus, 2 dibatalkan, 1 divalidasi
			if($this->m_data->update_dataX($set,'invoice','id = '.$id)){
				echo "true";
			}else{
				echo "false";
			}

		}else{
			redirect('admin');
		}
	}


	public function check_invoice(){
		if (isset($_POST) && !empty($_POST)) {

			$penjual = $this->m_data->getUsernameByID($_POST['penjualid']);
			$pembeli = $this->m_data->getUsernameByID($_POST['pembeliid']);

			$invoice = $this->m_data->getUserData('invoice','id = '.$_POST['orderid'],'portofolio','portofolio.id_port = invoice.id_post','left');

			for ($i=0; $i < count($invoice) ; $i++) { 
				foreach ($invoice as $key) {
					echo '<table class="table table-hover no-footer">
						    <tbody>
						      <tr>
						        <td>Tanggal Invoice</td>
						        <td class="text-center" style="width:30px">:</td>
						        <td>'.date('D, d M Y',strtotime($key['invoicedate'])).'</td>
						      </tr>
						      <tr>
						        <td>No. Invoice</td>
						        <td class="text-center" style="width:30px">:</td>
                                 <td><a href="'.base_url('home/invoice/'.$key['no_invoice']).'">'.$key['no_invoice'].'</a></td>
						        
						      </tr>
						      <tr>
						        <td>No. Order</td>
						        <td class="text-center" style="width:30px">:</td>
						        <td>'.$key['id'].'</td>
						      </tr>
						      <tr>
						        <td>Nama Design</td>
						        <td class="text-center" style="width:30px">:</td>
						        <td><a href="'.$key['url'].'"> '.$key['title'].'</a></td>
						      </tr>
						      <tr>
						        <td>Pembeli</td>
						        <td class="text-center" style="width:30px">:</td>
						        <td><a href="'.base_url('home/profile/'.$pembeli[$i]['username']).'"> '.ucwords($pembeli[$i]['fname'].' '.$pembeli[$i]['lname']).'</a></td>
						      </tr>
						      <tr>
						        <td>Penjual / Author</td>
						        <td class="text-center" style="width:30px">:</td>
						        <td><a href="'.base_url('home/profile/'.$penjual[$i]['username']).'"> '.ucwords($penjual[$i]['fname'].' '.$penjual[$i]['lname']).'</a></td>
						      </tr>
						      <tr>
						        <td>Harga</td>
						        <td class="text-center" style="width:30px">:</td>
						        <td>'."Rp " . number_format($key['harga'],2,',','.').'</td>
						      </tr>
						      <tr>
						        <td>Status</td>
						        <td class="text-center" style="width:30px">:</td>
						        <td>'.($key['status'] == 1 ? '<b style="color : green">Dibayar</b>' : ( $key['status'] == 2 ? '<b style="color : red">Dibatalkan</b>'  : '<b style="color : orange">Menunggu Validasi</b>' )).'</td>
						      </tr>
						      <tr>
						        <td>Bukti Pembayaran</td>
						        <td class="text-center" style="width:30px">:</td>
						        <td><img src="'.base_url($key['urlbukti']).'"></td>
						      </tr>
						    </tbody>
						  </table>';
				}
			}
		}
	}

	public function validate_invoice($noinvoice){
		echo $noinvoice;
	}
}
