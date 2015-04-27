<?php

class Admin_mading extends Controller {

	function Admin_mading()
	{
		parent::Controller();	
		//load helper
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->helper("tanggal");
		$this->load->helper("file");

		//load session
		$this->load->library("session");

		//load model
		$this->load->model("Model_admin");
		
		//load database
		$this->load->database();
	}

	function daftar_mading()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			//panggil model daftar berita
			$data['mading'] = $this->Model_admin->getMading();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/table_mading", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function tambah_mading()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$data['gambar'] = $this->Model_admin->getGambar();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/add_mading", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_tambah_mading()
	{
		//ambil tanggal dan jam
		$date = date("Y-m-d H:i:s");

		//buat string acak
		$random = rand(000000,999999);

		if(!$_FILES['img']['name']){
			$add = array('judul_berita' => $this->input->post('judul'),
						 'kategori' => 'mading',
						 'isi' => $this->input->post('isi'),
						 'create_date' => $date
				);
			$save = $this->Model_admin->addBerita($add);

			$msg = "Data info mading telah disimpan";
			$this->session->set_userdata('msg', $msg);
			redirect("admin_mading/daftar_mading");			
		}else{
			//konfigurasi upload gambar
			$config['upload_path'] = './system/application/views/images_mading/tmp_img/';
			$config['allowed_types'] = 'jpg';
			$config['file_name'] = $random.'-'.$_FILES['img']['name'];
			$config['max_size'] = '4096';
			$config['max_width'] = '3280';
			$config['max_height'] = '2600';

			//load library upload
			$this->load->library('upload', $config);

			//lakukan upload
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('img')){
				//$cek = var_dump(is_dir('./imagesnews/'));
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('upload_form', $error);
			}else{
			
				//dapatkan ekstensi file
				$ext = pathinfo($random.'-'.$_FILES['img']['name'], PATHINFO_EXTENSION);

				$add = array('judul_berita' => $this->input->post('judul'),
							 'kategori' => 'mading',
							 'isi' => $this->input->post('isi'),
							 'gambar' => $random.'-'.$_FILES['img']['name'],
							 'tipe_file' => $ext,
							 'create_date' => $date
					);

				$save = $this->Model_admin->addBerita($add);

				$getModel = $this->Model_admin->getMadingForm($this->Model_admin->getLastId()); 
				$getData = $getModel->row();
				$d['gambar'] = $getData->gambar;

				$compress['source_image'] = './system/application/views/images_mading/tmp_img/'.$getData->gambar.'.'.$ext;
				$compress['new_image'] = './system/application/views/images_mading/'.$getData->gambar.'.'.$ext;
				$compress['image_library'] = 'gd2';
				$compress['create_thumb'] = FALSE;
				$compress['maintain_ratio'] = FALSE;
				$compress['width'] = '120';
				$compress['height'] = '80';
				$compress['quality'] = '100%';

				//load library image lib
				$this->load->library("image_lib", $compress);

				//lakukan compress gambar
				$this->image_lib->initialize($compress);
				$this->image_lib->resize();

				if ( ! $this->image_lib->resize()){
    				echo $this->image_lib->display_errors();
				}else{
					//hapus temporary gambar
					$path = './system/application/views/images_mading/tmp_img/';
					unlink($path.$d['gambar'].".".$ext);

					$msg = "Data info mading telah disimpan";
					$this->session->set_userdata('msg', $msg);
					redirect("admin_mading/daftar_mading");	
				}
			}
		}
	}

	function edit_mading()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$id = $this->uri->segment(3);

			$getModel = $this->Model_admin->getMadingForm($id); 
			$getData = $getModel->row();

			$data['id'] = $getData->id_berita;
			$data['judul'] = $getData->judul_berita;
			$data['isi'] = $getData->isi;
			$data['gambar'] = $this->Model_admin->getGambar();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/edit_mading", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_edit_mading(){

		if(!$_FILES['img']['name']){
			$data = array(
					'judul_berita'=>$this->input->post('judul'),
					'isi'=>$this->input->post('isi')
				);

			$condition['id_berita'] = $this->input->post('id');

			$this->Model_admin->updateBerita($data, $condition);

			$msg = "Data info mading berhasil diupdate";
			$this->session->set_userdata('msg', $msg);
			redirect("admin_mading/daftar_mading");
		}else{
			//delete gambar lama
			$getModel = $this->Model_admin->getMadingForm($this->input->post('id')); 
			$getData = $getModel->row();
			$d['gambar'] = $getData->gambar;

			if($d['gambar'] != ""){
				$d['tipe_file'] = $getData->tipe_file;
				
				$path = './system/application/views/images_mading/';

				unlink($path.$d['gambar'].".".$d['tipe_file']);
			}

			$random = rand(000000,999999);

			$config['upload_path'] = './system/application/views/images_mading/tmp_img/';
			$config['allowed_types'] = 'jpg';
			$config['file_name'] = $random.'-'.$_FILES['img']['name'];
			$config['max_size'] = '4096';
			$config['max_width'] = '3280';
			$config['max_height'] = '2600';

			//load library upload
			$this->load->library('upload', $config);

			//lakukan upload
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('img')){
				//$cek = var_dump(is_dir('./imagesnews/'));
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('upload_form', $error);
			}else{
			
				$ext = pathinfo($random.'-'.$_FILES['img']['name'], PATHINFO_EXTENSION);

				$data = array(
					'judul_berita'=>$this->input->post('judul'),
					'isi'=>$this->input->post('isi'),
					'gambar' => $random.'-'.$_FILES['img']['name'],
					'tipe_file' => $ext
				);

				$condition['id_berita'] = $this->input->post('id');

				$this->Model_admin->updateBerita($data, $condition);

				$getModel2 = $this->Model_admin->getMadingForm($this->input->post('id')); 
				$getData2 = $getModel2->row();
				$d2['gambar'] = $getData2->gambar;

				//setting compress gambar
				$compress['source_image'] = './system/application/views/images_mading/tmp_img/'.$getData2->gambar.'.'.$ext;
				$compress['new_image'] = './system/application/views/images_mading/'.$getData2->gambar.'.'.$ext;
				$compress['image_library'] = 'gd2';
				$compress['create_thumb'] = FALSE;
				$compress['maintain_ratio'] = FALSE;
				$compress['width'] = '120';
				$compress['height'] = '80';
				$compress['quality'] = '100%';

				//load library image lib
				$this->load->library("image_lib", $compress);

				//lakukan compress gambar
				$this->image_lib->initialize($compress);
				$this->image_lib->resize();

				if ( ! $this->image_lib->resize()){
    				echo $this->image_lib->display_errors();
				}else{
					//hapus temporary gambar
					$path = './system/application/views/images_mading/tmp_img/';
					unlink($path.$d2['gambar'].".".$ext);

					$msg = "Data info mading berhasil diupdate";
					$this->session->set_userdata('msg', $msg);
					redirect("admin_mading/daftar_mading");		
				}		
			}
		}		
	}

	function hapus_mading(){
		$id = $this->uri->segment(3);

		//hapus data gambar
		$getModel = $this->Model_admin->getMadingForm($id); 
		$getData = $getModel->row();
		$d['gambar'] = $getData->gambar;
		$d['tipe_file'] = $getData->tipe_file;
		if($d['gambar'] != ""){
			$path = './system/application/views/images_mading/';
			unlink($path.$d['gambar'].".".$d['tipe_file']);
		}

		//hapus data dari database
		$getModel2 = $this->Model_admin->deleteBerita($id);

		$msg = "Data info mading berhasil dihapus";
		$this->session->set_userdata('msg', $msg);
		redirect("admin_mading/daftar_mading");
	}
}