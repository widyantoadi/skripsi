<? $this->load->view('header');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--link href="<?=base_url()?>assets/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!--link href="<?=base_url()?>assets/css/style.css" rel="stylesheet"-->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Laporan Kategori Pengeluaran Kas Terbesar Anak Asuh Per Tanggal <?php echo tanggal($tgl1); ?> sampai <?php echo tanggal($tgl2); ?></title>
<!--script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script-->
<script src="<?php echo base_url();?>a3/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url();?>a3/highcharts.js"></script>
<script type="text/javascript">
 
$(function () {
	$('#container').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false
		},
		title: {
			text: 'Laporan Kategori Pengeluaran Kas Terbesar Anak Asuh Per Tanggal <?php echo tanggal($tgl1); ?> sampai <?php echo tanggal($tgl2); ?>'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					style: {
						color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					}
				}
			}
		},
		series: [{
			type: 'pie',
			name: 'Persentase Laporan Kategori Pengeluaran Kas Terbesar Anak Asuh',
			data: [
					<?php 
					// data yang diambil dari database
					if(count($graph)>0)
					{
					   foreach ($graph as $data) {
					   echo "['" .$data->kategori . "'," . $data->jumlah ."],\n";
					   }
					}
					?>
			]
		}]
	});
});
 
</script>
</head>
<body>
 <!--A HREF="javascript:window.print()">Click to Print This Page</A-->
<div id="container"></div>
 <FORM>
 	<div class="conatiner">
 		<p>Keterangan:</p>
 	<table  class="table table-condensed">
<tr>
    
    <th>Kategori</th>
    <th >Jumlah</th>
    <th>Terbilang</th>

    
</tr>
<?php
if( isset($graph)){
    //$no = 1;
    foreach($graph as $data){
        echo "<tr>";
        
        echo "<td>".$data->kategori."</td>";
        echo "<td>".str_replace(",",".",number_format($data->jumlah))."</td>";
        echo "<td>". ucwords(number_to_words($data->jumlah,2)) ." </td>";
       
        echo "</tr>";
        //$no++;
    }


}
?>
</table>
<INPUT TYPE="button" value="Cetak" onClick="window.print()">
</FORM>
</div>
</body>
</html>
 <script src="<?php echo base_url(); ?>assets/a/bootstrap.min.js"></script>