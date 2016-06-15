 <? $this->load->view('header');?>
 <link href="<?php //echo base_url();?>assets/bootstrap.min.css" rel="stylesheet" type="text/css">
  <title>Tambah pengurus</title>

<?php
echo form_open('pengurus/tambah');
?>


<div class="container">
  <h2>Tambah pengurus</h2>
 
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Form pengurus</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <tr>
          <td>Kode pengurus</td>
          <td>
            <div class="col-sm-2">
                <input type="text" name="kode_pengurus" class="form-control" readonly="readonly" value="<?php echo $kode_pengurus;?>">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Nama pengurus</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama_pengurus" class="form-control" value="" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>Pekerjaan</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="pekerjaan" class="form-control" value="" required>
          </div>
          </td>
         </tr>
       <tr>
          <td>Alamat</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="alamat" class="form-control" value="" required>
            </div>
           </td>
         </tr>
         <tr>
          <td>Telepon</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="telepon" class="form-control" value="" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Jabatan</td>
          <td> <div class="col-sm-5">
          <select name="jabatan" required="requreid" class="form-control">
           <option value="">--Pilih--</option>
           <option value="Ketua">Ketua</option>
           <option value="Sekretaris" >Sekretaris</option>
           <option value="Bendahara">Bendahara</option>
          </select>
</div>
</td>
         </tr>
         <tr>
          <td>Jenis Kelamin</td>
          <td> <div class="col-sm-5">
          <select name="jenis_kelamin" required="requreid" class="form-control">
           <option value="">--Pilih--</option>
           <option value="Laki-laki">Laki-laki</option>
           <option value="Perempuan" >Perempuan</option>
          </select>
</div>
</td>
         </tr>
         <tr>
          <td>Username</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="username" class="form-control" value="" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Password</td>
          <td>
            <div class="col-sm-4">
                <input type="password" name="password" class="form-control" value="" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Konfirmasi Password</td>
          <td>
            <div class="col-sm-4">
                <input type="password" name="password2" class="form-control" value="" required>
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