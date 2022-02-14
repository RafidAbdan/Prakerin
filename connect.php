<?php

$konek = mysqli_connect("localhost", "root", "", "db_elektronik");
function query($query){
	global $konek;
	$result = mysqli_query($konek, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data){
	global $konek;
	$nama = htmlspecialchars($data['nama_barang']);
	$tipe = htmlspecialchars($data['jenis_barang']);
	$harga = htmlspecialchars($data['harga_barang']);
	$stok = htmlspecialchars($data['stok_barang']);


	$query = "INSERT INTO paint VALUES ('', '$nama', '$tipe', '$harga', '$stok')";

	mysqli_query($konek, $query);
	return mysqli_affected_rows($konek);
}
function ubah($data){
	global $konek;
	$id = $data['id'];
	$nama = htmlspecialchars($data['nama_barang']);
	$tipe = htmlspecialchars($data['jenis_barang']);
	$harga = htmlspecialchars($data['harga_barang']);
	$stok = htmlspecialchars($data['stok']);


	$query = "UPDATE tb_barang SET 
				nama_barang = '$nama', 
				jenis_barang = '$tipe', 
				harga_barang = '$harga', 
				stok_barang = '$stok' 
			 WHERE id_barang = $id
			 ";

	mysqli_query($konek, $query);
	return mysqli_affected_rows($konek);
}
function hapus($id){
	global $konek;
	mysqli_query($konek, "DELETE FROM tb_barang WHERE id_barang = $id");

	return mysqli_affected_rows($konek);
}
?>