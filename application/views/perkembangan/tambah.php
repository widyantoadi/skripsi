 <? $this->load->view('header');?>
 <link href="<?php echo base_url(); ?>assets/a/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url()?>assets/a/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<link href="../assets1/jquery/jquery-ui.css" rel="stylesheet">
  <title>Perkembangan Anak Asuh</title>

<?php
echo form_open('perkembangan/simpan');
?>
<?php $today = date("Y-m-d H:i:s"); ?>

<div class="container">
  <h2>Entry Perkembangan Anak Asuh</h2>
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Form Perkembangan Anak Asuh</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <!--tr>
          <td>Kode Anak Asuh</td>
          <td>
            <div class="col-sm-4">
                <select id="kode_calon" name ="kode_anak_asuh" data-rel="chosen" class="form-control">

                        <?php /*foreach ($data_anak_asuh as $list) : ?>
                        <option value="<?php echo $list['kode_anak_asuh']; ?>"> <?php echo $list['kode_anak_asuh'];?> </option>
                      <?php endforeach;*/?>
                      </select>
            </div>
            </td>
         </tr-->
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
          <td>Tanggal Entry Perkembangan</td>
          <td>
          <div class="col-sm-8">
            <input type="text" name="tanggal"  value="<?php echo $today; ?>"class="form-control datepicker"  data-date-format="yyyy-mm-dd hh:mm:ss" style="width:250px">
          </div>
          <!--div class="col-sm-8">
            <input type="datetime-local" name="tanggal" value="<?php echo $today;?>" -->
          </div>
          </td>
         </tr>
         <tr>
          <td>Kategori</td>
          <td> <div class="col-sm-5">
          <select name="kategori" required="requreid" class="form-control">
           <option value="">--Pilih--</option>
           <option value="Akademis">Akademis</option>
           <option value="Kesehatan" >Kesehatan</option>
           <option value="Lain-lain">Lain-lain</option>
          </select>
</div>
</td>
         </tr>
           
       
         <tr>
          <td>Keterangan</td>
          <td>
          <div class="col-sm-6">
            <!--input type="text" name="" class="form-control" value=""-->
            <textarea class="form-control" name="keterangan" value="" required></textarea>
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
<script src="../assets1/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="../assets1/jquery/jquery-ui.js" type="text/javascript"></script>
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