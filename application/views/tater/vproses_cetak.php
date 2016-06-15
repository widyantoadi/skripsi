<html>
<head></head>
<body style="color:#000066;">
<p style="text-align: right;">No  <?php echo $no_t ?> </p>
<p style="text-align: center;"><img src="<?php echo base_url();?>img/b2.jpg" alt="" width="121" height="39" /></p>
<p style="text-align: center;"><span style="text-decoration: underline;"><strong>TANDA&nbsp;TERIMA</strong></span></p>
<p><strong><em>&nbsp;</em></strong></p>
<table style="height: 116px;" width="271">
<tbody>
<tr>
<td>Sudah&nbsp;Terima&nbsp;dari :</td>
<td><?php echo $nama_d ?></td>
</tr>
<tr>
<td>Alamat :</td>
<td><?php echo $a ?></td>
</tr>
<tr>
<td>Banyaknya&nbsp;Uang&nbsp; :</td>
<td>Rp. <?php echo str_replace(",",".",number_format($bu))?> </td>
</tr>
<tr>
<td>&nbsp;</td>
<td>( <?php echo ucwords(number_to_words($bu));?> ) Rupiah</td>
</tr>
<tr>
<td>Untuk&nbsp;Pembayaran :</td>
<td><?php echo $up ?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
</tr>
</tbody>
</table>
<p>Selanjutnya akan kami salurkan kepada mereka yang berhak menerimanya.</p>
<p>Dengan nama Allah yang Maha pengasih lagi maha penyayang semoga Allah SWT. Memberi pahala kepada anda, atas barang yang anda berikan dan mudah-mudahan Allah SWT. Memberi berkat kepada anda atas apa saja yang masih tinggal. Muda-mudahan dijadikanNya kesucian bagi anda.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table>
<tbody>
<tr>
<td width="197"><p></p>
<p>Yang&nbsp;Menyerahkan,</p>
</td>
<td width="197">
<p>&nbsp;</p>
</td>
<td width="197">
	<p style="text-align: right;">Jakarta, <?php echo tanggal($tgl_t)?>  </p>
<p>Yang&nbsp;menerima,</p>
</td>
</tr>
<tr>
<td width="197">
	<br><br><br>
	<?php echo $nama_d ?></td>
<td width="197">&nbsp;</td>
<td width="197">
	<br><br><br>
	<?php echo $nama_p ?></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
