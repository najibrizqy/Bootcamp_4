<?php 
	include "koneksi.php";
    $delete = new Bootcamp();
    $delete->connect();

    $id = $_GET['id'];
    $delete->sql(" DELETE FROM nama WHERE id = '$id' ");

	header("Location:../7.php");
?>