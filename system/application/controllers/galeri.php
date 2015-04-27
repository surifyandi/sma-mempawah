<?php

class Galeri extends Controller {

	function Galeri()
	{
		parent::Controller();	

		//load helper
		$this->load->helper("url");
		$this->load->helper("tanggal");
		$this->load->helper("tanggalfull");

		//load model
		$this->load->model("Model_admin");
		
		//load database
		$this->load->database();
	}
	
	function album()
	{
		$data['foto'] = $this->Model_admin->getLatestFoto();
		$data['mading'] = $this->Model_admin->getLatestMading();
		$data['album'] = $this->Model_admin->getAlbum();
		$data['kategori'] = "album";

		$this->load->view("header");
		$this->load->view("breadcrumb", $data);
		$this->load->view("album", $data);
		$this->load->view("footer");
	}

	function foto()
	{

		$id = $this->uri->segment(3);

		$data['foto'] = $this->Model_admin->getFoto($id);
		$data['mading'] = $this->Model_admin->getLatestMading();
		$data['album'] = $this->Model_admin->getAlbum();	
		$data['kategori'] = "foto";
		$data['url'] = base_url()."galeri/foto/".$id;

		$this->load->view("header");
		$this->load->view("breadcrumb", $data);
		$this->load->view("foto", $data);
		$this->load->view("footer");	
	}

}	
/* End of file webuser.php */
/* Location: ./system/application/controllers/welcome.php */