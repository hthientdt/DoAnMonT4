<?php
	include("../model/sql.php");
	session_start();
	function DangNhap($tk,$mk)
	{
		if($tk!=null || $mk!=null|| $tk!=null && $mk!=null)
		{	
			$db=new database();
			$qr=$db->execute('select * from nguoidung where TK="'.$tk.'" and MK="'.md5($mk).'" limit 1');
			$i=mysqli_num_rows($qr);
			if($i==1)
			{
				while($row=mysqli_fetch_array($qr))
				{				
					$_SESSION['id']=$row['MaND'];
					$_SESSION['Name']=$row['Name'];
					
				}
				header('location:SelectLession.php');
			}
			else echo 'Tài khoản hoặc mật khẩu không tồn tại.';
		}
		else echo 'Vui lòng đăng nhập.';
	}
	function DangKy($name,$tk,$mk,$mk2,$email)
	{
		$md5mk=md5($mk);
		$md5mk2=md5($mk2);
		if($name!=null && $tk!=null && $md5mk!=null && $md5mk2!=null &&$email!=null)	
		{	if($md5mk!=$md5mk2)
				echo 'Mật khẩu không trùng nhau.';
			else
			{
				$db=new database();
				$db->execute2('insert into nguoidung values(null,"'.$name.'","'.$email.'","'.$tk.'","'.$md5mk2.'")');
				header('location:signin.php');
			}
		}
		else
			echo 'Vui lòng nhập thông tin.';
	}
?>