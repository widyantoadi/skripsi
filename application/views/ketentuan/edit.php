 <? $this->load->view('header');?>
 <link href="<?php //echo base_url();?>assets/bootstrap.min.css" rel="stylesheet" type="text/css">
  <title>Update Ketentuan Calon</title>

<?php
echo form_open('ketentuan/edit/'.$ketentuan['kode_calon']);
?>


<div class="container">
  <h2>Update Ketentuan Calon </h2>
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <?php //echo validation_errors();?>
    <?php //echo $message;?>
  <div class="panel-heading"><b>Form Update ketentuan calon anak asuh</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
        
          <!--td>Kode anak</td>
          <td>
            <div class="col-sm-5"-->
                <input type="hidden" name="kode_anak_asuh" class="form-control" readonly="readonly" value="<?php echo $kode_anak_asuh;?>">
            <!--/div>
            </td>
         </tr-->
        
          
                
                      <input type="hidden" name="kode_calon" class="form-control" readonly="readonly" value="<?php echo $ketentuan['kode_calon'];?>">
                      
            
         <tr>
          <td>Nama Calon</td>
          <td>
            <div class="col-sm-5">
                <input type="text" name="nama_calon" class="form-control" readonly="readonly" value="<?php echo $ketentuan['nama_calon'];?>">
            </div>
            </td>
         </tr>
         <tr>
         <tr>
          <td>Rapor</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="rapor"  value="ada" <? if($ketentuan['rapor']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="rapor"  value="tidak" <? if($ketentuan['rapor']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>Ijazah</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="ijazah"  value="ada" <? if($ketentuan['ijazah']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="ijazah"  value="tidak" <? if($ketentuan['ijazah']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
         </tr>
        <tr>
          <td>surat kematian orang tua</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_kematian_ortu"  value="ada" <? if($ketentuan['surat_kematian_ortu']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_kematian_ortu"  value="tidak" <? if($ketentuan['surat_kematian_ortu']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
         </tr>      
         <tr>
          <td>surat keterangan sehat</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_keterangan_sehat"  value="ada" <? if($ketentuan['surat_keterangan_sehat']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_keterangan_sehat"  value="tidak" <? if($ketentuan['surat_keterangan_sehat']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
         </tr>
        
        <tr>
          <td>akte kelahiran</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="akte_kelahiran"  value="ada" <? if($ketentuan['akte_kelahiran']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="akte_kelahiran"  value="tidak" <? if($ketentuan['akte_kelahiran']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>kartu keluarga</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="kartu_keluarga"  value="ada" <? if($ketentuan['kartu_keluarga']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="kartu_keluarga"  value="tidak" <? if($ketentuan['kartu_keluarga']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>foto</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="foto"  value="ada" <? if($ketentuan['foto']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="foto"  value="tidak" <? if($ketentuan['foto']=='tidak'){echo"checked";}?> > tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>surat pengantar RT RW</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_pengantar_rt_rw"  value="ada" <? if($ketentuan['surat_pengantar_rt_rw']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_pengantar_rt_rw"  value="tidak" <? if($ketentuan['surat_pengantar_rt_rw']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>Surat Rekomendasi Muhammadiyah</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_rek_muh"  value="ada" <? if($ketentuan['surat_rek_muh']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_rek_muh"  value="tidak" <? if($ketentuan['surat_rek_muh']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
          </tr>
          
          <tr>
          <td>wawancara</td>
          <td>
          <div class="col-sm-6">
            <div class="radio-inline"> <input type="radio" name="wawancara"  value="lolos" <? if($ketentuan['wawancara']=='lolos'){echo"checked";}?>> lolos </div>
        <div class="radio-inline"> <input type="radio" name="wawancara"  value="tidak" <? if($ketentuan['wawancara']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
          </tr>
          <tr>
          <td>surat ketersediaan anak</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_ketersediaan_anak"  value="ada" <? if($ketentuan['surat_ketersediaan_anak']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_ketersediaan_anak"  value="tidak" <? if($ketentuan['surat_ketersediaan_anak']=='tidak'){echo"checked";}?>> tidak </div>
          </div>
          </td>
          </tr>
          <tr>
          <td>surat pernyataan wali</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_pernyataan_wali"  value="ada" <? if($ketentuan['surat_pernyataan_wali']=='ada'){echo"checked";}?>> ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_pernyataan_wali"  value="tidak" <? if($ketentuan['surat_pernyataan_wali']=='tidak'){echo"checked";}?>> tidak </div>
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
 <script>
function goBack() {
    window.history.back();
}
</script>