<?php 

	public function upload_gambar(){

		
		$this->upload_gambar_func('direktori1',$_FILES,'file1');
		$this->upload_gambar_func('direktori2',$_FILES,'file2');
		$this->upload_gambar_func('direktori3',$_FILES,'file3');


	}

	private function upload_gambar_func($direktori,$data,$name){

		if (isset($_FILES[$name]['name']) && !empty($_FILES)) {

			$path 	= $_FILES[$name]['name'];
			$ext 	= pathinfo($path, PATHINFO_EXTENSION);


			$config['upload_path'] 		= $direktori;
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$new_name 					= $path.'.'.$ext;
			$config['file_name'] 		= $new_name;
			
			$this->upload->initialize($config);

			if(!$this->upload->do_upload($name)){
				
				return FALSE;
				#error

			}else{

				$datax = $this->upload->data();
			    //Compress Image

			    $this->load->library('image_lib');

			    $config['image_library']	='gd2';
			    $config['source_image']		= $direktori.$datax['file_name'];
			    $config['maintain_ratio']	= FALSE;

			    $temp						= $this->image_lib->get_image_properties($config['source_image'], TRUE);
			    $imageSize['width'] 		= $temp['width'];
			    $imageSize['height'] 		= $temp['height'];

        		$newSize 					= min($imageSize);
			    //$config['quality']			= '60%';
			    $config['width'] 			= $newSize;
		        $config['height'] 			= $newSize;
		        $config['y_axis'] 			= ($imageSize['height'] - $newSize) / 2;
		        $config['x_axis'] 			= ($imageSize['width'] - $newSize) / 2;
			    
			    $config['new_image']		= $direktori.$datax['file_name'];

			    $this->image_lib->initialize($config);

			     if(!$this->image_lib->crop()){
		            echo $this->image_lib->display_errors();
		        }

			   	if ($this->m_data->update_data($id[0]['id'],array('photopath'=> $config['new_image']))==true) {
			   		$this->session->set_flashdata('status', '<div class="alert alert-success"><strong>Foto berhasil diganti!</strong></div>');
					redirect('dashboard/profile');

			   	}
			}
		}
		
	}

?>