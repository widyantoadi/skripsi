 <? $this->load->view('header');?>
 <link href="<?php echo base_url(); ?>assets/a/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url()?>assets/a/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

 <link href="../assets1/jquery/jquery-ui.css" rel="stylesheet">

  <title>Tanda Terima</title>

<?php
echo form_open('tater/simpan');
?>
<?php $today = date("Y-m-d"); 

?>

<div class="container">
  <h2>Tanda Terima</h2>
 
<div class="panel panel-default">
  <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Form Tanda Terima</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <tr>
          <td>Nomor Tanda Terima</td>
          <td>
            <div class="col-sm-2">
                <input type="text" name="no_tanda_terima" class="form-control" readonly="readonly" value="<?php echo $no_tanda_terima;?>">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Tanggal Tanda Terima</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="tgl_terima" readonly="readonly" value="<?php echo $today; ?>"class="form-control datepicker"  data-date-format="yyyy-mm-dd" style="width:150px">
          </div>
          </td>
         </tr>
         <tr>
          <td>Kode Donatur</td>
          <td>
            <div class="col-sm-2">
                <input type="text" name="kode" id="kode" class="form-control"  value="" readonly="readonly">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Nama Donatur</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama_donatur" id="nama_donatur" class="form-control" value="" required>
          </div>
          </td>
         </tr>
       <tr>
          <td>Alamat</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="alamat" id="alamat" class="form-control" value="" readonly="readonly">
            </div>
           </td>
         </tr>
       
         <tr>
          <td>Kode Pengurus</td>
          <td>
            <div class="col-sm-2">
                <input type="text" name="kode1" id="kode1" class="form-control"  value="<?php echo $kode_pengurus;?>" readonly="readonly">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Nama Pengurus</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama_pengurus" id="nama_pengurus" class="form-control" value="<?php echo $nama_pengurus;?>" readonly="readonly">
          </div>
          </td>
         </tr>

        
         <tr>
          <td>Banyak Uang</td>
          <td>
          <div class="col-sm-6">
            <input type="text" name="banyaknya_uang" class="form-control" value="" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>Untuk Pembayaran</td>
          <td>
          <div class="col-sm-6">
            <!--input type="text" name="" class="form-control" value=""-->
            <textarea class="form-control" name="untuk_pembayaran" value="" required></textarea>
          </div>
          </td>
         </tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan">
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
  <!--script src="<?php echo base_url() ?>assets/a/jquery-1.11.0.js"></script>

<script src="<?php echo base_url(); ?>assets/a/bootstrap.min.js"></script-->

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
<script src="../assets1/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="../assets1/jquery/jquery-ui.js" type="text/javascript"></script>
    <script>
     $(function () {
        $("#nama_donatur").autocomplete({    
            minLength:0,
            delay:0,
            source:'<?php echo site_url('tater/get_alldonatur'); ?>',   
            select:function(event, ui){
                $('#kode').val(ui.item.kode);
                $('#alamat').val(ui.item.alamat);
                //$('#telepon').val(ui.item.telepon);
                }
            });
        });
    </script>

    <!--script>
     $(function () {
        $("#nama_pengurus").autocomplete({    
            minLength:0,
            delay:0,
            source:'<?php //echo site_url('tater/get_allpengurus'); ?>',   
            select:function(event, ui){
                $('#kode1').val(ui.item.kode1);
                 //$('#alamat').val(ui.item.alamat);
                //$('#telepon').val(ui.item.telepon);
                }
            });
        });
    </script-->
    
   
    
    <script src="<?php echo base_url(); ?>assets/a/bootstrap.min.js"></script>

     <!--script src="<?php //echo base_url();?>assets/bootstrap.min.js"></script-->
   
  </body>
</html>