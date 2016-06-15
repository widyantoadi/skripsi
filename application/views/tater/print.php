<html>
<head>
    <title>Cetak PDF</title>
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
<?
  foreach($total as $rowdata){
    $totali=$rowdata->total;
    
  }
?>
<?php $today = date("Y-m-d"); ?>
<body style="color:#000066;">
<h4 style="text-align: center;"> LAPORAN PENERIMAAN KAS ANAK ASUH <br> PANTI ASUHAN MUHAMMADIYAH AISYIYAH RAWAMANGUN <br>Mulai Tanggal <?php echo tanggal($tgl1); ?> - <?php echo tanggal($tgl2); ?></h4><br>
<b>Via Sekretariat</b>
<table border="1" width="100%" style="color=#000066" class="a">
<tr>
    <th>No Tanda Terima</th>
    <th>Tanggal</th>
    <th >NAMA</th>
    <th >ALAMAT</th>
    
    <th>Pengurus Yang Bertanggung Jawab</th>
    <th >JUMLAH(Rp.)</th>
    
</tr>
<?php
if( ! empty($tater)){
    //$no = 1;
    foreach($tater as $data){
        echo "<tr>";
        echo "<td>".$data->no_tanda_terima."</td>";
        echo "<td>".$data->tgl_terima."</td>";
        echo "<td>".$data->nama_donatur."</td>";
        echo "<td>".$data->alamat."</td>";
         echo "<td>".$data->nama_pengurus."</td>";
        echo "<td>".str_replace(",",".",number_format($data->banyaknya_uang,2))."</td>";
       
        echo "</tr>";
        //$no++;
    }
    echo "<tr>";
    echo "<td colspan='4'></td>";
    //echo "<td></td>";
    //echo "<td></td>";
    echo "<td><b>Total Penerimaan</b></td>";
    echo "<td><b>".str_replace(",",".",number_format($totali,2))."</b></td>";
    echo "</tr>";

}
?>
</table>
<p>Terbilang: <b><?php echo ucwords(number_to_words($totali));?> </b> Rupiah<br>
 </p>
<br><p><br>
Jakarta,<?php echo tanggal($today);?>
<br><?php echo $jabatan;?></p>
<br>
<br>
<br>
 <p><?php echo $nama_pengurus1;?></p>
</body>
</html>