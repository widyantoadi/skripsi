  <? $this->load->view('header');?>
 <link href="<?php //echo base_url();?>assets/bootstrap.min.css" rel="stylesheet" type="text/css">


<?php
echo form_open('donatur/edit/'.$donatur['kode_donatur']);
?>


<div class="container">
  <h2>Edit donatur</h2>
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
    <?php echo validation_errors();?>
    <?php echo $message;?>
  <div class="panel-heading"><b>Form Edit Donatur</b></div>
  <div class="panel-body">

  <?=$this->session->flashdata('pesan')?>
     
       <table class="table table-striped">

         
         <tr>
          <td>Kode Donatur</td>
          <td>
            <div class="col-sm-2">
                <input type="text"  readonly="readonly" name="kode_donatur" class="form-control" value="<?php echo $donatur['kode_donatur'];?>" >
            </div>
            </td>
         </tr>
         
         <tr>
          <td>Nama Donatur</td>
          <td>
          <div class="col-sm-4">
            <input type="text" name="nama_donatur" class="form-control" value="<?php echo $donatur['nama_donatur'];?>" required>
          </div>
          </td>
         </tr>
       <tr>
          <td>Alamat</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="alamat" class="form-control" value="<?php echo $donatur['alamat'];?>" required>
            </div>
           </td>
         </tr>
         <tr>
          <td>Telepon</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="telepon" class="form-control" value="<?php echo $donatur['telepon'];?>" required>
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