<form method="post" id="form-pesan" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/hotel/pesan">
<div class="container" style="margin-top:20px;max-width:800px;margin-bottom:20px">
    <?php
                if(!empty($notif)){
                    echo '<div class="alert alert-success">';
                    echo $notif;
                    echo "</div>";
                }
            ?>
    <div class="panel panel-success">
      <div class="panel-heading">
        <h1 class="panel-title">Form Pemesanan Hotel</h1>
      </div>
      <div class="panel-body">
        <div class="row">
            <div class="container">
                <div class="col-lg-7">
                <div class="form-group input-group">
                    <span class="input-group-addon" id="basic-addon1">Nama Lengkap</span>
                    <input type="text" name="nama" id="nama" class="form-control" aria-describedby="basic-addon1" required>
                </div>
                </div>
                <div class="col-lg-7">
                <div class="form-group input-group">
                    <span class="input-group-addon" id="basic-addon1">Tipe Kamar</span>
                    <input type="text" name="kamar" id="kamar" class="form-control" aria-describedby="basic-addon1" required>
                </div>
                </div>
                <div class="col-lg-12">
                <div class="form-group input-group">
                    <h4 class="">Tanggal Check-In <input type="date" name="checkin" id="checkin"></h4>
                </div>
                </div>
                <div class="col-lg-12">
                <h4 class="">Lama Menginap
                    <select class="selectpicker" name="lamainap" id="lamainap">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                </h4>
                </div>
                <div class="col-lg-7">
                <div class="form-group input-group">
                    <span class="input-group-addon" id="basic-addon1">No Telp</span>
                    <input type="text" name="notelp" id="notelp" class="form-control" aria-describedby="basic-addon1" required>
                </div>
                </div>
            </div>
        </div>
      </div>
    </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
						<input type="reset" name="reset" value="RESET" class="btn btn-block btn-md btn-danger">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
						<input type="submit" name="submit" value="PESAN" class="btn btn-block btn-md btn-primary">
					</div>	
				</div>
</div>
</form>