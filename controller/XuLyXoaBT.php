<?php
	include("../model/sql.php");
	$db=new database();
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$db->execute2('delete from baitap where MaBT="'.$id.'"');
		header("location:../view/QuanLyBaiTap.php?idBH=".$_GET['idBH']);
	}
?>