        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Edit album</h1>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel edit album</b>
                                    </div>
                                    <div class="panel-body">
                                        <br>
                                        <?php echo form_open_multipart('admin_galeri/proses_edit_album') ?>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                            <div class="form-group">
                                                <label>Nama album</label>
                                                <input class="form-control" name="judul" type="text" required value="<?php echo $judul; ?>"/>
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