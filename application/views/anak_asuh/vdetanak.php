<? $this->load->view('header');?>
<?
  foreach($qanak_asuh as $rowdata){
    $kode=$rowdata->kode_anak_asuh;
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
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Detail </b></div>
  <div class="panel-body">

     <p> <a href="<?php echo base_url()?>index.php/anak" class="btn btn-sm btn-info"> Kembali</a>
     </p>

       <table class="table table-striped">
         <tr>
          <td>Kode anak</td>
          <td><?=$kode?></td>
         </tr>
         <tr>
          <td>Nama Anak</td>
          <td><?=$nama?></td>
          </tr>
          <tr>
          <td>Tempat Lahir Anak</td>
          <td><?=$tempat?></td>
          </tr>
          <tr>
          <td>Tanggal Lahir Anak</td>
          <td><?=$tgl?></td>
          </tr>
         <tr>
          <td>Pendidikan Terakhir Anak</td>
          <td><?=$pendidikan_terakhir?></td>
          </tr>
          <tr>
          <td>status Anak</td>
          <td><?=$status_anak?></td>
          </tr>
          <tr>
          <td>Anak ke</td>
          <td><?=$anak_ke?></td>
          </tr>
          <tr>
          <td>Dari Berapa Saudara</td>
          <td><?=$dari?></td>
          </tr>
          <tr>
          <td>alamat Anak</td>
          <td><?=$alamat?></td>
          </tr>
          <tr>
          <td>Nama Bapak</td>
          <td><?=$nama_bapak?></td>
          </tr>
          <tr>
          <td>Alamat Bapak</td>
          <td><?=$alamat_bapak?></td>
          </tr>
          <tr>
          <td>Pekerjaan Bapak</td>
          <td><?=$pekerjaan_bapak?></td>
          </tr>
          <tr>
          <td>Tanggal Meninggal Bapak</td>
          <td><?=$tgl_meninggal_bapak?></td>
          </tr>
          <tr>
          <td>Nama Ibu</td>
          <td><?=$nama_ibu?></td>
          </tr>
          <tr>
          <td>Alamat Ibu</td>
          <td><?=$alamat_ibu?></td>
          </tr>
          <tr>
          <td>Pekerjaan Ibu</td>
          <td><?=$pekerjaan_ibu?></td>
          </tr>
          <tr>
          <td>Tanggal Meninggal Ibu</td>
          <td><?=$tgl_meninggal_ibu?></td>
          </tr>
          <tr>
          <td>Nama wali</td>
          <td><?=$nama_wali?></td>
          </tr>
          <tr>
          <td>Alamat wali</td>
          <td><?=$alamat_wali?></td>
          </tr>
          <tr>
          <td>Pekerjaan wali</td>
          <td><?=$pekerjaan_wali?></td>
          </tr>
          <tr>
          <td>Status Anak</td>
          <td><?=$status?></td>
          </tr>

       </table>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
<? $this->load->view('footer');?>