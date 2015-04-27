        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <br><br>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel tambah album</b>
                                    </div>
                                    <div class="panel-body">
                                        <br>
                                        <?php echo form_open_multipart('admin_galeri/proses_tambah_album') ?>
                                            <div class="form-group">
                                                <label>Nama album</label>
                                                <input class="form-control" name="judul" type="text" required>
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