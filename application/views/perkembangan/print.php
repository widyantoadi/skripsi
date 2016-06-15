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

<?php $today = date("Y-m-d"); ?>
<body style="color:#000066;">

<h4 style="text-align: center;">Laporan Perkembangan Anak Asuh <br>Mulai Tanggal <?php echo tanggal($tgl1); ?> sampai <?php echo tanggal($tgl2); ?></h4><br>
<br>
<br>
<br>
<p>Nama Anak : <b><?php echo $nama_anak;?></b></p>
<p>Berikut adalah daftar perkembangan <b><?php echo $nama_anak;?></b> dari tanggal  <?php echo tanggal($tgl1); ?> sampai <?php echo tanggal($tgl2); ?> </p>
<p>
<table border="1" width="100%" style="color=#000066" class="a">
<tr>
    
    <th>Kategori</th>
    <th >Keterangan</th>
    <th >Tanggal</th>
    
</tr>
<?php
if( ! empty($perkembangan)){
    //$no = 1;
    foreach($perkembangan as $data){
        echo "<tr>";
        
        echo "<td>".$data->kategori."</td>";
        echo "<td>".$data->keterangan."</td>";
        echo "<td>". tanggal(date("Y-m-d",strtotime($data->tanggal_p))) ."</td>";
        
        echo "</tr>";
        //$no++;
    }


}
?>
</table>
</p>
<?php //echo tanggal($today);?>
<br>
<br>
<br>
<br>
 
</body>
</html>