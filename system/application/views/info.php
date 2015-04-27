	<section id="section">
		<div id="left-bar">
			<h1 class="judul-leftbar jdl"><?php echo $judul; ?></h1>
			<!-- <div class="body-leftbar"><?php echo $isi ?></div> -->
			<?php
				foreach($list -> result_array() as $l){
					$expTgl = explode(" ", $l['create_date']);
					$tgl = convert_tanggal($expTgl[0]);
					$expTanggal = explode(" ", $tgl);
					$isi = strip_tags(substr($l['isi'],0,200));
					$isi = substr($isi,0,strrpos($isi, " "));
					
						echo "<div id='latest-news'>";
							echo "<div class='date'>";
								echo "<center>".$expTanggal[0]."<br>".$expTanggal[1]."</center>";
							echo "</div>";
							echo "<a href='".base_url()."info/detail_info/$l[id_berita]' class='judul-lt-newss'>".$l['judul_berita']."</a><div class='clearfix'></div>";
							if($l['gambar'] != ""){
								echo "<img src='".base_url()."system/application/views/".$folder."/".$l['gambar'].".".$l['tipe_file']."' class='images'/>";
							}	
							echo "<p class='isi-lt-news'>$isi ...</p>";
							echo "<a href='".base_url()."info/detail_info/$l[id_berita]' class='lt-readmore'>selengkapnya</a>";
						echo "</div>";
				}
				echo "<div class='clearfix2'>...</div>";
				echo "<center><ul class='pagination'>$paginator</ul></center>";
			?>
			<div class="clearfix"></div>	
		</div>
		
		<div id="right-bar">
			<h1 class="judul-rightbar">
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