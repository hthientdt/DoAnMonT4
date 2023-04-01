<?php
	include("../model/sql.php");
	$db=new database();
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$db->execute2('delete from baihoc where MaBH="'.$id.'"');
		header("location:../view/QuanLyBaiHoc.php");
	}
?>