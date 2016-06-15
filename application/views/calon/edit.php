 <? $this->load->view('header');?>
<link href="<?php echo base_url(); ?>assets/a/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url()?>assets/a/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 



  <title>Edit calon</title>

<?php
echo form_open('calon/edit/'.$calon['kode_calon']);
?>


<div class="container">
  <h2>Edit calon</h2>
  *Note : Isikan tanda "-" atau kosongkan Tanggal Jika tidak sesuai dengan data yang diinputkan
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Form calon</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <tr>
          <td>Kode calon</td>
          <td>
            <div class="col-sm-2">
                <input type="text" name="kode_calon" class="form-control" readonly="readonly" value="<?php echo $calon['kode_calon'];?>">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Nama calon</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama_calon" class="form-control" value="<?php echo $calon['nama_calon'];?>" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>Tempat Lahir Calon</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $calon['tempat_lahir'];?>" required>
          </div>
          </td>
         </tr>
       <tr>
          <td>Tanggal Lahir</td>
          <td>
           <div class="col-sm-4">
            <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_lahir" style="width:150px" value="<?php echo $calon['tgl_lahir'];?>"required>
            </div>
           </td>
         </tr>
         <tr>
          <td>Pendidikan Terakhir</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="pendidikan_terakhir" class="form-control" value="<?php echo $calon['pendidikan_terakhir'];?>" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Status Anak</td>
          <td> <div class="col-sm-5">
          <select name="status_anak" required="requreid" class="form-control">
           <option value="">--Pilih--</option>
           <option value="Yatim" <? if($calon['status_anak']=='Yatim'){echo"selected";}?>>Yatim</option>
           <option value="Piatu" <? if($calon['status_anak']=='Piatu'){echo"selected";}?>>Piatu</option>
           <option value="Miskin" <? if($calon['status_anak']=='Miskin'){echo"selected";}?>>Miskin</option>
          </select>
          </div>
          </td>
         </tr>
          <tr>
          <td>Anak ke</td>
          <td>
            <div class="col-sm-4">
                <input type="number" name="anak_ke" size="2" class="form-control" value="<?php echo $calon['anak_ke'];?>" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Dari Berapa Saudara</td>
          <td>
            <div class="col-sm-4">
                <input type="number" name="dari" size="2" class="form-control" value="<?php echo $calon['dari'];?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Alamat</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="alamat" class="form-control" value="<?php echo $calon['alamat'];?>"required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Nama Bapak</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="nama_bapak" class="form-control" value="<?php echo $calon['nama_bapak'];?>"required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Alamat Bapak</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="alamat_bapak" class="form-control" value="<?php echo $calon['alamat_bapak'];?>"required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Pekerjaan Bapak</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="pekerjaan_bapak" class="form-control" value="<?php echo $calon['pekerjaan_bapak'];?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Tanggal Meninggal Bapak</td>
          <td>
            <div class="col-sm-4">
                 <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_meninggal_bapak" style="width:150px" value="<?php echo $calon['tgl_meninggal_bapak'];?>">
            </div>
            </td>
         </tr>
         <tr>
          <td>Nama Ibu</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="nama_ibu" class="form-control" value="<?php echo $calon['nama_ibu'];?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Alamat Ibu</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="alamat_ibu" class="form-control" value="<?php echo $calon['alamat_ibu'];?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Pekerjaan Ibu</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="pekerjaan_ibu" class="form-control" value="<?php echo $calon['pekerjaan_ibu'];?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Tanggal Meninggal Ibu</td>
          <td>
            <div class="col-sm-4">
                 <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_meninggal_ibu" style="width:150px" value="<?php echo $calon['tgl_meninggal_ibu'];?>">
            </div>
            </td>
         </tr>
         <tr>
          <td>Nama Wali</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="nama_wali" class="form-control" value="<?php echo $calon['nama_wali'];?>">
            </div>
            </td>
         </tr>
          <tr>
          <td>Alamat Wali</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="alamat_wali" class="form-control" value="<?php echo $calon['alamat_wali'];?>">
            </div>
            </td>
         </tr>
          <tr>
          <td>Pekerjaan Wali</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="pekerjaan_wali" class="form-control" value="<?php echo $calon['pekerjaan_wali'];?>">
            </div>
            </td>
         </tr>
         <input type="hidden" name="status_ketentuan" value="<?php echo $calon['status_ketentuan'];?>">
         <tr>
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
 <? $this->load->view('footer');?>

<!-- jQuery Version 1.11.0 -->

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


