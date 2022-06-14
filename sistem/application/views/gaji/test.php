<h2><center>Data Siswa</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Nama</th>
	</tr>
	<?php
	$no = 1;
	foreach($list as $row)
	{
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->nama_setting_pendapatan_lain_lain; ?></td>
		</tr>
		<?php
	}
	?>
</table>
