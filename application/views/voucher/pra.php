 <? $this->load->view('header');?>
 <link href="<?php echo base_url(); ?>assets/a/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url()?>assets/a/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

 <link href="../assets1/jquery/jquery-ui.css" rel="stylesheet">

  <title>Laporan  Pengeluaran Kas  Anak Asuh</title>

<?php
echo form_open('voucher/cetak');
?>
<?php $today = date("Y-m-d"); 
//$lastmonth = mktime(date("m")-1, date("d"),   date("Y"));
?>

<div class="container">
  <h2>Laporan  Pengeluaran Kas Anak Asuh</h2>
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  
  <div class="panel-heading"><b> Laporan  Pengeluaran Kas  Anak Asuh</b></div>
  <div class="panel-body">

  
       <table class="table table-striped">

         
         <tr>
          <td>Tanggal Awal</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="tgl1"  value=""class="form-control datepicker" required data-date-format="yyyy-mm-dd" style="width:150px">
          </div>
          </td>
         </tr>

         <tr>
          <td>Tanggal Akhir</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="tgl2"  value=""class="form-control datepicker" required data-date-format="yyyy-mm-dd" style="width:150px">
          </div>
          </td>
         </tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Cetak">
            <button type="reset" onclick="goBack()" class="btn btn-default">Keluar</button>
          </td>
         </tr>
       </table>
 <?php echo form_close();
?>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
 <? //$this->load->view('footer');?>
  <script src="<?php echo base_url() ?>assets/a/jquery-1.11.0.js"></script>

<!--script src="<?php echo base_url(); ?>assets/a/bootstrap.min.js"></script-->

<script type="text/javascript" src="<?php echo base_url()?>assets/a/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/a/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>

<script type="text/javascript">

 $('.datepicker').datetimepicker({

        language:  'id',

        weekStart: 1,

        todayBtn:  1,

  autoclose: 1,

  todayHighlight: 1,

  startView: 2,

  minView: 2,

  forceParse: 0

    });

</script>
 <script>
function goBack() {
    window.history.back();
}
</script>

   
    
    <script src="<?php echo base_url(); ?>assets/a/bootstrap.min.js"></script>

     <!--script src="<?php //echo base_url();?>assets/bootstrap.min.js"></script-->
   
  </body>
</html>