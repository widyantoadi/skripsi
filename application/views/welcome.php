<?php $this->load->view('header')?>
<body>

    

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-image: url('<?= base_url('img/blue.jpg');?>');height: 600px;background-size: cover;background-repeat: no-repeat; ">
      <div class="container">
        <h1 style="font-family: 'tahoma';font-size: 80px;color: white;">Selamat Datang! <?php echo $username;?></h1>
        
        <p style="color:white;">Ini adalah Sistem Informasi Administrasi Panti Asuhan Muhammadiyah Aisyiyah cabang Pulogadung </p>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Modul Master</h2>
          <p>Modul Master Terdiri dari Modul modul yang digunakan untuk mengadministrasi Data Pengurus,Calon anak Asuh, Data Donatur, Data anak asuh, dan Data calon Keluarga Asuh.  </p>
          <!--p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p-->
        </div>
        <div class="col-md-4">
          <h2>Modul Transaksi</h2>
          <p>Modul Laporan Terdiri dari Modul Periksa Ketentuan Anak Asuh, Cetak Tanda Terima, Entri Surat Ketersediaan Asuh ,Cetak Surat Keterangan Penyerahan Anak Asuh,</p>
          <!--p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p-->
       </div>
        <div class="col-md-4">
          <h2>Modul Laporan</h2>
          <p>Modul Master Terdiri dari Modul modul yang digunakan untuk mengadministrasi Data Pengurus,Calon anak Asuh, Data Donatur, Data anak asuh, dan Data calon Keluarga Asuh.</p>
          <!--p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p-->
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Adi widyanto, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  -->
  </body>
  <?php $this->load->view('footer')?>