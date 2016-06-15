 <? $this->load->view('header');?>
 <link href="<?php echo base_url(); ?>assets/a/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url()?>assets/a/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<link href="../../assets1/jquery/jquery-ui.css" rel="stylesheet">
  <title>Cetak Laporan Perkembangan Anak Asuh</title>

<?php
echo form_open('perkembangan/cetak');
?>


<div class="container">
  <h2>Cetak Laporan Perkembangan Anak Asuh</h2>
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Cetak Laporan Perkembangan Anak Asuh</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         
         <tr>
          <td>Kode Anak</td>
          <td>
            <div class="col-sm-2">
                <input type="text" name="kode_anak_asuh" id="kode_anak_asuh" class="form-control"  value="" readonly="readonly">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Nama Anak</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama1" id="nama1" class="form-control" value="" required>
          </div>
          </td>
         </tr>
         
         <tr>
          <td>Periode Perkembangan</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="tanggal1" class="form-control datepicker"  data-date-format="yyyy-mm-dd" style="width:150px" required>
          </div>
          </td>
         </tr>

         <tr>
          <td>Sampai Dengan</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="tanggal2" class="form-control datepicker"  data-date-format="yyyy-mm-dd" style="width:150px" required>
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
<script src="../../assets1/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="../../assets1/jquery/jquery-ui.js" type="text/javascript"></script>
<script>
     $(function () {
        $("#nama1").autocomplete({    
            minLength:0,
            delay:0,
            source:'<?php echo site_url('perkembangan/get_allanak'); ?>',   
            select:function(event, ui){
                $('#kode_anak_asuh').val(ui.item.kode_anak_asuh);
                 //$('#alamat').val(ui.item.alamat);
                //$('#telepon').val(ui.item.telepon);
                }
            });
        });
    </script>

  <script src="<?php echo base_url(); ?>assets/a/bootstrap.min.js"></script>

     <!--script src="<?php //echo base_url();?>assets/bootstrap.min.js"></script-->
   
  </body>
</html>