        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Daftar foto</h1>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel tambah foto galeri</b>
                                    </div>
                                    <div class="panel-body">
                                        <br>
                                        <?php echo form_open_multipart('admin_galeri/proses_tambah_foto') ?>
                                            <div class="form-group">
                                                <label>Nama foto</label>
                                                <input class="form-control" name="judul" type="text" required>
                                            </div>
                                            <div class="form-group">
                                                <label>piih album</label>
                                                <select name="album" class="form-control">
                                                    <?php
                                                        foreach($album->result_array() as $a){
                                                            echo "<option value='$a[id_album]'>$a[nama_album]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih foto (maksimal size 4MB)</label>
                                                <input class="form-control" name="img" type="file" required>
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