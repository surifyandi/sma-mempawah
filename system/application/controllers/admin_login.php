<?php

class Admin_login extends Controller {

	function Admin_login()
	{
		parent::Controller();	
		//load helper
		$this->load->helper("url");

		//load session
		$this->load->library("session");

		//load model
		$this->load->model("Model_admin");
		
		//load database
		$this->load->database();
	}
	
	function index()
	{
		//variable username dan password login admin
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$encPass = md5("101214".$password);
		
		//cek data admin
		$getData = $this->Model_admin->SelectAdmin($username, $encPass); 
		$checkData = $getData->num_rows();
		$data = new stdClass();
		if($checkData > 0){
			//ambil data
			$getRow = $getData->row();
			$nama = $getRow->nama;
			$username = $getRow->username;

			//membuat session dengan data dari database admin yang login
			$this->session->set_userdata('nama', $nama);
			$this->session->set_userdata('username', $username);
			
			//direct ke dashboard admin
			redirect("admin_login/dashboard");
		}else{
			$data->dataData = "<center>Login Terlebih dahulu</center>";
		}
		//load view
		$this->load->view("haladmin/login", $data);
	}

	function dashboard()
	{
		if(!$this->session->userdata('nama')){
			redirect("admin_login");
		}else{
			$this->load->view("haladmin/header");
			$this->load->view("haladmin/sidebar");
			$this->load->view("haladmin/body");
			$this->load->view("haladmin/footer");
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect("admin_login");
	}
}	
/* End of file admin_login.php */
/* Location: ./system/application/controllers/welcome.php */