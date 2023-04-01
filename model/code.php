<?php
	
	
	class NguoiDung
	{ 
	
	
		function loadData($sql)
		{
			$p=new csdl();
			$link=$p->connect();			
			$qr=mysqli_query($link,$sql);
			while($row=mysqli_fetch_array($qr)){
				$MaND=$row['MaND'];
				$Name=$row['Name'];
				$Email=$row['Email'];
				$TK=$row['TK'];
				$MK=$row['MK'];
				echo 	'<tr>
							<td> '.$MaND.'</td>
							<td> '.$Name.'</td>
							<td> '. $Email.'</td>
							<td> '. $TK.'</td>
							<td> '. $MK.'</td>
							<td> 
								<form method="post">
									<a href="../view/QuanLyTaiKhoan.php?id='.$MaND.'">Sửa</a> || 
									<a href="../controller/XuLyXoaND.php?id='.$MaND.'" class="butXoa">Xóa</a>
								</form>
							</td>
						</tr>';
			}
		}
		function loadBaiHoc()
		{
			$p=new csdl();
			$link=$p->connect();			
			$qr=mysqli_query($link,'select * from baihoc');
			while($row=mysqli_fetch_array($qr)){
				echo 	'<tr>
							<td> '.$row['MaBH'].'</td>
							<td> '.$row['TenBH'].'</td>
							<td> 
								<form method="post">
									<a href="../view/QuanLyBaiHoc.php?id='.$row['MaBH'].'">Sửa</a> || 
									<a href="../controller/XuLyXoaBH.php?id='.$row['MaBH'].'" class="butXoa">Xóa</a>
								</form>
							</td>
						</tr>';
			}
		}
		function loadBaiTap($idBH)
		{
			$p=new csdl();
			$link=$p->connect();			
			$qr=mysqli_query($link,'select * from baitap where MaBH="'.$idBH.'"');
			while($row=mysqli_fetch_array($qr)){
				echo 	'<tr>
							<td> '.$row['MaBT'].'</td>
							<td> '.$row['MaBH'].'</td>
							<td> '.$row['TV'].'</td>
							<td> '.$row['TA'].'</td>
							<td> 
								<form method="post">
									<a href="../view/QuanLyBaiTap.php?id='.$row['MaBT'].'&idBH='.$row['MaBH'].'">Sửa</a> || 
									<a href="../controller/XuLyXoaBT.php?id='.$row['MaBT'].'&idBH='.$row['MaBH'].'" class="butXoa">Xóa</a>
								</form>
							</td>
						</tr>';
			}
		}
		function themUser($Ten,$TK,$MK,$Email)
		{
			$p=new csdl();
			$link=$p->connect();
			$MK1=MD5($MK);
			$sql="insert into nguoidung values(null,'".$Ten."','".$Email."','".$TK."','".$MK1."')";
			mysqli_query($link,$sql);
			header("location:QuanLyTaiKhoan.php");
		}
		
	}
	
?>