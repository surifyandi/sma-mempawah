        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar foto</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    if(!$this->session->userdata('msg')){
                                        echo "";
                                    }else{
                                        $msg = $this->session->userdata('msg');
                                        echo "<div class='alert alert-success alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                $msg
                                              </div>";
                                        $this->session->unset_userdata('msg');
                                    }
                                ?>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel Daftar Foto galeri</b>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style='width: 6%;'>No</th>
                                                        <th>Nama foto</th>
                                                        <th style='width: 13%;'>Tgl Posting</th>
                                                        <th style='width: 10%;'>edit</th>
                                                        <th style='width: 10%;'>hapus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php 
                                                            $no = 1;
                                                            foreach($foto->result_array() as $f){
                                                                $expTglPost = explode(" ", $f['create_date']);
                                                                $tglPost = convert_tanggal($expTglPost[0]);

                                                                echo "<tr class='odd gradeX'>";
                                                                echo "<td><center>$no</center></td>";
                                                                echo "<td><a href='".base_url()."system/application/views/galeri/$f[nama_file].".$f['tipe_file']."' class='fancybox' data-fancybox-group='gallery' title='$f[nama_foto]'>$f[nama_foto]</a></td>";
                                                                echo "<td><center>$tglPost</center></td>";
                                                                echo "<td><center><a href='".base_url()."admin_galeri/edit_foto/$f[id_gallery]' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i>&nbsp edit</a></center></td>";
                                                                echo "<td><center><a href='".base_url()."admin_galeri/hapus_foto/$f[id_gallery]/$f[id_album]' class='btn btn-danger btn-sm'><i class='fa fa-times'></i>&nbsp hapus</a></center></td>";
                                                                $no++;
                                                                echo "</tr>";
                                                            }
                                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->