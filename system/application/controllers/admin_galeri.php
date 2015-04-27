<?php

class Admin_galeri extends Controller {

	function Admin_galeri()
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

	function daftar_album()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$data['album'] = $this->Model_admin->getAlbum();
		
			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/table_album", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function tambah_album()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/add_album");
			$this->load->view("haladmin/footer");
		}
	}

	function proses_tambah_album()
	{
		//ambil tanggal dan jam
		$date = date("Y-m-d H:i:s");

		$add = array('nama_album' => $this->input->post('judul'),
					 'create_date' => $date
			);
		$save = $this->Model_admin->addAlbum($add);

		$msg = "Data album telah disimpan";
		$this->session->set_userdata('msg', $msg);
		redirect("admin_galeri/daftar_album");			
	}

	function edit_album()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$id = $this->uri->segment(3);

			$getModel = $this->Model_admin->getAlbumForm($id); 
			$getData = $getModel->row();

			$data['id'] = $getData->id_album;
			$data['judul'] = $getData->nama_album;

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/edit_album", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_edit_album(){

			$data = array('nama_album'=>$this->input->post('judul'));

			$condition['id_album'] = $this->input->post('id');

			$this->Model_admin->updateAlbum($data, $condition);

			$msg = "Data album berhasil diupdate";
			$this->session->set_userdata('msg', $msg);
			redirect("admin_galeri/daftar_album");		
	}

	function daftar_foto(){

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$id = $this->uri->segment(3);

			$data['foto'] = $this->Model_admin->getFoto($id);

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/table_galeri", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function tambah_foto(){

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$data['album'] = $this->Model_admin->getAlbum();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/add_foto", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_tambah_foto(){
		//ambil tanggal dan jam
		$date = date("Y-m-d H:i:s");

		//buat string acak
		$random = rand(000000,999999);

		//konfigurasi upload gambar
		$config['upload_path'] = './system/application/views/galeri/tmp_img';
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

			$add = array('nama_foto' => $this->input->post('judul'),
						 'nama_file' => $random.'-'.$_FILES['img']['name'],
						 'tipe_file' => $ext,
						 'create_date'=>$date,
						 'id_album' => $this->input->post('album')
				);

			$save = $this->Model_admin->addFoto($add);

			$getModel = $this->Model_admin->getFotoForm($this->Model_admin->getLastId()); 
			$getData = $getModel->row();
			$d['gambar'] = $getData->nama_file;
			$d['tipe_file'] = $getData->tipe_file;

			$compress['source_image'] = './system/application/views/galeri/tmp_img/'.$d['gambar'].".".$d['tipe_file'];
			$compress['new_image'] = './system/application/views/galeri/'.$d['gambar'].".".$d['tipe_file'];
			$compress['image_library'] = 'gd2';
			$compress['create_thumb'] = FALSE;
			$compress['maintain_ratio'] = FALSE;
			$compress['quality'] = '60%';

			$getImageSize = getImageSize(base_url().'./system/application/views/galeri/tmp_img/'.$d['gambar'].".".$d['tipe_file']);
			$fileSize = get_headers(base_url().'./system/application/views/galeri/tmp_img/'.$d['gambar'].".".$d['tipe_file'], 1);
			if($fileSize > 1024  && $getImageSize[0] > 1900 && $getImageSize[1] > 1200){
				$compress['width'] = $getImageSize[0]*0.5;
				$compress['height'] = $getImageSize[1]*0.5;
			}else{
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
				$path = './system/application/views/galeri/tmp_img/';
				unlink($path.$d['gambar'].".".$d['tipe_file']);

				$msg = "Data foto berhasil di tambah";
				$this->session->set_userdata('msg', $msg);
				redirect("admin_galeri/daftar_foto/".$this->input->post('album'));	
			}
		}
	}

	function edit_foto(){

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$id = $this->uri->segment(3);
			$getModel = $this->Model_admin->getFotoForm($id);
			$getData = $getModel->row();

			$data['id'] = $getData->id_gallery;
			$data['judul'] = $getData->nama_foto;
			$data['album'] = $this->Model_admin->getAlbum();
			$data['id_album'] = $getData->id_album;

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/edit_galeri", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_edit_foto(){
		$data = array(
				'nama_foto'=>$this->input->post('judul'),
				'id_album'=>$this->input->post('album')
			);

		$condition['id_gallery'] = $this->input->post('id');

		$this->Model_admin->updateFoto($data, $condition);

		$msg = "Data foto berhasil diupdate";
		$this->session->set_userdata('msg', $msg);
		redirect("admin_galeri/daftar_foto/".$this->input->post('id'));
	}

	function hapus_foto(){
		$id = $this->uri->segment(3);
		$id_album = $this->uri->segment(4);

		//hapus data gambar
		$getModel = $this->Model_admin->getFotoForm($id); 
		$getData = $getModel->row();
		$d['gambar'] = $getData->nama_file;
		$d['tipeFile'] = $getData->tipe_file;
		$path = './system/application/views/galeri/';
		unlink($path.$d['gambar'].".".$d['tipeFile']);

		//hapus data dari database
		$getModel2 = $this->Model_admin->deleteFoto($id);

		redirect("admin_galeri/daftar_foto/".$id_album);
	}
}