        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit info ekstrakurikuler</h1>
                        <div class="panel panel-primary">
                        	<div class="panel-heading">
                            	<i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel edit info ekstrakurikuler</b>
                       		</div>
                        	<div class="panel-body">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Form tambah berita</a>
                                    </li>
                                    <li><a href="#picture" data-toggle="tab">daftar gambar</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                    	<?php echo form_open_multipart('admin_ekskul/proses_edit_ekskul') ?>
                                            <input name="id" type="hidden" value="<?php echo $id; ?>">
	                                        <div class="form-group">
	                                            <label>Judul</label>
	                                            <input class="form-control" name="judul" type="text" required value="<?php echo $judul; ?>">
	                                        </div>
                                        	<div class="form-group">
                                            	<label>Isi</label>
                                            	<textarea class="form-control" rows="3" id="editor1" name="isi" required><?php echo $isi; ?></textarea>
                                            	<script>
                                            		CKEDITOR.replace( 'editor1' );
                                            	</script>
                                        	</div>
                                        	<div class="form-group">
                                            	<label>Pilih gambar thumbnail (proposional ukuran : 120 x 80 px. Maksimal size 4MB)</label>
                                            	<input type="file" name="img">
                                        	</div>
                                        	<div class="form-group">
                                        		<button class="btn btn-primary">Simpan</button>
                                        	</div>
                                    	<?php echo form_close(); ?>
                                    </div>
                                    <div class="tab-pane fade" id="picture">
                                        <h2 class="page-header">Form tambah gambar</h2>
                                        <?php echo form_open_multipart('admin_gambar/proses_tambah_gambar') ?>
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input class="form-control" name="judul" type="text" required>
                                            </div>
                                            <div class="form-group">
                                                <label>pilih resolusi</label>
                                                <select name="resolusi" class="form-control">
                                                    <option value='144'>144 x 96 px</option>
                                                    <option value='230'>230 x 160 px</option>
                                                    <option value='460'>460 x 320 px</option>
                                                    <option value='asli'>ukuran asli</option>
                                                </select>
                                            </div>         
                                            <div class="form-group">
                                                <label>Pilih gambar (maksimal size : 4MB)</label>
                                                <input type="file" name="img">
                                            </div> 
                                            <div class="form-group">
                                                <button class="btn btn-primary">Simpan</button>
                                            </div>         
                                        <?php echo form_close(); ?>
                                        <h2 class="page-header">Tabel gambar</h2>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style='width: 40px'>No</th>
                                                        <th style='width: 300px'>Judul gambar</th>
                                                        <th>url gambar</th>
                                                        <th style='width: 150px'>resolusi</th>
                                                        <th style='width: 150px'>Tgl Upload</th>
                                                        <th style='width: 60px'>Hapus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $no = 1;
                                                        foreach($gambar->result_array() as $g){
                                                            $expTglPost = explode(" ", $g['create_date']);
                                                            $tglPost = convert_tanggal($expTglPost[0]);

                                                            echo "<tr class='odd gradeX'>";
                                                            echo "<td><center>$no</center></td>";
                                                            echo "<td><a href='".base_url()."system/application/views/gambar/$g[nama_file].jpg' class='fancybox' data-fancybox-group='gallery' title='$g[nama_gambar]'>$g[nama_gambar]</a></td>";
                                                            echo "<td>$g[url]</td>";
                                                            echo "<td>$g[resolusi]</td>";
                                                            echo "<td><center>$tglPost</center></td>";
                                                            echo "<td><center><a href='".base_url()."admin_gambar/hapus_gambar/$g[id_gambar]' class='btn btn-danger btn-sm'><i class='fa fa-times'></i>&nbsp hapus</a></center></td>";
                                                            $no++;
                                                            echo "</tr>";
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->