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
  foreach($totalz as $rowdata){
    $totalq=$rowdata->totali;
    
  }
 ?>
<?php $today = date("Y-m-d"); ?>
<body style="color:#000066;">
<h4 style="text-align: center;">PENGELUARAN KAS ANAK ASUH</h4>
<h4 style="text-align: center;">PANTI ASUHAN MUHAMMADIYAH AISYIYAH RAWAMANGUN</h4>
<h4 style="text-align: center;">Mulai Tanggal <?php echo tanggal($tgl1); ?> - <?php echo tanggal($tgl2); ?></h4><br>
<table border="1" width="100%" style="color=#000066" class="a">
<tr>
    <th>No Voucher</th>
    <th>Tanggal</th>
    
    <th>Pengurus Yang Bertanggung Jawab</th>
    <th >JUMLAH(Rp.)</th>
</tr>
<?php
if( ! empty($lap)){
    //$no = 1;
    foreach($lap as $data){
        echo "<tr>";
        echo "<td>".$data->no_voucher."</td>";
        echo "<td>".$data->tgl_voucher."</td>";
        echo "<td>".$data->nama_pengurus."</td>";
        echo "<td>".str_replace(",",".",number_format($data->total))."</td>";
        
        //echo "<td>".$data->banyaknya_uang."</td>";
        //echo "<td>".str_replace(",",".",number_format($data->banyaknya_uang,2))."</td>";
        //echo "<td>".$data->nama_pengurus."</td>";
        echo "</tr>";
        //$no++;
    }
    echo "<tr>";
    echo "<td colspan='2'></td>";
    //echo "<td></td>";
    //echo "<td></td>";
    echo "<td><b>Total Pengeluaran</b></td>";
    echo "<td><b>".str_replace(",",".",number_format($totalq))."</b></td>";
    echo "</tr>";

}
?>
</table>
<br>
Terbilang: <b><?php echo ucwords(number_to_words($totalq));?> </b> Rupiah<br>
Jakarta,<?php echo tanggal($today);?>
<br><?php echo $jabatan;?>
<br>
<br>
<br>
 <?php echo $nama_pengurus1;?>
</body>
</html>