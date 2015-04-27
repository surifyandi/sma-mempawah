        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Edit foto</h1>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel edit galeri foto</b>
                                    </div>
                                    <div class="panel-body">
                                        <br>
                                        <?php echo form_open_multipart('admin_galeri/proses_edit_foto') ?>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                            <div class="form-group">
                                                <label>Nama foto</label>
                                                <input class="form-control" name="judul" type="text" required value="<?php echo $judul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>piih album</label>
                                                <select name="album" class="form-control">
                                                    <?php
                                                        foreach($album->result_array() as $a){
                                                            if($a['id_album'] == $id_album){
                                                                echo "<option value='$a[id_album]' selected>$a[nama_album]</option>";
                                                            }else{
                                                                echo "<option value='$a[id_album]'>$a[nama_album]</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
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