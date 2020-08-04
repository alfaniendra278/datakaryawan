<html>
<head>
	<title>Cetak PDF</title>
</head>
<body>

<h1 style="text-align: center;">Data Karyawan</h1>

<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>

<table border="1" align="center">
<tr>
	<th>No</th>
	<th>Nomor Induk</th>
	<th>Nama</th>
	<th>Alamat</th>
	<th>Tanggal Masuk</th>
	<th>Status</th>
</tr>
<?php
if( ! empty($ci_karyawan)){
	$no = 1;
	foreach($ci_karyawan as $data){
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data->k_induk."</td>";
		echo "<td>".$data->k_name."</td>";
		echo "<td>".$data->k_alamat."</td>";
		echo "<td>".$data->k_dateadd."</td>";
		echo "<td>".$data->k_status."</td>";
		echo "</tr>";
		$no++;
	}
}
?>
</table>

</body>
</html>
