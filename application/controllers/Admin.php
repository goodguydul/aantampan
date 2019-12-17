<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

		echo "coming very soon halaman admin";
		
	}

}
