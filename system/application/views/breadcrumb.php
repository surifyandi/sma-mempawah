<div class="breadcrumb">
	<?php 
		echo "<a href='http://sman2mempawah.sch.id'>beranda</a> / "; 
		if($kategori == "profil"){
			echo "<a href='".base_url()."statis/sma_mempawah/profil'><b>".$segment2."</b></a>";
		}else if($kategori == "info"){
			echo "<a href='".$url."'><b>".$segment2."</b></a>";
		}else if($kategori == "detail_info"){
			echo "<a href='".$url."'>".$segment."</a> / ";
			echo "<a href='".$suburl."'><b>".$segment2."</b></a>";
		}else if($kategori == "album"){
			echo "<a href='".base_url()."galeri/album'><b>album</b></a>";
		}else if($kategori = "foto"){
			echo "<a href='".$url."'><b>foto</b></a>";
		}
	?>
</div>