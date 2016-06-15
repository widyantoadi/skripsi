  <? $this->load->view('header');?>
 <link href="<?php //echo base_url();?>assets/bootstrap.min.css" rel="stylesheet" type="text/css">


<?php
echo form_open('keluarga/edit/'.$calon_keluarga_asuh['kode_calon_keluarga_asuh']);
?>


<div class="container">
  <h2>Edit Keluarga Asuh</h2>
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
    <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Form Edit calon keluarga asuh</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <tr>
          <td>Kode calon keluarga asuh</td>
          <td>
            <div class="col-sm-2">
                <input type="text"  readonly="readonly" name="kode_calon_keluarga_asuh" class="form-control" value="<?php echo $calon_keluarga_asuh['kode_calon_keluarga_asuh'];?>" >
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Nama</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama" class="form-control" value="<?php echo $calon_keluarga_asuh['nama'];?>" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>Jenis Kelamin</td>
          <td> <div class="col-sm-5">
          <select name="jenis_kelamin" required="requreid" class="form-control">
           <option >--Pilih--</option>
           <option value="Laki-laki" <? if($calon_keluarga_asuh['jenis_kelamin']=='Laki-laki'){echo"selected";}?>>Laki-laki</option>
           <option value="Perempuan" <? if($calon_keluarga_asuh['jenis_kelamin']=='Perempuan'){echo"selected";}?>>Perempuan</option>
           </select>
        </div>
        </td>
        </tr>
         <tr>
          <td>Pekerjaan</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="pekerjaan" class="form-control" value="<?php echo $calon_keluarga_asuh['pekerjaan'];?>" required>
          </div>
          </td>
         </tr>
       <tr>
          <td>Alamat</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="alamat" class="form-control" value="<?php echo $calon_keluarga_asuh['alamat'];?>" required>
            </div>
           </td>
         </tr>
         <tr>
          <td>Telepon</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="telepon" class="form-control" value="<?php echo $calon_keluarga_asuh['telepon'];?>" required>
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