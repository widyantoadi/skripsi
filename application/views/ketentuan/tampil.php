 <? $this->load->view('header');?>
<head>
	<title>Data ketentuan calon anak asuh</title>
 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/dep/jquery-ui.css" type="text/css" media="all" />

       <link rel="stylesheet" href="<?php echo base_url();?>assets/dep/ui.theme.css" type="text/   css" media="all" />

       <script src="<?php echo base_url();?>assets/dep/jquery.min.js" type="text/javascript"></script>

       <script src="<?php echo base_url();?>assets/dep/jquery-ui.min.js" type="text/javascript"></script>
       

</head>

       <!-- penulisan offline -->
       
<div class="container">
<p><?=$this->session->flashdata('pesan')?> </p>
<h2>Data ketentuan calon anak asuh</h2>
<p><a href="<?php echo base_url();?>index.php/ketentuan/form_tambah" class="btn btn-primary">Periksa Ketentuan Calon</a></p>
<br/>
Cari : <input type="text" name="keyword" id="search-box" size="50" placeholder="ketik nama yang ingin dicari" >   
<br/>
<div class="panel panel-default">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
	<thead>
<tr>


<th>kode calon</th>
<th>Nama calon</th>



<th>aksi</th>
</tr>
</thead>


<tbody id="search-result">
<?php

$no=null;
if(isset($data_ketentuan)){
	foreach($data_ketentuan as $baris_ketentuan){
		$no++;
		
		echo '<tr>
		

		<td>'.$baris_ketentuan['kode_calon'].'</td>
		<td>'.$baris_ketentuan['nama_calon'].'</td>
		
		
		<td align="center">
		<a  href="'.base_url().'/index.php/ketentuan/edit_form/'.$baris_ketentuan['kode_calon'].'" class="btn btn-info btn-sm">ubah</a> 
		
		
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

				    url     :"http://localhost/skripsi/index.php/ketentuan/do_search",

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


 
