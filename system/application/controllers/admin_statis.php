<?php

class Admin_statis extends Controller {

	function Admin_statis()
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

	function daftar_statis()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			//panggil model daftar berita
			$data['statis'] = $this->Model_admin->getStatis();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/table_statis", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function edit_statis()
	{

		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{		
			$id = $this->uri->segment(3);

			$getModel = $this->Model_admin->getStatisForm($id); 
			$getData = $getModel->row();

			$data['id'] = $getData->id_statis;
			$data['judul'] = $getData->judul_halaman;
			$data['isi'] = $getData->isi;
			$data['gambar'] = $this->Model_admin->getGambar();

			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/edit_statis", $data);
			$this->load->view("haladmin/footer");
		}
	}

	function proses_edit_statis()
	{
		$id = array('id_statis'=>$this->input->post("id"));
		$data = array(
					'judul_halaman'=>$this->input->post("judul"),
					'isi'=>$this->input->post("isi")
			);

		$this->Model_admin->updateStatis($data, $id);

		$msg = "Data halaman statis telah diupdate";
		$this->session->set_userdata('msg', $msg);
		redirect("admin_statis/daftar_statis");	
	}
}