 <? $this->load->view('header');?>
 <link href="<?php echo base_url(); ?>assets/a/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url()?>assets/a/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

 <link href="../assets1/jquery/jquery-ui.css" rel="stylesheet">

  <title>Surat Keterangan Penyerahan Anak Asuh</title>

<?php
echo form_open('skpaa/simpan');
?>
<?php $today = date("Y-m-d"); 
//$lastmonth = mktime(date("m")-1, date("d"),   date("Y"));
?>

<div class="container">
  <h2>Surat Keterangan Penyerahan Anak Asuh</h2>
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Form Keterangan Penyerahan Anak Asuh</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <tr>
          <td>Nomor Surat</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="no_skpaa" class="form-control" readonly="readonly" value="<?php echo $no_skpaa;?>">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Tanggal Surat</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="tgl_skpaa" readonly="readonly" value="<?php echo $today; ?>" class="form-control datepicker"  data-date-format="yyyy-mm-dd" style="width:150px">
          </div>
          </td>
         </tr>

         <tr>
          <td>Nomor Surat Ketersediaan </td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="no_ska" id="no_ska" class="form-control"  value="">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Kode Keluarga</td>
          <td>
            <div class="col-sm-2">
                <input type="text" name="kode_calon_keluarga_asuh" id="kode_calon_keluarga_asuh" class="form-control"  value="" readonly="readonly">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Nama Keluarga</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama" id="nama" class="form-control" value="" required readonly="readonly">
          </div>
          </td>
         </tr>
       <tr>
          <td>Alamat</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="alamat" id="alamat" class="form-control" value="" readonly>
            </div>
           </td>
         </tr>
         <tr>
          <td>Jenis Kelamin</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="" readonly>
            </div>
           </td>
         </tr>
         <tr>
          <td>Pekerjaan</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="" readonly>
            </div>
           </td>
         </tr>
       
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
            <input type="text" name="nama_calon" id="nama_calon" class="form-control" value=""  required>
          </div>
          </td>
         </tr>

         <tr>
          <td>Kode Pengurus</td>
          <td>
            <div class="col-sm-2">
                <input type="text" name="kode_pengurus" id="kode_pengurus" class="form-control"  value="<?php echo $kode_pengurus;?>" readonly="readonly">
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
          <td>Alamat Pengurus</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="alamat_pengurus" id="alamat_pengurus" class="form-control" value="<?php echo $alamatp;?>" readonly="readonly">
          </div>
          </td>
         </tr>

         <tr>
          <td>Pekerjaan Pengurus</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="pekerjaan_pengurus" id="pekerjaan_pengurus" class="form-control" value="<?php echo $pekerjaanp;?>" readonly="readonly">
          </div>
          </td>
         </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="jenis_kelamin_pengurus" id="jenis_kelamin_pengurus" class="form-control" value="<?php echo $kelaminp;?>" readonly="readonly">
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
        $("#no_ska").autocomplete({    
            minLength:0,
            delay:0,
            source:'<?php echo site_url('skpaa/get_allska'); ?>',   
            select:function(event, ui){
                $('#kode_calon_keluarga_asuh').val(ui.item.kode_calon_keluarga_asuh);
                $('#nama').val(ui.item.nama);
                $('#alamat').val(ui.item.alamat);
                $('#jenis_kelamin').val(ui.item.jenis_kelamin);
                $('#pekerjaan').val(ui.item.pekerjaan);
                $('#kode_anak_asuh').val(ui.item.kode_anak_asuh);
                $('#nama_calon').val(ui.item.nama_calon);
                //$('#telepon').val(ui.item.telepon);
                }
            });
        });
    </script>

    <script>
     $(function () {
        $("#nama_calon").autocomplete({    
            minLength:0,
            delay:0,
            source:'<?php echo site_url('skpaa/get_xanak'); ?>',   
            select:function(event, ui){
                $('#kode_calon_keluarga_asuh').val(ui.item.kode_calon_keluarga_asuh);
                $('#nama').val(ui.item.nama);
                $('#alamat').val(ui.item.alamat);
                $('#jenis_kelamin').val(ui.item.jenis_kelamin);
                $('#pekerjaan').val(ui.item.pekerjaan);
                $('#kode_anak_asuh').val(ui.item.kode_anak_asuh);
                $('#no_ska').val(ui.item.no_ska);
                //$('#telepon').val(ui.item.telepon);
                }
            });
        });
    </script>

    
    
   
    
    <script src="<?php echo base_url(); ?>assets/a/bootstrap.min.js"></script>

     <!--script src="<?php //echo base_url();?>assets/bootstrap.min.js"></script-->
   
  </body>
</html>