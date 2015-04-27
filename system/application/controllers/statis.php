<?php

class Statis extends Controller {

	function Statis()
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
	
	function sma_mempawah()
	{
		$kategori = $this->uri->segment(3);

		$data['mading'] = $this->Model_admin->getLatestMading();
		$data['foto'] = $this->Model_admin->getLatestFoto();
		$data['kategori'] = "profil";

		if($kategori == "profil"){
			$data['statis'] = $this->Model_admin->getProfil();
			$data['segment2'] = "profil SMAN 2 Mempawah";
		}else if($kategori == "perpustakaan"){
			$data['statis'] = $this->Model_admin->getPerpus();
			$data['segment2'] = "perpustakaan";
		}else if($kategori == "sarana"){
			$data['statis'] = $this->Model_admin->getSarana();
			$data['segment2'] = "sarana";
		}else if($kategori == "organisasi"){
			$data['statis'] = $this->Model_admin->getOrganisasi();
			$data['segment2'] = "organisasi";
		}else if($kategori == "visimisi"){
			$data['statis'] = $this->Model_admin->getVisiMisi();
			$data['segment2'] = "visi misi";
		}else if($kategori == "tujuan"){
			$data['statis'] = $this->Model_admin->getTujuan();
			$data['segment2'] = "tujuan sekolah";
		}else if($kategori == "struktur"){
			$data['statis'] = $this->Model_admin->getStruktur();
			$data['segment2'] = "struktur organisasi";
		}else if($kategori == "dataguru"){
			$data['statis'] = $this->Model_admin->getDataguru();
			$data['segment2'] = "data guru";
		}else if($kategori == "prakarya"){
			$data['statis'] = $this->Model_admin->getDataPrakarya();
			$data['segment2'] = "prakarya siswa";
		} 
		$this->load->view("header");
		$this->load->view("breadcrumb", $data);
		$this->load->view("profil", $data);
		$this->load->view("footer");
	}

}	