	<div id="body-slide">	
		<div id="coin-slider" style="margin: 10px auto">
		<?php
			foreach($slide -> result_array() as $s){
				echo "<a href='#'>";
					echo "<img src='".base_url()."system/application/views/slide/$s[foto].$s[tipe_file]'/>";
					echo "<span>$s[judul_slide]</span>";
			}
		?>	
		</div>
	</div>
	<div id="item">
		<div id="item-atas">
			<div id="sub-item-atas" class="sub-1">
				<a href="<?php echo base_url(); ?>statis/sma_mempawah/profil"><img src="<?php echo base_url(); ?>system/application/views/images/profil.png"/></a>
				<a href="<?php echo base_url(); ?>statis/sma_mempawah/profil" class="title-item-atas"><br>Profil SMAN 2<br>Mempawah</a>
			</div>
			<div id="sub-item-atas" class="sub-2">
				<a href="<?php echo base_url(); ?>statis/sma_mempawah/perpustakaan"><img src="<?php echo base_url(); ?>system/application/views/images/perpus.png"/></a>
				<a href="<?php echo base_url(); ?>statis/sma_mempawah/perpustakaan" class="title-item-atas"><br>Perpustakaan SMAN 2 Mempawah</a>
			</div>
			<div id="sub-item-atas" class="sub-3">
				<a href="<?php echo base_url(); ?>statis/sma_mempawah/sarana"><img src="<?php echo base_url(); ?>system/application/views/images/sarana.png"/></a>
				<a href="<?php echo base_url(); ?>statis/sma_mempawah/sarana" class="title-item-atas"><br>Sarana SMAN 2<br>Mempawah</a>
			</div>
		</div>
	</div>
	<section id="section">
		<div id="left-bar">
			<h1 class="jdl-lt-news">
				<img src="<?php echo base_url(); ?>system/application/views/images/news.png" width="40px" class='image-header'/>
				Berita Terbaru
			</h1>
			<?php
				foreach($berita -> result_array() as $b){
					$expTgl = explode(" ", $b['create_date']);
					$tgl = convert_tanggal($expTgl[0]);
					$expTanggal = explode(" ", $tgl);
					$isi = strip_tags(substr($b['isi'],0,200));
					$isi = substr($isi,0,strrpos($isi, " "));
					
						echo "<div id='latest-news'>";
							echo "<div class='date'>";
								echo "<center>".$expTanggal[0]."<br>".$expTanggal[1]."</center>";
							echo "</div>";
							echo "<a href='".base_url()."info/detail_info/$b[id_berita]' class='judul-lt-newss'>".$b['judul_berita']."</a><div class='clearfix'></div>";
							if($b['gambar'] != ""){
								echo "<img src='".base_url()."system/application/views/images_news/".$b['gambar'].".".$b['tipe_file']."' class='images'/>";
							}	
							echo "<p class='isi-lt-news'>$isi ...</p>";
							echo "<a href='".base_url()."info/detail_info/$b[id_berita]' class='lt-readmore'>selengkapnya</a>";
						echo "</div>";
				}
			?>
			<div class="clearfix"></div>	
		</div>
		
		<div id="right-bar">
			<h1 class="jdl-lt-news">
				<img src='<?php echo base_url(); ?>system/application/views/images/pencil.png' width='40px' class='image-header'/>
				Mading Terbaru
			</h1>
			<ul>
				<?php
					foreach($mading -> result_array() as $m){
						$expTgl = explode(" ", $b['create_date']);
						$tgl = convert_tanggalfull($expTgl[0]);
						echo "<li>";
							echo "<a href='".base_url()."info/detail_info/$m[id_berita]'>$m[judul_berita]</a>";
							echo "<div class='batas'></div>";
							echo "<span>$tgl</span>";
						echo "</li>";
					}
				?>
			</ul>
			<h1 class="jdl-lt-news" style="margin-top: 20px;">
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