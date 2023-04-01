<?php
	class csdl
	{
		function connect()
		{
			$con= mysqli_connect('localhost','root','');
			
			if(!$con)
				echo "ket noi that bai";
			else 
			{
				mysqli_select_db($con,"qlav");
				mysqli_set_charset($con,'UTF8');
				return $con;
			}
		}
		
	}
?>