<html>
<head></head>
<body>
<p style="text-align: center;"><img src="<?php echo base_url();?>img/b.jpg" alt="" width="121" height="39" /></p>
<p style="text-align: center;"><strong><span style="font-size: medium;">SURAT KETERANGAN<br>PENYERAHAN ANAK ASUH</span></strong></p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: right;">&nbsp;</p>
<p>Yang bertanda tangan dibawah ini:</p>
<p>&nbsp;</p>
<table border="0">
    <tbody>
        <tr>
            <td>Nama</td>
            <td><b><?php echo $nama_p;?></b></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo $jeniskp;?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><?php echo $pekerjaan_p;?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $alamat_p;?></td>
        </tr>
    </tbody>
</table>
<p>Mewakili Pengurus Panti</p>
<p>Dengan ini saya memberikan kuasa unutk mengurus dan mengasuh atas nama : <b> <?php echo $nama_a;?> </b></p>
<p>kepada :</p>
<table border="0">
    <tbody>
        <tr>
            <td>Nama</td>
            <td><b><?php echo $nama_k;?></b></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo $jeniskelamin_k;?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><?php echo $pekerjaan_k;?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $alamat_k;?><br /><br /></td>
        </tr>
        
    </tbody>
</table>
<p>Mewakili Pengurus Panti</p>
<p>&nbsp;</p>
<p>Jakarta, <?php echo tanggal($tgl_s);?></p>
<table style="height: 118px; width: 662px;" border="0">
    <tbody>
        <tr>
            <td style="text-align: center;">Perwakilan Panti</td>
            <td style="text-align: center;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>
            <td style="text-align: center;">Pihak Penerima</td>
        </tr>
        <tr>
            <td>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p style="text-align: center;"><?php echo $nama_p;?></p>
            </td>
            <td>&nbsp;</td>
            <td>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p style="text-align: center;"><b><?php echo $nama_k;?></b></p>
            </td>
        </tr>
        <tr>

            <td><br /><br /></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
</html>
