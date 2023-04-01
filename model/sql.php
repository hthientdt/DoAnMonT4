<?php
	include("../condb/condb.php");
	
	class database
	{
		function execute($sql)
		{
			$p=new csdl();
			$link=$p->connect();
			$qr=mysqli_query($link,$sql);
			return $qr;
		}
		function execute2($sql)
		{
			$p=new csdl();
			$link=$p->connect();
			$qr=mysqli_query($link,$sql);
		}
	}	
?>