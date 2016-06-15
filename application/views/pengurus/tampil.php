 <? $this->load->view('header');?>
<head>
	<title>Data pengurus</title>
 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/dep/jquery-ui.css" type="text/css" media="all" />

       <link rel="stylesheet" href="<?php echo base_url();?>assets/dep/ui.theme.css" type="text/   css" media="all" />

       <script src="<?php echo base_url();?>assets/dep/jquery.min.js" type="text/javascript"></script>

       <script src="<?php echo base_url();?>assets/dep/jquery-ui.min.js" type="text/javascript"></script>
       

</head>

       <!-- penulisan offline -->
       
<div class="container">
<p><?=$this->session->flashdata('pesan')?> </p>
<h2>Data pengurus</h2>
<p><a href="<?php echo base_url();?>index.php/pengurus/tambah" class="btn btn-primary">tambah data</a></p>
<br/>
Cari : <input type="text" name="keyword" id="search-box" size="50" placeholder="ketik kode atau nama yang ingin dicari" >   
<br/>
<div class="panel panel-default">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
	<thead>
<tr>

<th>Kode pengurus</th>
<th>Nama pengurus</th>
<th>Pekerjaan</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Jabatan</th>
<th>Jenis Kelamin</th>
<th>Username</th>


<th>aksi</th>
</tr>
</thead>


<tbody id="search-result">
<?php
$no=null;
if(isset($data_pengurus)){
	foreach($data_pengurus as $baris_pengurus){
		$no++;
		
		echo '<tr>
		
		<td align="center">'.$baris_pengurus['kode_pengurus'].'</td>
		<td>'.$baris_pengurus['nama_pengurus'].'</td>
		<td>'.$baris_pengurus['pekerjaan'].'</td>
		<td>'.$baris_pengurus['alamat'].'</td>
		<td>'.$baris_pengurus['telepon'].'</td>
		<td>'.$baris_pengurus['jabatan'].'</td>
		<td>'.$baris_pengurus['jenis_kelamin'].'</td>
		<td>'.$baris_pengurus['username'].'</td>
		
		
		<td align="center">
		<a  href="'.base_url().'/index.php/pengurus/edit/'.$baris_pengurus['kode_pengurus'].'" class="btn btn-info btn-sm">ubah</a> 
		
		<a   href=" '.base_url().'/index.php/pengurus/hapus/'.$baris_pengurus['kode_pengurus'].'" '?> class="btn btn-danger btn-sm" onclick="return confirm('yakin?')"> hapus</a>
		<?php '
		</td>
			</tr>';
	}
}
?>
</tbody>
</table>
</div>
</div>
</div>
 <? $this->load->view('footer');?>
<script type="text/javascript" >

    	$(function () 
	{

        	$('#search-box').keyup(function () 
		{
		        //alert('key up : ' + $(this).val());

		        var $keyword = $(this).val();

		        $.ajax({
				    type    : "POST",

				    url     :"http://localhost/skripsi/index.php/pengurus/do_search",

				    data    :  {keyword: $keyword},

                    		    dataType: 'json',       

                    			complete: function(data) 
					{
                                         $('#search-result').html(data.responseText);

                                    	///alert(data.responseText);
                                	}   
   
                		});

               

        	});

    	});

   

</script>


 
