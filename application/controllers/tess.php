<?php 

			if (isset($_FILES) && !empty($_FILES)) {
					foreach ($_FILES as $key => $value) {
						if($key == 'userimage'){

							$image = $this->uploadFile("./uploads/profile/user/", $_FILES, $key);

						}elseif($key == 'userfile'){

							$resume = $this->uploadFile("./uploads/resume/", $_FILES, $key);
						
						}elseif($key == 'userfilesupport'){

							$attachment = $this->uploadFile("./uploads/attachment/", $_FILES, $key);

						}else{
							$data['file_error'] = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('file_error','Error! Please select a valid file formate');
							redirect(base_url('profile'));	
						}
					}
					
				}


	private function uploadFile($directory, $files, $name){
		$user_id = $this->session->userdata('user_id');
		$data['user_info'] = $this->profile_model->get_user_by_id($user_id);
			if ($name == 'userimage') {
					$old_image = $data['user_info']['image'];
					if(!empty($files['userimage']['name']))
					{

		               $config = array(
							'upload_path' => $directory,
							'allowed_types' => "jpg|png|gif",
							'overwrite' => TRUE,
							'max_size' => "548000" // Can be set to particular file size , here it is 0.5 MB(548 Kb)
						);

		                $new_name = time().$files['userimage']['name'];
						$config['file_name'] = $new_name;
					

		                $this->load->library('upload', $config);
		                
		                if ($this->upload->do_upload('userimage')) {
		    //              var_dump($new_name);
						// die();
		                    $file_data = array('upload_data' => $this->upload->data());
							$dataImage =  'uploads/profile/user/'. $file_data['upload_data']['file_name'];
							
							if ($dataImage != 'uploads/profile/user/user.png' && $dataImage != $old_image ) {
								
                 			   unlink(FCPATH . $old_image);
                			}

                			return $dataImage;
		                    
		                } 
		            }else{
		            	return $old_image;
		            }
		            // end upload user image code		
				}elseif ($name == 'userfile') {
					// upload resume 

					$old_resume = $data['user_info']['resume'];

					if(!empty($files['userfile']['name']))
					{

						$config = array(
							'upload_path' => $directory,
							'allowed_types' => "docx|doc|pdf",
							'overwrite' => TRUE,
							'max_size' => "548000" // Can be set to particular file size , here it is 0.5 MB(548 Kb)
							);

						$new_name = time().$files['userfile']['name'];
						$config['file_name'] = $new_name;
					
						$this->load->library('upload', $config);

						if($this->upload->do_upload('userfile'))
						{
							
							$file_data = array('upload_data' => $this->upload->data());
							$dataResume =  'uploads/resume/'. $file_data['upload_data']['file_name'];
							
							if ($dataResume != $old_resume && $old_resume != "") {
                 			   unlink(FCPATH . $old_resume);
                			}

                			return $dataResume;
						}
					}else{
						if(!empty($old_resume)){
							return $old_resume;
						}
					}
					//end resume upload code
				}elseif($name == 'userfilesupport'){
					// upload attachment 
					$old_attachment = $data['user_info']['attachment'];
					if(!empty($files['userfilesupport']['name']))
					{
						$config = array(
							'upload_path' => $directory,
							'allowed_types' => "docx|doc|pdf",
							'overwrite' => TRUE,
							'max_size' => "921600" // Can be set to particular file size , here it is 0.5 MB(548 Kb)
							);

						$new_name = time().$files['userfilesupport']['name'];
						$config['file_name'] = $new_name;
						// var_dump($new_name);
						// die();
						$this->load->library('upload', $config);

						if($this->upload->do_upload('userfilesupport'))
						{
							$file_data = array('upload_data' => $this->upload->data());
							$dataAttachment =  'uploads/attachment/'. $file_data['upload_data']['file_name'];

							if ($dataAttachment != $old_attachment && $old_attachment != "") {
                 			   unlink(FCPATH . $old_attachment);
                			}

                			return $dataAttachment;
						}
					}else{
						if(!empty($old_attachment)){
							return $old_attachment;
						}else{
							return "";
						}
					}
					//end attachment upload code
				}
	}
?>