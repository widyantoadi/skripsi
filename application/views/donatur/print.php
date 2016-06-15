<html>
<head>
    <title>Cetak PDF</title>
</head>
<body>
<h1 style="text-align: center;">Data donatur</h1>
<a href="<?php echo base_url("index.php/donatur/cetak"); ?>">Cetak Data</a><br><br>
<table class="table table-bordered table-hover table-striped">
    <thead>
<tr>

<th>Kode donatur</th>
<th>Nama donatur</th>
<th>alamat</th>
<th>Telepon</th>


<th>aksi</th>
</tr>
</thead>


<tbody id="search-result">
<?php
$no=null;
if(isset($data_donatur)){
    foreach($data_donatur as $baris_donatur){
        $no++;
        
        echo '<tr>
        
        <td align="center">'.$baris_donatur['kode_donatur'].'</td>
        <td>'.$baris_donatur['nama_donatur'].'</td>
        <td>'.$baris_donatur['alamat'].'</td>
        <td>'.$baris_donatur['telepon'].'</td>
        
        
       
        </td>
            </tr>';
    }
}
?>

</tbody>
</table>
</body>
</html>
