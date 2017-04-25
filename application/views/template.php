<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Sawojajar</title>
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </head>
  <body data-spy="scroll" data-target="#myScrollspy" data-offset="15">
      <nav class="navbar navbar-default nav1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/hotel/"><span class="glyphicon glyphicon-home"></span> Hotel Sawojajar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari Kamar">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
          <ul class="dropdown-menu">
              
              <?php 
                if($this->session->userdata('logged_in') == TRUE){
                    echo '<li><a href="#" data-toggle="modal" data-target="#pesan">Pemesanan Anda</a></li>';
                    echo '<li role="separator" class="divider"></li>';
                    echo '<li><a href="'.base_url().'index.php/hotel/logout">Logout</a></li>';
                } else {
                    echo '<li><a href="#" data-toggle="modal" data-target="#signup">Sign Up</a></li>';
                    echo '<li><a href="#" data-toggle="modal" data-target="#signin">Sign In</a></li>';
                }
              ?>
              
            <!--<li><a href="#" data-toggle="modal" data-target="#signup">Sign Up</a></li>
            <li><a href="#" data-toggle="modal" data-target="#signin">Sign In</a></li>
            
            <li role="separator" class="divider"></li>
            <li><a href="#">Pemesanan Anda</a></li>-->
              
          </ul>
        </li>
          
          <div class="modal fade" id="pesan" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pesanan Anda</h4>
        </div>
        <div class="modal-body">
                                <?php
                                    $notif = $this->session->flashdata('notif');
                                
                                if(!empty($notif)){
                                    echo '
                                        <div class="alert alert-danger">
                                        '.$notif.'
                                        </div>
                                    ';
                                }
                                ?>
            <table border="0" cellpadding="4" cellspacing="0" class="datatable table table-striped table-bordered">
									<tr>
										<th>No</th>
										<th>Kamar</th>
										<th>Tgl CheckIn</th>
                                        <th>Lama Inap</th>
										<th>No.Telp</th>
                                        <th>Status</th>
									</tr>
                                    <?php
                                        $alert = "'Apakah anda yakin membatalkan pesanan ini?'";
                                        $no = 1;
                                        foreach($pesan as $data){
                                            echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$data->kamar.'</td>
                                                <td>'.$data->checkin.'</td>
                                                <td>'.$data->lamainap.'</td>
                                                <td>'.$data->notelp.'</td>
                                                
                                                <td>
                                                    <a href="'.base_url().'index.php/hotel/hapus/'.$data->id.'" class="btn btn-danger btn-sm">
                                                    <i class="glyphicon glyphicon-trash"></i> Batalkan</a>
                                                </td>
                                            </tr>
                                            ';
                                            $no++;
                                        }
                                    
                                    ?>
								</table>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
          
          <form method="post" id="form-pendaftaran" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/hotel/daftar">
          <div class="modal fade" id="signup" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign Up</h4>
        </div>
        <div class="modal-body">
            <?php
                if(!empty($notif)){
                    echo '<div class="alert alert-success">';
                    echo $notif;
                    echo "</div>";
                }
            ?>
            <div class="input-group form-group">
                <span class="input-group-addon" id="basic-addon1">Username</span>
                <input type="text" name="username" id="username" class="form-control" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group form-group">
                <span class="input-group-addon" id="basic-addon1">Nama Lengkap</span>
                <input type="text" name="nama" id="nama" class="form-control" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group form-group">
                <span class="input-group-addon" id="basic-addon1">Email</span>
                <input type="text" name="email" id="email" class="form-control" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group form-group">
                <span class="input-group-addon" id="basic-addon1">Password</span>
                <input type="password" name="password" id="password" class="form-control" aria-describedby="basic-addon1" required>
            </div>
                
        </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button><input type="submit" name="submit" value="Daftar" class="btn btn-primary btn-md">
        </div>
      </div>
    </div>
              </div>
          </form>
          
          <form method="post" id="form-masuk" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/hotel/masuk/">

          <div class="modal fade" id="signin" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign In</h4>
        </div>
        <div class="modal-body">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Username</span>
                <input type="text" name="username" id="username" class="form-control" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Password</span>
                <input type="password" name="password" id="password" class="form-control" aria-describedby="basic-addon1" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button><input type="submit" name="submit" value="Masuk" class="btn btn-primary btn-md">
        </div>
      </div>
    </div>
              </div>
          </form>
          
      </ul>
    </div>
  </div>
</nav>
      
      
      <!-- Your Content Here-->
      
      
      
      <?php
        $this->load->view($main_view);
      ?>
            
      
      
      
      <!-- Footer -->
      
      <div class="panel panel-default" style="margin:0">
          <div class="panel-footer" style="text-align:center"><span class="glyphicon glyphicon-copyright-mark"></span> <b>Rizaldi Wahaz</b></div>
      </div>
</body>
</html>