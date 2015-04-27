        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br><br>
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
                                        <i class='fa fa-edit fa-fw'></i>&nbsp<b>Panel Daftar halaman statis</b>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style='width: 6%;'>No</th>
                                                        <th style='width: 13%;'>kategori</th>
                                                        <th>Judul halaman statis</th>
                                                        <th style='width: 10%;'>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php 
                                                            $no = 1;
                                                            foreach($statis->result_array() as $s){
                                                                echo "<tr class='odd gradeX'>";
                                                                echo "<td><center>$no</center></td>";
                                                                echo "<td>$s[kategori]</td>";
                                                                echo "<td>$s[judul_halaman]</td>";
                                                                echo "<td><center><a href='edit_statis/$s[id_statis]' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i>&nbsp edit</a></center></td>";
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