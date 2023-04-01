<?php
	include("../model/sql.php");
	$db=new database();
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$db->execute2('delete from nguoidung where MaND="'.$id.'"');
		header("location:../view/QuanLyTaiKhoan.php");
	}
?>