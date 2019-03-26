<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
  <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Laporan</li>
        <li class="active">Tgl Pembelian</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Laporan Daftar Pembelian</h1>
    <h4>Masukan tanggal awal & tanggal akhir transaksi pembelian yang akan dicetak!</h4><br>
    </div>
  </center>

<center>
      <div style="text-align: center;">
      <?php 
          $tanggal = mktime(date('m'), date("d"), date('Y'));
          echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
          date_default_timezone_set("Asia/Jakarta");

          $jam = date ("H:i:s");
          echo " | Pukul : <b> " . $jam . " " ." </b> <br>";
       ?>
    </div>
<div style="background-color: white; width: 50%; border-radius: 10px; padding: 2%;">
  <div class="container-fluid">
    <form action="lap_pembelian.php" method="GET">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
           <label>Tgl Awal</label>
           <div class="input-group date">
            <div class="input-group-addon">
                   <span class="glyphicon glyphicon-th"></span>
               </div>
               <input id="tgl_mulai" required="required" placeholder="Masukkan tanggal Awal" type="text" class="form-control datepicker" name="tgl_awal">
           </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
           <label>Tgl Akhir</label>
           <div class="input-group date">
            <div class="input-group-addon">
                   <span class="glyphicon glyphicon-th"></span>
               </div>
               <input id="tgl_akhir" required="required" placeholder="Masukkan tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir">
           </div>
          </div>
        </div>
        
      </div> <!-- Akhir Row Pencarian -->
      <button type='submit' class='btn btn-primary'>Tampilkan</button>
    </form> <!-- Penutup Form -->
  </div>
</div>
</center>

<?php include "template/footer.php"; ?>

<script type="text/javascript">
   $(function(){
     $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
    $("#tgl_mulai").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_akhir").datepicker('setStartDate', startDate);
        if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
          $("#tgl_akhir").val($("#tgl_mulai").val());
        }
    });
 });
</script>