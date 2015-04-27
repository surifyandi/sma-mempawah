        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah slide gambar</h1>
                        <div class="panel panel-primary">
                        	<div class="panel-heading">
                            	<i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel tambah slide gambar</b>
                       		</div>
                        	<div class="panel-body">
                            	<div class="row">
                                	<div class="col-lg-8">
                                        <?php echo form_open_multipart('admin_slide/proses_tambah_slide') ?>
	                                        <div class="form-group">
	                                            <label>Judul slide</label>
	                                            <input class="form-control" name="judul" required>
	                                        </div>
                                        	<div class="form-group">
                                            	<label>Pilih gambar (proposional ukuran : 940 x 400 px. Maksimal size 4MB)</label>
                                            	<input type="file" name="img" required>
                                        	</div>
                                        	<div class="form-group">
                                        		<button class="btn btn-primary">Simpan</button>
                                        	</div>
                                        <?php echo form_close(); ?>
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