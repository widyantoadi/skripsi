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
    <h4 style="text-align: center;"> LAPORAN PENYALURAN ANAK ASUH TAHUN<b><?php echo $tgl1;?></b></h4><br>
<br>
<br>
<br>
<p>Berikut Ini Adalah laporan Penyaluran Aanak Asuh Pada Tahun <b><?php echo $tgl1;?></b></p>
<table border="1" width="100%" style="color=#000066" class="a">
<tr>
    <th>Nama Anak</th>
    <th>Tanggal Keluar</th>
    <th >Nama Perwalian Keluarga Asuh</th>
    <th >Alamat Keluarga Asuh</th>
    
    
</tr>
<?php
if( ! empty($skpaa)){
    //$no = 1;
    foreach($skpaa as $data){
        echo "<tr>";
        echo "<td>".$data->nama_calon."</td>";
        echo "<td>".$data->tgl_skpaa."</td>";
        echo "<td>".$data->nama."</td>";
        echo "<td>".$data->alamat."</td>";  
        echo "</tr>";
        //$no++;
    }
    
}
?>
</table>
<p>Jakarta,<?php echo tanggal($today);?></p>
<br><?php //echo $jabatan;?>

 <?php //echo $nama_pengurus;?>
</body>
</html>