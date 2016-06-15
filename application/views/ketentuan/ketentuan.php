 <? $this->load->view('header');?>
 <link href="<?php //echo base_url();?>assets/bootstrap.min.css" rel="stylesheet" type="text/css">
  <title>Periksa Ketentuan Calon</title>

<?php
echo form_open('ketentuan/tambah');
?>


<div class="container">
  <h2>Periksa Ketentuan Calon</h2>
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <?php echo validation_errors();?>
    <?php //echo $message;?>
  <div class="panel-heading"><b>Form Periksa ketentuan calon anak asuh</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <!--tr>
          <td>Kode anak</td>
          <td>
            <div class="col-sm-5"-->
                <input type="hidden" name="kode_anak_asuh" class="form-control" readonly="readonly" value="<?php echo $kode_anak_asuh;?>">
            <!--/div>
            </td>
         </tr-->
         <?php /*
         <tr>
          <td>Kode calon anak asuh asuh</td>
          <td>
            <div class="col-sm-5">
                <input type="text" name="" class="form-control" readonly="readonly" value="<?php //echo $kode_calon_keluarga_asuh;?>">
            </div>
            </td>
         </tr>
         <tr>
         */ ?>
          <td>Nama calon anak asuh</td>
          <td>
            <div class="col-sm-5">
                <!--input type="text" name="kode_calon_keluarga_asuh" class="form-control" readonly="readonly" value="<?php //echo $kode_calon_keluarga_asuh;?>" -->
                <select id="kode_calon" name ="kode_calon" data-rel="chosen" class="form-control" required>

                        <?php foreach ($data_calon as $list) : ?>
                        <option value="<?php echo $list['kode_calon']; ?>"> <?php echo  $list['nama_calon'];?> </option>
                      <?php endforeach;?>
                      </select>
            </div>
            </td>
         </tr>
         <tr>
          <td>Rapor</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="rapor"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="rapor"  value="tidak" checked> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>Ijazah</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="ijazah"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="ijazah"  value="tidak" checked> tidak </div>
          </div>
          </td>
         </tr>
        <tr>
          <td>surat kematian orang tua</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_kematian_ortu"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_kematian_ortu"  value="tidak" checked> tidak </div>
          </div>
          </td>
         </tr>      
         <tr>
          <td>surat keterangan sehat</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_keterangan_sehat"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_keterangan_sehat"  value="tidak" checked> tidak </div>
          </div>
          </td>
         </tr>
        
        <tr>
          <td>akte kelahiran</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="akte_kelahiran"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="akte_kelahiran"  value="tidak" checked> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>kartu keluarga</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="kartu_keluarga"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="kartu_keluarga"  value="tidak" checked> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>foto</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="foto"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="foto"  value="tidak" checked> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>surat pengantar RT RW</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_pengantar_rt_rw"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_pengantar_rt_rw"  value="tidak" checked> tidak </div>
          </div>
          </td>
         </tr>
         <tr>
          <td>Surat Rekomendasi Muhammadiyah</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_rek_muh"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_rek_muh"  value="tidak" checked>tidak </div>
          </div>
          </td>
          </tr>
          
          <tr>
          <td>wawancara</td>
          <td>
          <div class="col-sm-6">
          <div class="radio-inline"> <input type="radio" name="wawancara"  value="lolos" >lolos</div>
          <div class="radio-inline"> <input type="radio" name="wawancara"  value="tidak" checked>tidak</div>
          </div>
          </td>
          </tr>
          <tr>
          <td>surat ketersediaan anak</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_ketersediaan_anak"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_ketersediaan_anak"  value="tidak" checked> tidak </div>
          </div>
          </td>
          </tr>
          <tr>
          <td>surat pernyataan wali</td>
          <td>
          <div class="col-sm-4">
            <div class="radio-inline"> <input type="radio" name="surat_pernyataan_wali"  value="ada" > ada </div>
        <div class="radio-inline"> <input type="radio" name="surat_pernyataan_wali"  value="tidak" checked> tidak </div>
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