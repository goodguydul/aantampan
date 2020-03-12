<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {


	public function index(){

		$data['pagetitle']	= 'tes';

		$this->load->view('home/v_header',$data);
		$this->load->view('tes');

	}


	public function tesmultiform(){

		if (isset($_FILES) && !empty($_FILES)) {
			foreach ($_FILES as $key => $value) {

				if($key == 'userimage'){

					$this->upload_func("./uploads/profile/user/", $_FILES, $key);

				}elseif($key == 'userfile'){

					$this->upload_func("./uploads/resume/", $_FILES, $key);
						
				}elseif($key == 'userfilesupport'){

					$this->upload_func("./uploads/attachment/", $_FILES, $key);

				}else{
					echo 'Key dari $_FILES tidak valid';
				}
				
			}
			
		}
		
	}


	private function upload_func($direktori,$files,$name){

		if ($name == "userfile" || $name == "userfilesupport") {
			if ($this->upload_pdf($direktori,$files,$name)) {
				echo $name. ' Berhasil diupload<br>';
			}else{
				echo $name. ' Gagal diupload<br>';
			}
		}

		if ($name == 'userimage') {
			if ($this->upload_img($direktori,$files,$name)) {
				echo $name. ' Berhasil diupload<br>';
			}else{
				echo $name. ' Gagal diupload<br>';
			}
		}

	}

	private function upload_pdf($direktori,$files,$name){

		$file_name 				= time().'_'.$files[$name]['name'];
		$config['upload_path'] 	= $direktori;
		$config['allowed_types']= 'pdf';
		$config['file_name'] 	= $file_name;
		
		$this->upload->initialize($config);
		if(!$this->upload->do_upload($name)){

			echo $this->upload->display_errors();

			return FALSE;

		}else{

		    //disini tambahin function untuk insert/update ke database
		    return true;
		
		}
	}

	private function upload_img($direktori,$files,$name){

		$config['upload_path'] 		= $direktori;
		$config['allowed_types'] 	= 'jpg|jpeg|png';
		$new_name 					= time().'_'.$files[$name]['name'];
		$config['file_name'] 		= $new_name;
			
		$this->upload->initialize($config);

		if(!$this->upload->do_upload($name)){
			echo $this->upload->display_errors();
			return FALSE;
			#error

		}else{
			    //----------------------------------- IMAGE CROPPING & COMPRESSING ADA DIBAWAH INI ---------------------

				// $datax = $this->upload->data();
			    
			    //Compress Image

			    // $this->load->library('image_lib');

			    // $config['image_library']	='gd2';
			    // $config['source_image']		= $direktori.$datax['file_name'];
			    // $config['maintain_ratio']	= FALSE;



			    // $temp						= $this->image_lib->get_image_properties($config['source_image'], TRUE);

			    // $imageSize['width'] 		= $temp['width'];
			    // $imageSize['height'] 	= $temp['height'];

       			// $newSize 				= min($imageSize);
			    // $config['quality']		= '60%';
			    // $config['width'] 		= $newSize;
		     	// $config['height'] 		= $newSize;
		     	// $config['y_axis'] 		= ($imageSize['height'] - $newSize) / 2;
		     	// $config['x_axis'] 		= ($imageSize['width'] - $newSize) / 2;
			    
			    // $config['new_image']		= $direktori.$datax['file_name'];

			    // $this->image_lib->initialize($config);

			    // if(!$this->image_lib->crop()){
		     //        echo $this->image_lib->display_errors();
		     //    }

			   	//disini tambahin function untuk insert/update ke database
		    	return true;
		
		}
	}

	//upload user image
	
}
