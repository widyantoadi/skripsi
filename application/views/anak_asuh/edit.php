 <? $this->load->view('header');?>
 <?
  foreach($qanak_asuh as $rowdata){
    $kode=$rowdata->kode_anak_asuh;
     $kode1=$rowdata->kode_calon;
    $nama=$rowdata->nama_calon;
    $tempat=$rowdata->tempat_lahir;
    $tgl=$rowdata->tgl_lahir;
    $pendidikan_terakhir=$rowdata->pendidikan_terakhir;
    $status_anak=$rowdata->status_anak;
    $anak_ke=$rowdata->anak_ke;
    $dari=$rowdata->dari;
    $alamat=$rowdata->alamat;
    $nama_bapak=$rowdata->nama_bapak;
    $alamat_bapak=$rowdata->alamat_bapak;
    $pekerjaan_bapak=$rowdata->pekerjaan_bapak;
    $tgl_meninggal_bapak=$rowdata->tgl_meninggal_bapak;
    $nama_ibu=$rowdata->nama_ibu;
    $alamat_ibu=$rowdata->alamat_ibu;
    $pekerjaan_ibu=$rowdata->pekerjaan_ibu;
    $tgl_meninggal_ibu=$rowdata->tgl_meninggal_ibu;
    $nama_wali=$rowdata->nama_wali;
    $alamat_wali=$rowdata->alamat_wali;
    $pekerjaan_wali=$rowdata->pekerjaan_wali;
    $status=$rowdata->status;
    
  }
?>
<link href="<?php echo base_url(); ?>assets/a/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url()?>assets/a/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 



  <title>Edit Data Anak</title>

<?php
echo form_open('anak/edit/'.$kode);
?>


<div class="container">
  <h2>Edit Data Anak</h2>
  *Note : Isikan tanda "-" atau kosongkan Tanggal Jika tidak sesuai dengan data yang diinputkan
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Form Edit Aanak</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <input type="hidden" name="kode_calon" class="form-control" readonly="readonly" value="<?=$kode1?>">
         
         <tr>
          <td>Nama calon</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama_calon" class="form-control" value="<?=$nama?>" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>Tempat Lahir Calon</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="tempat_lahir" class="form-control" value="<?=$tempat?>" required>
          </div>
          </td>
         </tr>
       <tr>
          <td>Tanggal Lahir</td>
          <td>
           <div class="col-sm-4">
            <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_lahir" style="width:150px" value="<?=$tgl?>" required>
            </div>
           </td>
         </tr>
         <tr>
          <td>Pendidikan Terakhir</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="pendidikan_terakhir" class="form-control" value="<?=$pendidikan_terakhir?>" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Status Anak</td>
          <td> <div class="col-sm-5">
          <select name="status_anak" required="requreid" class="form-control">
           <option value="">--Pilih--</option>
           <option value="Yatim" <? if($status_anak=='Yatim'){echo"selected";}?>>Yatim</option>
           <option value="Piatu" <? if($status_anak=='Piatu'){echo"selected";}?>>Piatu</option>
           <option value="Miskin" <? if($status_anak=='Miskin'){echo"selected";}?>>Miskin</option>
          </select>
          </div>
          </td>
         </tr>
          <tr>
          <td>Anak ke</td>
          <td>
            <div class="col-sm-4">
                <input type="number" name="anak_ke" size="2" class="form-control" value="<?=$anak_ke?>" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Dari Berapa Saudara</td>
          <td>
            <div class="col-sm-4">
                <input type="number" name="dari" size="2" class="form-control" value="<?=$dari?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Alamat</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="alamat" class="form-control" value="<?=$alamat?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Nama Bapak</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="nama_bapak" class="form-control" value="<?=$nama_bapak?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Alamat Bapak</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="alamat_bapak" class="form-control" value="<?=$alamat_bapak?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Pekerjaan Bapak</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="pekerjaan_bapak" class="form-control" value="<?=$pekerjaan_bapak?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Tanggal Meninggal Bapak</td>
          <td>
            <div class="col-sm-4">
                 <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_meninggal_bapak" style="width:150px" value="<?=$tgl_meninggal_bapak?>">
            </div>
            </td>
         </tr>
         <tr>
          <td>Nama Ibu</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="nama_ibu" class="form-control" value="<?=$nama_ibu?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Alamat Ibu</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="alamat_ibu" class="form-control" value="<?=$alamat_ibu?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Pekerjaan Ibu</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="pekerjaan_ibu" class="form-control" value="<?=$pekerjaan_ibu?>" required>
            </div>
            </td>
         </tr>
          <tr>
          <td>Tanggal Meninggal Ibu</td>
          <td>
            <div class="col-sm-4">
                 <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_meninggal_ibu" style="width:150px" value="<?=$tgl_meninggal_ibu?>">
            </div>
            </td>
         </tr>
         <tr>
          <td>Nama Wali</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="nama_wali" class="form-control" value="<?=$nama_wali?>">
            </div>
            </td>
         </tr>
          <tr>
          <td>Alamat Wali</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="alamat_wali" class="form-control" value="<?=$alamat_wali?>">
            </div>
            </td>
         </tr>
          <tr>
          <td>Pekerjaan Wali</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="pekerjaan_wali" class="form-control" value="<?=$pekerjaan_wali?>">
            </div>
            </td>
         </tr>
         
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


