<html>
<head>
    <title>Cetak PDF</title>
</head>
<body>
<h1 style="text-align: center;">Laporan</h1>
<a href="<?php echo base_url("index.php/tater/cetak"); ?>">Cetak Data</a><br><br>
<table border="1" width="100%">
<tr>
    <th>No KWT</th>
    <th>TGL</th>
    <th>NAMA</th>
    <th>ALAMAT</th>
    <th>JUMALH(Rp.)</th>
    
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
        echo "<td>".$data->banyaknya_uang."</td>";
        
        echo "</tr>";
        //$no++;
    }
}
?>
</table>
Tertanda <?php echo $nama_pengurus;?>
</body>
</html>