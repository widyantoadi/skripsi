<html>
<head>
<style type=”text/css”>

 .a td, .a th {
            border-style:solid; 
            border-width:3px; 
            border-color:#000066; 
            padding:10px;
         }
b {color:#000066;}
th,td{color: #000066;}
p {margin-left:20px;}
table {
    border-collapse: collapse;
    border-style: solid;
    border-color: #000066;

}

</style>
</head>
<body style="color:#000066;">
No : <?php echo $no_voucher;?>
<br>
Tanggal :<?php echo $tgl_voucher;?>
<p style="text-align: center;"><B>VOUCHER PENGELUARAN KAS<BR>(SPMU)</B></p>

<br>
Dibayar Kepada:<?php echo $nama_pengurus;?>
<br>
<table border="1" width="100%" style="color=#000066" class="a">
	<thead>
<tr>
    <th>No</th>
<th>Nama Anak</th>
<th>Kategori</th>
<th>Keperluan </th>
<th>Ref. Kwitansi</th>
<th>Tgl Bayar</th>
<th>Jumlah</th>
</tr>
</thead>
<tbody>
<?php
if( ! empty($detil_voucher)){
    $no=0;
    foreach($detil_voucher as $data){ $no++;
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>".$data->nama_calon."</td>";
        echo "<td>".$data->kategori."</td>";
        echo "<td>".$data->keperluan."</td>";
        echo "<td>".$data->ref_kwitansi."</td>"; 
        echo "<td>". $data->tgl_bayar ."</td>";
        echo "<td>". str_replace(",",".",number_format($data->jumlah)) ."</td>";  
        echo "</tr>";
        //$no++;
    }
    echo "<tr>";
    echo "<td colspan='5'></td>";
    //echo "<td></td>";
    //echo "<td></td>";
    echo "<td><b>Total </b></td>";
    echo "<td>". str_replace(",",".",number_format($totali[0]->jumlah)) ."</td>";
    echo "</tr>";

}
?>
<? //echo $totali[0]->jumlah; ?>
</tbody>
</table>
<br>
Diketahui Oleh:
<br>
<table style="height: 67px;" width="1000" >
<tbody>
<tr>
<td>
<p style="text-align: center;"></p>
<br>
<br>
<br>
<br>
<p style="text-align: center;"><span style="text-decoration: underline;"><b>Hj.Elly Bachtar</b></span><br>Ketua</p>
</td>
<td>
<p style="text-align: center;"></p>
<br>
<br>
<br>
<br>
<p style="text-align: center;"><span style="text-decoration: underline;"><b>Hj.Sadariah Sudarsono</b></span><br>Bendahara</p>
</td>
<td style="text-align: center;">
<p>Yang Menerima</p>
<br>
<br>
<br>
<br>
<p><span style="text-decoration: underline;"><br><strong><?php echo $nama_pengurus;?></strong></span></p>
</td>
</tr>
</tbody>
</table>
</body>
</html>

