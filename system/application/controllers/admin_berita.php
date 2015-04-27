<?php

class Admin_berita extends Controller {

	function Admin_berita()
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

	function daftar_berita()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			//panggil model daftar berita
			$data['berita'] = $this->Model_admin->getBerita();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/table_berita", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function tambah_berita()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$data['gambar'] = $this->Model_admin->getGambar();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/add_berita", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_tambah_berita()
	{
		//ambil tanggal dan jam
		$date = date("Y-m-d H:i:s");

		//buat string acak
		$random = rand(000000,999999);

		//konfigurasi upload gambar
		if(!$_FILES['img']['name']){
			$add = array('judul_berita' => $this->input->post('judul'),
						 'kategori' => 'berita',
						 'isi' => $this->input->post('isi'),
						 'create_date' => $date
				);
			$save = $this->Model_admin->addBerita($add);

			$msg = "Data berita telah disimpan";
			$this->session->set_userdata('msg', $msg);
			redirect("admin_berita/daftar_berita");			
		}else{
			$config['upload_path'] = './system/application/views/images_news/tmp_img';
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
							 'kategori' => 'berita',
							 'isi' => $this->input->post('isi'),
							 'gambar' => $random.'-'.$_FILES['img']['name'],
							 'tipe_file' => $ext,
							 'create_date'=>$date
					);

				$save = $this->Model_admin->addBerita($add);

				$getModel = $this->Model_admin->getBeritaForm($this->Model_admin->getLastId()); 
				$getData = $getModel->row();
				$d['gambar'] = $getData->gambar;

				$compress['source_image'] = './system/application/views/images_news/tmp_img/'.$getData->gambar.'.'.$ext;
				$compress['new_image'] = './system/application/views/images_news/'.$getData->gambar.'.'.$ext;
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
					$path = './system/application/views/images_news/tmp_img/';
					unlink($path.$d['gambar'].".".$ext);

					$msg = "Data berita telah disimpan";
					$this->session->set_userdata('msg', $msg);
					redirect("admin_berita/daftar_berita");	
				}
			}
		}
	}

	function edit_berita()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$id = $this->uri->segment(3);

			$getModel = $this->Model_admin->getBeritaForm($id); 
			$getData = $getModel->row();

			$data['id'] = $getData->id_berita;
			$data['judul'] = $getData->judul_berita;
			$data['isi'] = $getData->isi;
			$data['gambar'] = $this->Model_admin->getGambar();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/edit_berita", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_edit_berita(){

		if(!$_FILES['img']['name']){
			$data = array(
					'judul_berita'=>$this->input->post('judul'),
					'isi'=>$this->input->post('isi')
				);

			$condition['id_berita'] = $this->input->post('id');

			$this->Model_admin->updateBerita($data, $condition);

			$msg = "Data berita berhasil diupdate";
			$this->session->set_userdata('msg', $msg);
			redirect("admin_berita/daftar_berita");
		}else{

			//delete gambar lama
			$getModel = $this->Model_admin->getBeritaForm($this->input->post('id')); 
			$getData = $getModel->row();
			$d['gambar'] = $getData->gambar;
			
			if($d['gambar'] != ""){
				$d['tipe_file'] = $getData->tipe_file; 

				$path = './system/application/views/images_news/';

				unlink($path.$d['gambar'].".".$d['tipe_file']);
			}


			$random = rand(000000,999999);

			$config['upload_path'] = './system/application/views/images_news/tmp_img';
			$config['allowed_types'] = 'jpg';
			$config['file_name'] = $random.'-'.$_FILES['img']['name'];
			$config['max_size'] = '4096';
			$config['max_width'] = '3280';
			$config['max_height'] = '2600';

			//load library upload
			$this->load->library('upload', $config);

			//lakukan upload
			$this->upload->initialize($config);

			//dapatkan ekstensi

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

				$getModel2 = $this->Model_admin->getBeritaForm($this->input->post('id')); 
				$getData2 = $getModel2->row();
				$d2['gambar'] = $getData2->gambar;

				//setting compress gambar
				$compress['source_image'] = './system/application/views/images_news/tmp_img/'.$getData2->gambar.'.'.$ext;
				$compress['new_image'] = './system/application/views/images_news/'.$getData2->gambar.'.'.$ext;
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
					$path = './system/application/views/images_news/tmp_img/';
					unlink($path.$d2['gambar'].".".$ext);

					$msg = "Data berita berhasil diupdate";
					$this->session->set_userdata('msg', $msg);
					redirect("admin_berita/daftar_berita");	
				}			
			}
		}		
	}

	function hapus_berita(){
		$id = $this->uri->segment(3);

		//hapus data gambar
		$getModel = $this->Model_admin->getBeritaForm($id); 
		$getData = $getModel->row();
		$d['gambar'] = $getData->gambar;
		$d['tipe_file'] = $getData->tipe_file;
		if($d['gambar'] != ""){
			$path = './system/application/views/images_news/';
			unlink($path.$d['gambar'].".".$d['tipe_file']);
		}

		//hapus data dari database
		$getModel2 = $this->Model_admin->deleteBerita($id);

		$msg = "Data berita berhasil dihapus";
		$this->session->set_userdata('msg', $msg);
		redirect("admin_berita/daftar_berita");
	}
}