 <? $this->load->view('header');?>
<head>
	<title>Data voucher yang belum diserahkan kwitansi</title>
 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/dep/jquery-ui.css" type="text/css" media="all" />

       <link rel="stylesheet" href="<?php echo base_url();?>assets/dep/ui.theme.css" type="text/   css" media="all" />

       <script src="<?php echo base_url();?>assets/dep/jquery.min.js" type="text/javascript"></script>

       <script src="<?php echo base_url();?>assets/dep/jquery-ui.min.js" type="text/javascript"></script>
       

</head>

       <!-- penulisan offline -->
       
<div class="container">
<p><?=$this->session->flashdata('pesan')?> </p>
<h2>Data voucher yang belum diserahkan kwitansi</h2>
<p><a href="<?php echo base_url();?>index.php/voucher/" class="btn btn-primary">Cetak data voucher</a></p>
<br/>
Cari : <input type="text" name="keyword" id="search-box" size="50" placeholder="ketik No voucher yang ingin dicari" >   
<br/>
<div class="panel panel-default">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
	<thead>
<tr>
<th>no voucher</th>
<th>Tanggal Voucher</th>
<th>aksi</th>
</tr>
</thead>


<tbody id="search-result">
<?php
$no=null;
if(isset($data_voucher)){
	foreach($data_voucher as $baris_voucher){
		$no++;
		
		echo '<tr>
		
		<td align="center">'.$baris_voucher['no_voucher'].'</td>
		<td align="center">'.$baris_voucher['tgl_voucher'].'</td>
		<td align="center">
		<a  href="'.base_url().'/index.php/voucher/edit/'.$baris_voucher['no_voucher'].'" class="btn btn-info btn-sm">update</a> 
		
		
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

				    url     :"http://localhost/skripsi/index.php/voucher/do_search",

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


 
