 <? $this->load->view('header');?>
<head>
	<title>Data calon keluarga asuh</title>
 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/dep/jquery-ui.css" type="text/css" media="all" />

       <link rel="stylesheet" href="<?php echo base_url();?>assets/dep/ui.theme.css" type="text/   css" media="all" />

       <script src="<?php echo base_url();?>assets/dep/jquery.min.js" type="text/javascript"></script>

       <script src="<?php echo base_url();?>assets/dep/jquery-ui.min.js" type="text/javascript"></script>
       

</head>

       <!-- penulisan offline -->
       
<div class="container">
<p><?=$this->session->flashdata('pesan')?> </p>
<h2>Data calon keluarga asuh</h2>
<p><a href="<?php echo base_url();?>index.php/keluarga/tambah" class="btn btn-primary">tambah data</a></p>
<br/>
Cari : <input type="text" name="keyword" id="search-box" size="50" placeholder="ketik kode atau nama yang ingin dicari" >   
<br/>
<div class="panel panel-default">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
	<thead>
<tr>

<th>Kode </th>
<th>Nama </th>
<th>Jenis Kelamin</th>
<th>Pekerjaan</th>
<th>alamat</th>
<th>Telepon</th>


<th>aksi</th>
</tr>
</thead>


<tbody id="search-result">
<?php
$no=null;
if(isset($data_calon_keluarga_asuh)){
	foreach($data_calon_keluarga_asuh as $baris_calon_keluarga_asuh){
		$no++;
		
		echo '<tr>
		
		<td align="center">'.$baris_calon_keluarga_asuh['kode_calon_keluarga_asuh'].'</td>
		<td>'.$baris_calon_keluarga_asuh['nama'].'</td>
		<td>'.$baris_calon_keluarga_asuh['jenis_kelamin'].'</td>
		<td>'.$baris_calon_keluarga_asuh['pekerjaan'].'</td>
		<td>'.$baris_calon_keluarga_asuh['alamat'].'</td>
		<td>'.$baris_calon_keluarga_asuh['telepon'].'</td>
		
		
		<td align="center">
		<a  href="'.base_url().'/index.php/keluarga/edit/'.$baris_calon_keluarga_asuh['kode_calon_keluarga_asuh'].'" class="btn btn-info btn-sm">ubah</a> 
		
		<a   href=" '.base_url().'/index.php/keluarga/hapus/'.$baris_calon_keluarga_asuh['kode_calon_keluarga_asuh'].'" '?> class="btn btn-danger btn-sm" onclick="return confirm('yakin?')"> hapus</a>
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

				    url     :"http://localhost/skripsi/index.php/keluarga/do_search",

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


 
