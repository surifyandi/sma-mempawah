<?php
	class Model_admin extends Model{

		function Model_admin(){
			parent::Model();
		}

		function SelectAdmin($username, $password){
			$sql = $this->db->get_where('tb_admin', array('username'=>$username, 'password'=>$password ));
			return $sql;
		}

		function addBerita($add){
			$sql = $this->db->insert('tb_berita', $add);
			return $sql;
		}

		function addPrakarya($add){
			$sql = $this->db->insert('tb_berita', $add);
			return $sql;
		}

		function addSlide($add){
			$sql = $this->db->insert('tb_slide', $add);
			return $sql;
		}

		function addGambar($add){
			$sql = $this->db->insert('tb_gambar', $add);
			return $sql;
		}

		function addAlbum($add){
			$sql = $this->db->insert('tb_album', $add);
			return $sql;
		}

		function addFoto($add){
			$sql = $this->db->insert('tb_galeri', $add);
			return $sql;
		}

		function getNewGambar($id){
			$sql = $this->db->get_where('tb_gambar', array('id_gambar'=>$id));
			return $sql;
		}

		function getBerita(){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'berita'));
			return $sql;
		}

		function getEkskul(){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'ekskul'));
			return $sql;
		}
		
		function getMading(){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'mading'));
			return $sql;
		}

		function getPrakarya(){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'prakarya'));
			return $sql;
		}

		function getSlide(){
			$sql = $this->db->get('tb_slide');
			return $sql;
		}

		function getLatestSlide(){
			$this->db->order_by('id_slide', 'desc');
			$sql = $this->db->get('tb_slide', 6);
			return $sql;
		}

		function getLatestNews(){
			$this->db->order_by('id_berita', 'desc');
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'berita'), 3);
			return $sql;
		}

		function getLatestMading(){
			$this->db->order_by('id_berita', 'desc');
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'mading'), 3);
			return $sql;
		}

		function getLatestFoto(){
			$this->db->order_by('id_gallery', 'desc');
			$sql = $this->db->get('tb_galeri', 4);
			return $sql;
		}

		function getListBerita($limit, $offset){
			$this->db->order_by('id_berita', 'desc');
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'berita'), $limit, $offset);
			return $sql;
		}

		function getListMading($limit, $offset){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'mading'), $limit, $offset);
			return $sql;
		}

		function getListEkskul($limit, $offset){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'ekskul'), $limit, $offset);
			return $sql;
		}

		function getListPrakarya($limit, $offset){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'prakarya'), $limit, $offset);
			return $sql;
		}

		function getStatis(){
			$sql = $this->db->get('tb_statis');
			return $sql;
		}

		function getAlbum(){
			$sql = $this->db->get('tb_album');
			return $sql;
		}

		function getCoverAlbum($id){
			$this->db->order_by('id_gallery', 'desc');
			$sql = $this->db->get_where('tb_galeri', array('id_album'=>$id), 1);
			return $sql;
		}

		function getProfil(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'profil'));
			return $sql;
		}

		function getPerpus(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'perpustakaan'));
			return $sql;
		}

		function getSarana(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'sarana'));
			return $sql;
		}

		function getOrganisasi(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'organisasi'));
			return $sql;
		}

		function getVisiMisi(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'visimisi'));
			return $sql;
		}

		function getTujuan(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'tujuan'));
			return $sql;
		}
		
		function getStruktur(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'struktur'));
			return $sql;
		}
		
		function getDataguru(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'dataguru'));
			return $sql;
		}

		function getDataPrakarya(){
			$sql = $this->db->get_where('tb_statis', array('kategori'=>'prakarya'));
			return $sql;
		}

		function getGambar(){
			$sql = $this->db->get('tb_gambar');
			return $sql;
		}

		function getFoto($id){
			$sql = $this->db->get_where('tb_galeri', array('id_album'=>$id));
			return $sql;
		}

		function getDetailInfo($id){
			$sql = $this->db->get_where('tb_berita', array('id_berita'=>$id));
			return $sql;
		}

		function getBeritaForm($id){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'berita', 'id_berita'=>$id));
			return $sql;
		}

		function getEkskulForm($id){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'ekskul', 'id_berita'=>$id));
			return $sql;
		}

		function getMadingForm($id){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'mading', 'id_berita'=>$id));
			return $sql;
		}

		function getPrakaryaForm($id){
			$sql = $this->db->get_where('tb_berita', array('kategori'=>'prakarya', 'id_berita'=>$id));
			return $sql;
		}

		function getSlideForm($id){
			$sql = $this->db->get_where('tb_slide', array('id_slide'=>$id));
			return $sql;
		}

		function getStatisForm($id){
			$sql = $this->db->get_where('tb_statis', array('id_statis'=>$id));
			return $sql;
		}

		function getAlbumForm($id){
			$sql = $this->db->get_where('tb_album', array('id_album'=>$id));
			return $sql;
		}

		function getFotoForm($id){
			$sql = $this->db->get_where('tb_galeri', array('id_gallery'=>$id));
			return $sql;
		}

		//untuk update berita, ekskul, prakarya, dan mading
		function updateBerita($data, $condition){
			$this->db->where($condition);
			$this->db->update('tb_berita', $data);
		}

		function updateSlide($data, $condition){
			$this->db->where($condition);
			$this->db->update('tb_slide', $data);
		}

		function updateStatis($data, $condition){
			$this->db->where($condition);
			$this->db->update('tb_statis', $data);
		}

		function updateFoto($data, $condition){
			$this->db->where($condition);
			$this->db->update('tb_galeri', $data);
		}

		function updateAlbum($data, $condition){
			$this->db->where($condition);
			$this->db->update('tb_album', $data);
		}

		//untuk delete berita, ekskul, prakarya dan mading
		function deleteBerita($id){
			$sql = $this->db->delete('tb_berita', array('id_berita'=>$id));
			return $sql;
		}

		function deleteSlide($id){
			$sql = $this->db->delete('tb_slide', array('id_slide'=>$id));
			return $sql;
		}

		function deleteGambar($id){
			$sql = $this->db->delete('tb_gambar', array('id_gambar'=>$id));
			return $sql;
		}

		function deleteFoto($id){
			$sql = $this->db->delete('tb_galeri', array('id_gallery'=>$id));
			return $sql;
		}

		function getLastId(){
			$sql = $this->db->insert_id();
			return $sql;
		}
	}