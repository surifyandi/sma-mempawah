<!DOCTYPE html>
<html>
<head>
<title>SMA N 2 Mempawah</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Copyright" content="www.equoterz.com">
<meta name="robots" content="index, follow">
<meta name="description" content="SMA Negeri 2 Mempawah">
<meta name="keywords" content="SMA Negeri 2 Mempawah, sma, smanda, smanda mempawah, sma 2 mempawah, sman 2 mempawah, smanda 2 mempawah">
<meta name="author" content="Equoterz">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7 days">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<link rel="shortcut icon" href="<?php echo base_url(); ?>system/application/views/images/osis_logo.png">		
</head>
<link rel="stylesheet" href="<?php echo base_url(); ?>system/application/views/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>system/application/views/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>system/application/views/coin-slider/coin-slider-styles.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>system/application/views/haladmin/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>system/application/views/haladmin/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />

<script src="<?php echo base_url(); ?>system/application/views/js/jquery-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>system/application/views/haladmin/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="<?php echo base_url(); ?>system/application/views/haladmin/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/haladmin/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>system/application/views/coin-slider/coin-slider.min.js"></script>
<script>
	$(document).ready(function(){
		$('.fancybox').fancybox();
		//coin slider
		$('#coin-slider').coinslider({ width: 940, height: 400, opacity:0.9, navigation:true, delay:3000});

	});
</script>
<script>
	function initialize() {
    	var map_canvas = document.getElementById('map_canvas');
        var map_options = {
          center: new google.maps.LatLng(-0.060214, 109.345038),
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options)
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<body>
<header id="header">
	<div class="subheader">
		<img src="<?php echo base_url(); ?>system/application/views/images/osis_logo.png" width="75px" class="images_logo"/>
		<h1 class="text_header">SMA NEGERI 2 MEMPAWAH</h1>
		<span>Jl. Chandramidi</span>
	</div>
	<div id="main-nav">
	<ul id="nav">
	    <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
	    <li><a href="#">Profil</a>
	    	<ul>
	    		<li><a href="<?php echo base_url(); ?>statis/sma_mempawah/profil">Profil SMAN 2 Mempawah</a></li>
	    		<li><a href="<?php echo base_url(); ?>statis/sma_mempawah/visimisi">Visi dan Misi</a></li>	
	    		<li><a href="<?php echo base_url(); ?>statis/sma_mempawah/tujuan">Tujuan Sekolah</a></li>
	    		<li><a href="<?php echo base_url(); ?>statis/sma_mempawah/struktur">Struktur organisasi</a></li>
	    		<li><a href="<?php echo base_url(); ?>statis/sma_mempawah/dataguru">Data guru dan TU</a></li>
	    	</ul>
	    </li>
	    <li><a href="<?php echo base_url(); ?>statis/sma_mempawah/organisasi">Organisasi</a></li>
	    <li><a href="<?php echo base_url(); ?>statis/sma_mempawah/perpustakaan">Perpustakaan</a></li>
	    <li><a href="#">Info&nbsp &nbsp<span class="arrow"></span></a>
	        <ul>
	            <li><a href="<?php echo base_url(); ?>info/info_sma_mempawah/berita">Berita</a></li>
	            <li><a href="<?php echo base_url(); ?>info/info_sma_mempawah/mading">Mading</a></li>
	            <li><a href="#">Info PPDB</a></li>
	            <li><a href="<?php echo base_url(); ?>info/info_sma_mempawah/ekskul">extrakurikuler</a></li>
	        </ul>
	    </li> 
	    <li><a href="<?php echo base_url(); ?>statis/sma_mempawah/prakarya">Prakarya siswa</a></li>
	    <li><a href="<?php echo base_url(); ?>statis/sma_mempawah/sarana">sarana</a></li>
	    <li><a href="<?php echo base_url(); ?>galeri/album/">Galeri</a></li>
	</ul>
	</div>
</header>
<!-- nav untuk menu-->