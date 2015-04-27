<?php

class Admin_slide extends Controller {

	function Admin_slide()
	{
		parent::Controller();	
		//load helper
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->helper("tanggal");

		//load session
		$this->load->library("session");

		//load model
		$this->load->model("Model_admin");
		
		//load database
		$this->load->database();
	}

	function tambah_slide()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/add_slide");
			$this->load->view("haladmin/footer");
		}
	}

	function daftar_slide()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			//panggil model daftar berita
			$data['slide'] = $this->Model_admin->getSlide();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/table_slide", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_tambah_slide()
	{
		//ambil tanggal dan jam
		$date = date("Y-m-d H:i:s");

		//buat string acak
		$random = rand(000000,999999);

		//konfigurasi upload gambar
		$config['upload_path'] = './system/application/views/slide/tmp_img';
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
			
			$add = array('judul_slide' => $this->input->post('judul'),
						 'foto' => $random.'-'.$_FILES['img']['name'],
						 'tipe_file' => $ext,
						 'create_date'=>$date
				);

			$save = $this->Model_admin->addSlide($add);

			$getModel = $this->Model_admin->getSlideForm($this->Model_admin->getLastId()); 
			$getData = $getModel->row();
			$d['gambar'] = $getData->foto;

			$compress['source_image'] = './system/application/views/slide/tmp_img/'.$d['gambar'].'.'.$ext;
			$compress['new_image'] = './system/application/views/slide/'.$d['gambar'].'.'.$ext;
			$compress['image_library'] = 'gd2';
			$compress['create_thumb'] = FALSE;
			$compress['maintain_ratio'] = FALSE;
			$compress['width'] = '940';
			$compress['height'] = '400';
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
				$path = './system/application/views/slide/tmp_img/';
				unlink($path.$d['gambar'].".".$ext);

				$msg = "Data slide gambar telah disimpan";
				$this->session->set_userdata('msg', $msg);
				redirect("admin_slide/daftar_slide");	
			}
		}
	}

	function edit_slide()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$id = $this->uri->segment(3);

			$getModel = $this->Model_admin->getSlideForm($id); 
			$getData = $getModel->row();

			$data['id'] = $getData->id_slide;
			$data['judul'] = $getData->judul_slide;

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/edit_slide", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_edit_slide()
	{
		$id = array('id_slide'=>$this->input->post("id"));
		$judul = array('judul_slide'=>$this->input->post("judul"));

		$this->Model_admin->updateSlide($judul, $id);

		$msg = "Data slide gambar telah diupdate";
		$this->session->set_userdata('msg', $msg);
		redirect("admin_slide/daftar_slide");	
	}

	function hapus_slide()
	{
		$id = $this->uri->segment(3);

		//hapus data gambar
		$getModel = $this->Model_admin->getSlideForm($id); 
		$getData = $getModel->row();
		$d['gambar'] = $getData->foto;
		$d['tipe_file'] = $getData->tipe_file;
		$path = './system/application/views/slide/';
		unlink($path.$d['gambar'].".".$d['tipe_file']);

		//hapus data dari database
		$getModel2 = $this->Model_admin->deleteSlide($id);

		$msg = "Data slide berhasil dihapus";
		$this->session->set_userdata('msg', $msg);
		redirect("admin_slide/daftar_slide");
	}
}