<?php

class Info extends Controller {

	function Info()
	{
		parent::Controller();	

		//load helper
		$this->load->helper("url");
		$this->load->helper("tanggal");
		$this->load->helper("tanggalfull");
		$this->load->library("pagination");

		//load model
		$this->load->model("Model_admin");
		
		//load database
		$this->load->database();
	}
	
	function info_sma_mempawah()
	{
		$kategori = $this->uri->segment(3);
		$page = $this->uri->segment(4);
		$limit = 10;
		if(!$page){
			$offset = 0;
		}else{
			$offset = $page;
		}

		$data['mading'] = $this->Model_admin->getLatestMading();
		$data['foto'] = $this->Model_admin->getLatestFoto();		
		$data['kategori'] = "info";

		if($kategori == "berita"){
			$data['folder'] = "images_news";
			$data['judul'] = "Berita SMA N 2 Mempawah";
			$data['list'] = $this->Model_admin->getListBerita($limit, $offset);
			$totalHal = $this->Model_admin->getBerita();
			$config['base_url'] = base_url()."info/info_sma_mempawah/berita";
			$data['url'] = base_url()."info/info_sma_mempawah/berita";
			$data['segment2'] = "daftar berita";
		}else if($kategori == "mading"){
			$data['folder'] = "images_mading";
			$data['judul'] = "Info Mading SMA N 2 Mempawah";
			$data['list'] = $this->Model_admin->getListMading($limit, $offset);
			$totalHal = $this->Model_admin->getMading();
			$config['base_url'] = base_url()."info/info_sma_mempawah/mading";
			$data['url'] = base_url()."info/info_sma_mempawah/mading";
			$data['segment2'] = "daftar info mading";
		}else if($kategori == "ekskul"){
			$data['folder'] = "images_ekskul";
			$data['judul'] = "Info Ekstrakurikuler SMA N 2 Mempawah";
			$data['list'] = $this->Model_admin->getListEkskul($limit, $offset);
			$totalHal = $this->Model_admin->getEkskul();
			$config['base_url'] = base_url()."info/info_sma_mempawah/ekskul";
			$data['url'] = base_url()."info/info_sma_mempawah/ekskul";
			$data['segment2'] = "daftar info ekstrakurikuler";
		}

		$config['per_page'] = $limit;
		$config['total_rows'] = $totalHal->num_rows();
		$config['uri_segment'] = 4;
		$config['first_link'] = 'awal';
		$config['last_link'] = 'akhir';
		$config['next_link'] = 'selanjutnya';
		$config['prev_link'] = 'sebelumnya';

		$this->pagination->initialize($config);
		$data['paginator'] = $this->pagination->create_links();

		$this->load->view("header");
		$this->load->view("breadcrumb", $data);
		$this->load->view("info", $data);
		$this->load->view("footer");
	}

	function detail_info()
	{

		$id = $this->uri->segment(3);

		$data['info'] = $this->Model_admin->getDetailInfo($id);
		$getKategori = $data['info']->row();
		$kategori = $getKategori->kategori;
		$data['suburl'] = base_url()."info/detail_info/".$id;
		if($kategori == "berita"){
			$data['segment'] = "daftar berita";
			$data['segment2'] = "detail berita";	
			$data['url'] = base_url()."info/info_sma_mempawah/berita";
		}else if($kategori == "ekskul"){
			$data['segment'] = "daftar info ekstrakurikuler";
			$data['segment2'] = "detail info ekstrakurikuler";
			$data['url'] = base_url()."info/info_sma_mempawah/ekskul";
		}else if($kategori == "mading"){
			$data['segment'] = "daftar info mading";
			$data['segment2'] = "detail info mading";
			$data['url'] = base_url()."info/info_sma_mempawah/mading";
		}
		$data['mading'] = $this->Model_admin->getLatestMading();
		$data['foto'] = $this->Model_admin->getLatestFoto();
		$data['kategori'] = "detail_info";

		$this->load->view("header");
		$this->load->view("breadcrumb", $data);
		$this->load->view("detail_info", $data);
		$this->load->view("footer");	
	}

}	
