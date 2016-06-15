<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

  </head>

  <body>
    <!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>index.php/welcome">Sistem Informasi Administrasi Panti Asuhan</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Master <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url()?>index.php/donatur">Donatur</a></li>
                <li><a href="<?=base_url()?>index.php/keluarga">Keluarga Asuh</a></li>
                <li><a href="<?=base_url()?>index.php/pengurus">Pengurus</a></li>
                <li><a href="<?=base_url()?>index.php/calon">Calon Anak Asuh</a></li>
                <li><a href="<?=base_url()?>index.php/anak">Data Anak Asuh</a></li>
                </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Transaksi <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url()?>index.php/ketentuan">Periksa Ketentuan</a></li>
                <li><a href="<?=base_url()?>index.php/tater">Tanda Terima</a></li>
                <li><a href="<?=base_url()?>index.php/perkembangan">Entry Perkembangan Anak Asuh</a></li>
                <li><a href="<?=base_url()?>index.php/ska">Entry Surat Ketersediaan Asuh</a></li>
                <li><a href="<?=base_url()?>index.php/skpaa">Cetak Surat Keterangan Penyerahan Anak Asuh</a></li>
                <li><a href="<?=base_url()?>index.php/voucher/tampil">Cetak Voucher Pengeluaran Kas</a></li>
                </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url()?>index.php/tater/pra">Laporan Penerimaan Kas Anak Asuh</a></li>
                <li><a href="<?=base_url()?>index.php/skpaa/laporan">Laporan Penyaluran Anak Asuh</a></li>
                <li><a href="<?=base_url()?>index.php/perkembangan/pra">Laporan Perkembangan Anak Asuh</a></li> 
                <li><a href="<?=base_url()?>index.php/voucher/pra">Laporan Pengeluaran Kas Anak Asuh</a></li>
               <li><a href="<?=base_url()?>index.php/agregasi/pra">Laporan Kategori Pengeluaran Kas Terbesar Anak Asuh Per Periode</a></li>
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url()?>index.php/welcome/logout"> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </body>
