<?php
	include('../model/code.php');
	include("../model/sql.php");
	$p=new NguoiDung;
	$db=new database();
?>
<html lang="vi">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>AdameatEva</title>
	<link rel="stylesheet" href="../asset/QuanLyTaiKhoanCss.css">
	<link rel="stylesheet" href="../asset/HeaderFooter.css">
</head>

<body>
	<div class="Menu">
		Quản lý bài học.
	</div>
	
	<section class="work">
		<div class="left">
			<a href='QuanLyTaiKhoan.php'><button  name="qluser" class="butMenuLeft"> Quản lý người dùng</button></a>
			<button type="button" name="qllesson" class="butMenuLeft"> Quản lý bài học</button>
			<a href='QuanLyBaiTap.php'><button  name="qllesson" class="butMenuLeft"> Quản lý bài tập</button></a>
		</div>
		<div class="middle">
			<div class="list">
				<table class="bang">
						<tr>
							<th> ID </th>
							<th> Tên bài học </th>
							<th> </th>
						</tr>	
					<?php					
						$p->loadBaiHoc();
					?>
				</table>
			</div >
			<form method="post">
				<button type="submit" name="butthemMoi" class="butThaoTac">+ Thêm bài học mới</button>
			</form>
				<?php 
					if(isset($_POST['butthemMoi']))
					echo	'<div class="form">
				Thêm bài học.
				<form method="post">
				  <div class="mb-3">
					  <label for="formGroupExampleInput" class="form-label">Tên bài học</label>
					  <input type="text" class="form-control" name="TenBH" id="formGroupExampleInput" placeholder="Tên bài học">
					</div>
					<button type="submit" name="Them" class="btn btn-primary">Thêm</button>				
				</form>
			</div>'
				?>
			
			<?php 
						if(isset($_POST['Them']))
						{
							$db->execute2('insert into baihoc  values (null,"'.$_POST['TenBH'].'")');
							header("location:QuanLyBaiHoc.php");
						}
						if(isset($_POST['sua']))
						{
							$db->execute2('update baihoc  set TenBH="'.$_POST['TenBH'].'" where MaBH="'.$_GET['id'].'"');
							header("location:QuanLyBaiHoc.php");
						}
			?>
			<?php 
						if(isset($_GET['id']))
						{
							$id=$_GET['id'];
							
							$qr=$db->execute('select * from baihoc where MaBH="'.$id.'"');
							while($row = mysqli_fetch_assoc($qr))
							{
								echo '<div class="form">
						Sửa người dùng.
				<form method="post">
				  <div class="mb-3">
					  <label for="formGroupExampleInput" class="form-label">id:'.$row['MaBH'].'</label>
					  <label for="formGroupExampleInput" class="form-label">Tên</label>
					  <input type="text" class="form-control" name="TenBH" id="formGroupExampleInput" value="'.$row['TenBH'].'">
					</div>
					<button type="submit" name="sua" class="btn btn-primary">Sửa</button>				
				</form>
			</div>';
							}
						}
			?>
  		</div>
	</section>
	
</body>

</html>