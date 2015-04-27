<?php
	include $_SERVER['DOCUMENT_ROOT']."/system/application/views/haladmin/header.php";
	include $_SERVER['DOCUMENT_ROOT']."/system/application/views/haladmin/sidebar.php"; 
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    	<br><br>
                    	<div class="alert alert-danger">
                    		<center>
                        		<p><?php echo $error; ?></p>
                        		<p>Ukuran Foto melebihi batas maksimal upload</p>
                        		<p><a href="javascript:history.go(-1)">Ulangi</a></p> 
                        	</center>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php
	include $_SERVER['DOCUMENT_ROOT']."/system/application/views/haladmin/footer.php";
?>