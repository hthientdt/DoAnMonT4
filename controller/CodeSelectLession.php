<?php
	include("../model/sql.php");
	class baihoc
	{
		public $id;
		public $tenBH;
		function contructer($sql)
		{
			$db=new database();
			$qr=$db->execute($sql);
			$array=array();
			while($row = mysqli_fetch_assoc($qr))
			{
				$bh=new baihoc();
				$bh->id=$row['MaBH'];
				$bh->tenBH=$row['TenBH'];
				array_push($array,$bh);
			}
			return $array;
		}
	}
?>