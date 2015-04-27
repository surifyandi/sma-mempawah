        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar album</h1>
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
                                        <i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel Daftar album galeri</b>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style='width: 6%;'>No</th>
                                                        <th>Judul album</th>
                                                        <th style='width: 11%;'>Total foto</th>
                                                        <th style='width: 13%;'>Tgl Posting</th>
                                                        <th style='width: 10%;'>lihat foto</th>
                                                        <th style='width: 10%;'>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php 
                                                            $no = 1;
                                                            foreach($album->result_array() as $a){
                                                                $expTglPost = explode(" ", $a['create_date']);
                                                                $tglPost = convert_tanggal($expTglPost[0]);

                                                                $totalFoto = $this->db->get_where('tb_galeri', array('id_album'=>$a['id_album']));
                                                                $total = $totalFoto->num_rows();

                                                                echo "<tr class='odd gradeX'>";
                                                                echo "<td><center>$no</center></td>";
                                                                echo "<td>$a[nama_album]</td>";
                                                                echo "<td><center>$total</center></td>";
                                                                echo "<td><center>$tglPost</center></td>";
                                                                echo "<td><center><a href='daftar_foto/$a[id_album]' class='btn btn-success btn-sm'>lihat foto</a></center></td>";
                                                                echo "<td><center><a href='edit_album/$a[id_album]' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i>&nbsp edit</a></center></td>";
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