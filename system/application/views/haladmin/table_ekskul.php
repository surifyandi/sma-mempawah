        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar info ekstrakurikuler</h1>
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
                                        <i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel Daftar info ekstrakurikuler</b>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style='width: 6%;'>No</th>
                                                        <th>Judul info ekstrakurikuler</th>
                                                        <th style='width: 13%;'>Tgl Posting</th>
                                                        <th style='width: 10%;'>Edit</th>
                                                        <th style='width: 10%;'>Hapus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php 
                                                            $no = 1;
                                                            foreach($ekskul->result_array() as $e){
                                                                $expTglPost = explode(" ", $e['create_date']);
                                                                $tglPost = convert_tanggal($expTglPost[0]);
                                                                echo "<tr class='odd gradeX'>";
                                                                echo "<td><center>$no</center></td>";
                                                                if($e['gambar'] != ""){
                                                                	echo "<td><a href='".base_url()."system/application/views/images_ekskul/$e[gambar].".$e['tipe_file']."' class='fancybox' data-fancybox-group='gallery' title='$e[gambar]'>$e[judul_berita]</a></td>";
                                                                }else{
                                                                	echo "<td>$e[judul_berita]</td>";
                                                                }
                                                                echo "<td><center>$tglPost</center></td>";
                                                                echo "<td><center><a href='edit_ekskul/$e[id_berita]' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i>&nbsp edit</a></center></td>";
                                                                echo "<td><center><a href='hapus_ekskul/$e[id_berita]' class='btn btn-danger btn-sm' onclick='return confirm(\"Anda ingin menghapus data ?\")'><i class='fa fa-times'></i>&nbsp hapus</a></center></td>";
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