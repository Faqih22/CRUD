<html>
	<head>
		<title>Input Mahasiswa</title>
	</head>
	<body>
		<h1>Data siswa</h1>
		<hr>

		<a href='<?php echo base_url("siswa/tambah"); ?>'>Tambah Data</a><br><br>

		<table border="1" cellpadding="7">
			<tr>
				<th>NIM</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Telepon</th>
				<th>Alamat</th>
				<th colspan="2">Aksi</th>
			</tr>

			<?php
			if( ! empty($siswa)){ 
				foreach($siswa as $data){
					echo "<tr>
					<td>".$data->nim."</td>
					<td>".$data->nama."</td>
					<td>".$data->jenis_kelamin."</td>
					<td>".$data->telp."</td>
					<td>".$data->alamat."</td>
					<td><a href='".base_url("siswa/ubah/".$data->nim)."'>Ubah</a></td>
					<td><a href='".base_url("siswa/hapus/".$data->nim)."'>Hapus</a></td>
					</tr>";
				}
			}else{ // Jika data siswa kosong
				echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
			}
			?>
		</table>
	</body>
</html>
