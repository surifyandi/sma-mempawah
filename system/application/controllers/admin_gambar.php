<?php

class Admin_gambar extends Controller {

	function Admin_gambar()
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

	function proses_tambah_gambar()
	{
		//ambil tanggal dan jam
		$date = date("Y-m-d H:i:s");

		//buat string acak
		$random = rand(000000,999999);

		//konfigurasi upload gambar
		$config['upload_path'] = './system/application/views/gambar/tmp_img';
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

			$res = $this->input->post('resolusi');

			if($res == "144"){
				$resolusi = "144 x 96 px";
			}else if($res == "230"){
				$resolusi = "230 x 160 px";
			}else if($res == "460"){
				$resolusi = "460 x 320 px";
			}else{
				$resolusi = "ukuran asli";
			}

			$url = base_url()."system/application/views/gambar/".$random."-".$_FILES['img']['name'].".".$ext;
			$add = array('nama_gambar' => $this->input->post('judul'),
						 'url' => $url,
						 'nama_file' => $random.'-'.$_FILES['img']['name'],
						 'resolusi' => $resolusi,
						 'tipe_file' => $ext,
						 'create_date'=>$date
				);

			$save = $this->Model_admin->addGambar($add);

			$getModel = $this->Model_admin->getNewGambar($this->Model_admin->getLastId()); 
			$getData = $getModel->row();
			$d['gambar'] = $getData->nama_file;

			$compress['source_image'] = './system/application/views/gambar/tmp_img/'.$d['gambar'].'.'.$ext;
			$compress['new_image'] = './system/application/views/gambar/'.$d['gambar'].'.'.$ext;
			$compress['image_library'] = 'gd2';
			$compress['create_thumb'] = FALSE;
			$compress['maintain_ratio'] = FALSE;
			$compress['quality'] = '100%';

			$getRes = $this->input->post('resolusi');

			if($getRes == "144"){
				$compress['width'] = '144';
				$compress['height'] = '96';
			}else if($getRes == "230"){
				$compress['width'] = '230';
				$compress['height'] = '160';
			}else if($getRes == "460"){
				$compress['width'] = '460';
				$compress['height'] = '320';
			}else{
				$getImageSize = getImageSize(base_url().'./system/application/views/gambar/tmp_img/'.$d['gambar'].'.'.$ext);
				$compress['width'] = $getImageSize[0];
				$compress['height'] = $getImageSize[1];
			}

			//load library image lib
			$this->load->library("image_lib", $compress);

			//lakukan compress gambar
			$this->image_lib->initialize($compress);
			$this->image_lib->resize();

			if ( ! $this->image_lib->resize()){
    			echo $this->image_lib->display_errors();
			}else{
				//hapus temporary gambar
				$path = './system/application/views/gambar/tmp_img/';
				unlink($path.$d['gambar'].".".$ext);

				redirect("admin_berita/tambah_berita");	
			}
		}
	}

	function hapus_gambar()
	{
		$id = $this->uri->segment(3);

		//hapus data gambar
		$getModel = $this->Model_admin->getNewGambar($id); 
		$getData = $getModel->row();
		$d['gambar'] = $getData->nama_file;
		$d['tipe_file'] = $getData->tipe_file;
		$path = './system/application/views/gambar/';
		unlink($path.$d['gambar'].".".$d['tipe_file']);

		//hapus data dari database
		$getModel2 = $this->Model_admin->deleteGambar($id);

		redirect("admin_berita/tambah_berita");
	}
}