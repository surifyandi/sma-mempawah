	<?php
		foreach($statis -> result_array() as $s){
			$judul = $s['judul_halaman'];	
			$isi = $s['isi'];				
		}
	?>
	<section id="section">
		<div id="left-bar">
			<h1 class="judul-leftbar"><?php echo $judul; ?></h1>
			<div class="body-leftbar"><?php echo $isi ?></div>
			<div class="clearfix"></div>	
		</div>
		
		<div id="right-bar">
			<h1 class="judul-leftbar">
				<img src='<?php echo base_url(); ?>system/application/views/images/pencil.png' width='40px' class='image-header'/>
				Mading Terbaru
			</h1>
			<ul>
				<?php
					foreach($mading -> result_array() as $m){
						$expTgl = explode(" ", $m['create_date']);
						$tgl = convert_tanggalfull($expTgl[0]);
						echo "<li>";
							echo "<a href='#'>$m[judul_berita]</a>";
							echo "<div class='batas'></div>";
							echo "<span>$tgl</span>";
						echo "</li>";
					}
				?>
			</ul>
			<h1 class="jdl-lt-news" style="margin-top: 10px;">
				<img src="<?php echo base_url(); ?>system/application/views/images/galeri.png" width="45px" class='image-header'/>
				Foto Terbaru
			</h1>
			<div class="foto-rightbar">
				<?php
					foreach($foto -> result_array() as $f){
						echo "<a href='".base_url()."galeri/foto/$f[id_album]'><img src='".base_url()."system/application/views/galeri/$f[nama_file].$f[tipe_file]'/ class='frame-img-rightbar'></a>";
					}
				?>
			</div>
		</div>
	</section><br>