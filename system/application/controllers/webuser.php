<?php

class Webuser extends Controller {

	function Webuser()
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
	
	function index()
	{
		$data['slide'] = $this->Model_admin->getLatestSlide();
		$data['berita'] = $this->Model_admin->getLatestNews();
		$data['mading'] = $this->Model_admin->getLatestMading();
		$data['foto'] = $this->Model_admin->getLatestFoto();

		$this->load->view("header");
		$this->load->view("home", $data);
		$this->load->view("footer");
	}

}	
/* End of file webuser.php */
/* Location: ./system/application/controllers/welcome.php */